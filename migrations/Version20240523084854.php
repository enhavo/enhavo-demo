<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240523084854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_swipe_teaser_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, titleAlignment VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, INDEX IDX_EF900BD460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_swipe_teaser_block_item (id INT AUTO_INCREMENT NOT NULL, picture_id INT DEFAULT NULL, position INT DEFAULT NULL, overline VARCHAR(255) DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, `label` VARCHAR(255) DEFAULT NULL, target VARCHAR(255) DEFAULT NULL, look VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, size VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, swipeTeaserBlock_id INT DEFAULT NULL, INDEX IDX_8EFFFC71F034C974 (swipeTeaserBlock_id), INDEX IDX_8EFFFC71EE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_swipe_teaser_block ADD CONSTRAINT FK_EF900BD460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_swipe_teaser_block_item ADD CONSTRAINT FK_8EFFFC71F034C974 FOREIGN KEY (swipeTeaserBlock_id) REFERENCES app_swipe_teaser_block (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_swipe_teaser_block_item ADD CONSTRAINT FK_8EFFFC71EE45BDBF FOREIGN KEY (picture_id) REFERENCES media_file (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_swipe_teaser_block DROP FOREIGN KEY FK_EF900BD460D9FD7');
        $this->addSql('ALTER TABLE app_swipe_teaser_block_item DROP FOREIGN KEY FK_8EFFFC71F034C974');
        $this->addSql('ALTER TABLE app_swipe_teaser_block_item DROP FOREIGN KEY FK_8EFFFC71EE45BDBF');
        $this->addSql('DROP TABLE app_swipe_teaser_block');
        $this->addSql('DROP TABLE app_swipe_teaser_block_item');
    }
}
