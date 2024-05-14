<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240514134224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_advanced_text_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, text VARCHAR(255) DEFAULT NULL, columns VARCHAR(255) DEFAULT NULL, overline VARCHAR(255) DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, copy LONGTEXT DEFAULT NULL, ctaTitle VARCHAR(255) DEFAULT NULL, ctaLink VARCHAR(255) DEFAULT NULL, ctaTarget VARCHAR(255) DEFAULT NULL, INDEX IDX_3A08E440460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_advanced_text_block ADD CONSTRAINT FK_3A08E440460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_content_flex_block_item ADD ctaTitle VARCHAR(255) DEFAULT NULL, ADD ctaLink VARCHAR(255) DEFAULT NULL, ADD ctaTarget VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_advanced_text_block DROP FOREIGN KEY FK_3A08E440460D9FD7');
        $this->addSql('DROP TABLE app_advanced_text_block');
        $this->addSql('ALTER TABLE app_content_flex_block_item DROP ctaTitle, DROP ctaLink, DROP ctaTarget');
    }
}
