<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324101628 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE app_header_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, picture_id INT DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, subheadline VARCHAR(255) DEFAULT NULL, cta LONGTEXT NOT NULL COMMENT \'(DC2Type:json_array)\', INDEX IDX_D231F644460D9FD7 (node_id), INDEX IDX_D231F644EE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_header_block ADD CONSTRAINT FK_D231F644460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_header_block ADD CONSTRAINT FK_D231F644EE45BDBF FOREIGN KEY (picture_id) REFERENCES media_file (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE app_header_block');
    }
}
