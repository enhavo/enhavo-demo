<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503111908 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_user ADD verified TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE article_article DROP priority, DROP change_frequency');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFA727ACA70');
        $this->addSql('ALTER TABLE page_page DROP priority, DROP change_frequency');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFA727ACA70 FOREIGN KEY (parent_id) REFERENCES page_page (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article_article ADD priority DOUBLE PRECISION DEFAULT NULL, ADD change_frequency VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFA727ACA70');
        $this->addSql('ALTER TABLE page_page ADD priority DOUBLE PRECISION DEFAULT NULL, ADD change_frequency VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFA727ACA70 FOREIGN KEY (parent_id) REFERENCES page_page (id)');
        $this->addSql('ALTER TABLE user_user DROP verified');
    }
}
