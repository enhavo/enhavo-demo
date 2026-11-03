<?php

namespace App\Command;

use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Clears the database in a foreign-key-safe way and (re)loads the data fixtures.
 *
 * The default `doctrine:fixtures:load` purger cannot wipe this schema because of
 * enhavo's dense foreign-key graph (e.g. the self-referencing page_page.revisionSubject_id),
 * so we truncate every table with FK checks disabled and then load with --append.
 */
#[AsCommand(
    name: 'app:fixtures:load',
    description: 'Truncate all tables (foreign-key safe) and load the data fixtures.',
)]
class LoadFixturesCommand extends Command
{
    public function __construct(private readonly Connection $connection)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $schema = $this->connection->getDatabase();
        $tables = $this->connection->fetchFirstColumn(
            "SELECT table_name FROM information_schema.tables
             WHERE table_schema = ? AND table_type = 'BASE TABLE'
               AND table_name <> 'doctrine_migration_versions'",
            [$schema],
        );

        $io->section(sprintf('Clearing %d tables in "%s"', count($tables), $schema));
        $this->connection->executeStatement('SET FOREIGN_KEY_CHECKS = 0');
        foreach ($tables as $table) {
            $this->connection->executeStatement('TRUNCATE TABLE `' . $table . '`');
        }
        $this->connection->executeStatement('SET FOREIGN_KEY_CHECKS = 1');

        $io->section('Loading fixtures');
        $exitCode = $this->getApplication()
            ->find('doctrine:fixtures:load')
            ->run(new ArrayInput(['--append' => true, '--no-interaction' => true]), $output);

        if (Command::SUCCESS !== $exitCode) {
            return $exitCode;
        }

        // Settings (contact widget, footer, ...) are config-defined but need
        // their DB entities created, otherwise setting() throws. The truncate
        // above wiped them, so re-initialize here to keep this a one-shot reset.
        $io->section('Initializing enhavo (settings, taxonomies, ...)');
        $exitCode = $this->getApplication()
            ->find('enhavo:init')
            ->run(new ArrayInput(['--no-interaction' => true]), $output);

        if (Command::SUCCESS === $exitCode) {
            $io->success('Database reset, fixtures loaded and enhavo initialized.');
        }

        return $exitCode;
    }
}
