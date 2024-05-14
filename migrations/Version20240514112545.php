<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240514112545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_card_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, media_id INT DEFAULT NULL, gradient VARCHAR(255) DEFAULT NULL, layouts VARCHAR(255) DEFAULT NULL, overline VARCHAR(255) DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, copy LONGTEXT DEFAULT NULL, ctaTitle VARCHAR(255) DEFAULT NULL, ctaLink VARCHAR(255) DEFAULT NULL, ctaTarget VARCHAR(255) DEFAULT NULL, INDEX IDX_ED34CD98460D9FD7 (node_id), INDEX IDX_ED34CD98EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_content_flex_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, layout VARCHAR(255) DEFAULT NULL, alignment VARCHAR(255) DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, INDEX IDX_8361F9F5460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_content_flex_block_item (id INT AUTO_INCREMENT NOT NULL, media_id INT DEFAULT NULL, position INT DEFAULT NULL, overline VARCHAR(255) DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, copy LONGTEXT DEFAULT NULL, contentFlexBlock_id INT DEFAULT NULL, INDEX IDX_603FB99AFADE5932 (contentFlexBlock_id), INDEX IDX_603FB99AEA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_team_member (id INT AUTO_INCREMENT NOT NULL, picture_id INT DEFAULT NULL, position INT DEFAULT NULL, firstName VARCHAR(255) DEFAULT NULL, lastName VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, INDEX IDX_5F1A9B1DEE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_card_block ADD CONSTRAINT FK_ED34CD98460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_card_block ADD CONSTRAINT FK_ED34CD98EA9FDD75 FOREIGN KEY (media_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_content_flex_block ADD CONSTRAINT FK_8361F9F5460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_content_flex_block_item ADD CONSTRAINT FK_603FB99AFADE5932 FOREIGN KEY (contentFlexBlock_id) REFERENCES app_content_flex_block (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_content_flex_block_item ADD CONSTRAINT FK_603FB99AEA9FDD75 FOREIGN KEY (media_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_team_member ADD CONSTRAINT FK_5F1A9B1DEE45BDBF FOREIGN KEY (picture_id) REFERENCES media_file (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_card_block DROP FOREIGN KEY FK_ED34CD98460D9FD7');
        $this->addSql('ALTER TABLE app_card_block DROP FOREIGN KEY FK_ED34CD98EA9FDD75');
        $this->addSql('ALTER TABLE app_content_flex_block DROP FOREIGN KEY FK_8361F9F5460D9FD7');
        $this->addSql('ALTER TABLE app_content_flex_block_item DROP FOREIGN KEY FK_603FB99AFADE5932');
        $this->addSql('ALTER TABLE app_content_flex_block_item DROP FOREIGN KEY FK_603FB99AEA9FDD75');
        $this->addSql('ALTER TABLE app_team_member DROP FOREIGN KEY FK_5F1A9B1DEE45BDBF');
        $this->addSql('DROP TABLE app_card_block');
        $this->addSql('DROP TABLE app_content_flex_block');
        $this->addSql('DROP TABLE app_content_flex_block_item');
        $this->addSql('DROP TABLE app_team_member');
    }
}
