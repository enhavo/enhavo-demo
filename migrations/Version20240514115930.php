<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240514115930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_team_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, overline VARCHAR(255) DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, INDEX IDX_1206751E460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_team_block_item (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, teamBlock_id INT DEFAULT NULL, teamMember_id INT DEFAULT NULL, INDEX IDX_BD7620299BAA7010 (teamBlock_id), INDEX IDX_BD76202961E4C843 (teamMember_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_team_block ADD CONSTRAINT FK_1206751E460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_team_block_item ADD CONSTRAINT FK_BD7620299BAA7010 FOREIGN KEY (teamBlock_id) REFERENCES app_team_block (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_team_block_item ADD CONSTRAINT FK_BD76202961E4C843 FOREIGN KEY (teamMember_id) REFERENCES app_team_member (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_team_block DROP FOREIGN KEY FK_1206751E460D9FD7');
        $this->addSql('ALTER TABLE app_team_block_item DROP FOREIGN KEY FK_BD7620299BAA7010');
        $this->addSql('ALTER TABLE app_team_block_item DROP FOREIGN KEY FK_BD76202961E4C843');
        $this->addSql('DROP TABLE app_team_block');
        $this->addSql('DROP TABLE app_team_block_item');
    }
}
