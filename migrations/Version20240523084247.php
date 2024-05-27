<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240523084247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_hero_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, layer1_id INT DEFAULT NULL, layer2_id INT DEFAULT NULL, size VARCHAR(255) DEFAULT NULL, layout VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, overline VARCHAR(255) DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, subHeadline VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, INDEX IDX_4A3F3399460D9FD7 (node_id), INDEX IDX_4A3F33993353FD63 (layer1_id), INDEX IDX_4A3F339921E6528D (layer2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_hero_block_item (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, `label` VARCHAR(255) DEFAULT NULL, target VARCHAR(255) DEFAULT NULL, look VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, size VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, heroBlock_id INT DEFAULT NULL, INDEX IDX_5917420970D7C200 (heroBlock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_hero_block ADD CONSTRAINT FK_4A3F3399460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_hero_block ADD CONSTRAINT FK_4A3F33993353FD63 FOREIGN KEY (layer1_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_hero_block ADD CONSTRAINT FK_4A3F339921E6528D FOREIGN KEY (layer2_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_hero_block_item ADD CONSTRAINT FK_5917420970D7C200 FOREIGN KEY (heroBlock_id) REFERENCES app_hero_block (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_hero_block DROP FOREIGN KEY FK_4A3F3399460D9FD7');
        $this->addSql('ALTER TABLE app_hero_block DROP FOREIGN KEY FK_4A3F33993353FD63');
        $this->addSql('ALTER TABLE app_hero_block DROP FOREIGN KEY FK_4A3F339921E6528D');
        $this->addSql('ALTER TABLE app_hero_block_item DROP FOREIGN KEY FK_5917420970D7C200');
        $this->addSql('DROP TABLE app_hero_block');
        $this->addSql('DROP TABLE app_hero_block_item');
    }
}
