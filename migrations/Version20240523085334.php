<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240523085334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_gallery_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, titleAlignment VARCHAR(255) DEFAULT NULL, layout VARCHAR(255) DEFAULT NULL, itemAlignment VARCHAR(255) DEFAULT NULL, lightBox TINYINT(1) DEFAULT NULL, text LONGTEXT DEFAULT NULL, amountOfColumns VARCHAR(255) DEFAULT NULL, INDEX IDX_FDFB7AAD460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_gallery_block_item (id INT AUTO_INCREMENT NOT NULL, picture_id INT DEFAULT NULL, position INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, target VARCHAR(255) DEFAULT NULL, photographerName VARCHAR(255) DEFAULT NULL, photographerLink VARCHAR(255) DEFAULT NULL, licenseName VARCHAR(255) DEFAULT NULL, licenseLink VARCHAR(255) DEFAULT NULL, galleryBlock_id INT DEFAULT NULL, INDEX IDX_D6884D1B5CA9400F (galleryBlock_id), INDEX IDX_D6884D1BEE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_gallery_block ADD CONSTRAINT FK_FDFB7AAD460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_gallery_block_item ADD CONSTRAINT FK_D6884D1B5CA9400F FOREIGN KEY (galleryBlock_id) REFERENCES app_gallery_block (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_gallery_block_item ADD CONSTRAINT FK_D6884D1BEE45BDBF FOREIGN KEY (picture_id) REFERENCES media_file (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_gallery_block DROP FOREIGN KEY FK_FDFB7AAD460D9FD7');
        $this->addSql('ALTER TABLE app_gallery_block_item DROP FOREIGN KEY FK_D6884D1B5CA9400F');
        $this->addSql('ALTER TABLE app_gallery_block_item DROP FOREIGN KEY FK_D6884D1BEE45BDBF');
        $this->addSql('DROP TABLE app_gallery_block');
        $this->addSql('DROP TABLE app_gallery_block_item');
    }
}
