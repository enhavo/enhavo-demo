<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240514092358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE block_blockquote_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, text LONGTEXT DEFAULT NULL, author VARCHAR(255) DEFAULT NULL, INDEX IDX_F1BBEE4E460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_gallery_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, INDEX IDX_1E4B24A3460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_gallery_block_file (gallery_id INT NOT NULL, file_id INT NOT NULL, INDEX IDX_61E3C6DA4E7AF8F (gallery_id), INDEX IDX_61E3C6DA93CB796C (file_id), PRIMARY KEY(gallery_id, file_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_node (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, blockId INT DEFAULT NULL, blockClass VARCHAR(255) DEFAULT NULL, property VARCHAR(255) DEFAULT NULL, enable TINYINT(1) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, template VARCHAR(255) DEFAULT NULL, INDEX IDX_4311BA3E727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_one_column_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, column_id INT DEFAULT NULL, width VARCHAR(255) DEFAULT NULL, style VARCHAR(255) DEFAULT NULL, INDEX IDX_66A916CD460D9FD7 (node_id), INDEX IDX_66A916CDBE8E8ED5 (column_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_picture_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, file_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, caption VARCHAR(255) DEFAULT NULL, INDEX IDX_7A0C73CE460D9FD7 (node_id), INDEX IDX_7A0C73CE93CB796C (file_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_template_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, INDEX IDX_886C4B4A460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_text_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, INDEX IDX_B8422614460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_text_picture_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, file_id INT DEFAULT NULL, text LONGTEXT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, caption VARCHAR(255) DEFAULT NULL, textLeft TINYINT(1) DEFAULT NULL, `float` TINYINT(1) DEFAULT NULL, layout INT DEFAULT NULL, INDEX IDX_3B11DE2A460D9FD7 (node_id), INDEX IDX_3B11DE2A93CB796C (file_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_three_column_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, width VARCHAR(255) DEFAULT NULL, style VARCHAR(255) DEFAULT NULL, columnOne_id INT DEFAULT NULL, columnTwo_id INT DEFAULT NULL, columnThree_id INT DEFAULT NULL, INDEX IDX_BEA24F9B460D9FD7 (node_id), INDEX IDX_BEA24F9B4B499059 (columnOne_id), INDEX IDX_BEA24F9B20157796 (columnTwo_id), INDEX IDX_BEA24F9BF1E466CA (columnThree_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_two_column_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, width VARCHAR(255) DEFAULT NULL, style VARCHAR(255) DEFAULT NULL, columnOne_id INT DEFAULT NULL, columnTwo_id INT DEFAULT NULL, INDEX IDX_3A725155460D9FD7 (node_id), INDEX IDX_3A7251554B499059 (columnOne_id), INDEX IDX_3A72515520157796 (columnTwo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_video_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, INDEX IDX_D674CB5B460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_file (id INT AUTO_INCREMENT NOT NULL, mimeType VARCHAR(255) DEFAULT NULL, extension VARCHAR(255) DEFAULT NULL, `order` INT DEFAULT NULL, filename VARCHAR(255) DEFAULT NULL, parameters LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', token VARCHAR(255) DEFAULT NULL, md5Checksum VARCHAR(255) DEFAULT NULL, library TINYINT(1) DEFAULT NULL, garbage TINYINT(1) NOT NULL, garbageTimestamp DATETIME DEFAULT NULL, createdAt DATETIME NOT NULL, garbageCheckedAt DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_format (id INT AUTO_INCREMENT NOT NULL, file_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, mimeType VARCHAR(255) DEFAULT NULL, extension VARCHAR(255) DEFAULT NULL, parameters LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', lockAt DATETIME DEFAULT NULL, INDEX IDX_62C3E80193CB796C (file_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_usage (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE navigation_content (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, contentId INT DEFAULT NULL, contentClass VARCHAR(255) DEFAULT NULL, INDEX IDX_B8473EDA460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE navigation_link (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, link VARCHAR(1023) DEFAULT NULL, target VARCHAR(255) DEFAULT NULL, INDEX IDX_12C4C83460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE navigation_navigation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE navigation_node (id INT AUTO_INCREMENT NOT NULL, navigation_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, `label` VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, subjectId INT DEFAULT NULL, subjectClass VARCHAR(255) DEFAULT NULL, INDEX IDX_B2FF3D3739F79D6D (navigation_id), INDEX IDX_B2FF3D37727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE navigation_submenu (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, INDEX IDX_E232466B460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_page (id INT AUTO_INCREMENT NOT NULL, route_id INT DEFAULT NULL, content_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, metaDescription LONGTEXT DEFAULT NULL, pageTitle LONGTEXT DEFAULT NULL, public TINYINT(1) DEFAULT NULL, publicationDate DATETIME DEFAULT NULL, publishedUntil DATETIME DEFAULT NULL, noIndex TINYINT(1) DEFAULT NULL, noFollow TINYINT(1) DEFAULT NULL, openGraphTitle LONGTEXT DEFAULT NULL, openGraphDescription LONGTEXT DEFAULT NULL, createdAt DATETIME DEFAULT NULL, updatedAt DATETIME DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, openGraphImage_id INT DEFAULT NULL, INDEX IDX_93CEAAFABCC7F8A8 (openGraphImage_id), INDEX IDX_93CEAAFA34ECB4E6 (route_id), UNIQUE INDEX UNIQ_93CEAAFA84A0A3ED (content_id), INDEX IDX_93CEAAFA727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE routing_route (id INT AUTO_INCREMENT NOT NULL, host VARCHAR(255) DEFAULT NULL, schemes LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', methods LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', defaults LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', requirements LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', options LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', variablePattern VARCHAR(255) DEFAULT NULL, staticPrefix VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, contentClass VARCHAR(255) DEFAULT NULL, contentId INT DEFAULT NULL, INDEX name_idx (name), INDEX prefix_idx (staticPrefix), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting_basic_value (id INT AUTO_INCREMENT NOT NULL, setting_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, `int` INT DEFAULT NULL, `float` DOUBLE PRECISION DEFAULT NULL, `varchar` VARCHAR(255) DEFAULT NULL, `boolean` TINYINT(1) DEFAULT NULL, INDEX IDX_FCEB877FEE35BD72 (setting_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting_date_value (id INT AUTO_INCREMENT NOT NULL, setting_id INT DEFAULT NULL, value DATETIME DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_61D6AF98EE35BD72 (setting_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting_media_value (id INT AUTO_INCREMENT NOT NULL, setting_id INT DEFAULT NULL, file_id INT DEFAULT NULL, multiple TINYINT(1) NOT NULL, INDEX IDX_39C6ED52EE35BD72 (setting_id), INDEX IDX_39C6ED5293CB796C (file_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting_media_value_files (file_value_id INT NOT NULL, file_id INT NOT NULL, INDEX IDX_659369924870343F (file_value_id), INDEX IDX_6593699293CB796C (file_id), PRIMARY KEY(file_value_id, file_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting_setting (id INT AUTO_INCREMENT NOT NULL, `label` LONGTEXT DEFAULT NULL, translationDomain LONGTEXT DEFAULT NULL, `key` VARCHAR(255) DEFAULT NULL, valueId INT DEFAULT NULL, valueClass VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, `group` VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting_text_value (id INT AUTO_INCREMENT NOT NULL, setting_id INT DEFAULT NULL, value LONGTEXT DEFAULT NULL, INDEX IDX_8D92FD49EE35BD72 (setting_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user (id INT AUTO_INCREMENT NOT NULL, firstName VARCHAR(255) DEFAULT NULL, lastName VARCHAR(255) DEFAULT NULL, userIdentifier VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, username VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, verified TINYINT(1) DEFAULT NULL, confirmationToken VARCHAR(255) DEFAULT NULL, passwordRequestedAt DATETIME DEFAULT NULL, passwordUpdatedAt DATETIME DEFAULT NULL, lastFailedLoginAttempt DATETIME DEFAULT NULL, lastLogin DATETIME DEFAULT NULL, failedLoginAttempts INT DEFAULT NULL, roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_F7129A80750FAC43 (userIdentifier), UNIQUE INDEX UNIQ_F7129A801424F762 (confirmationToken), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user_group (user_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_28657971A76ED395 (user_id), INDEX IDX_28657971FE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE block_blockquote_block ADD CONSTRAINT FK_F1BBEE4E460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_gallery_block ADD CONSTRAINT FK_1E4B24A3460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_gallery_block_file ADD CONSTRAINT FK_61E3C6DA4E7AF8F FOREIGN KEY (gallery_id) REFERENCES block_gallery_block (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_gallery_block_file ADD CONSTRAINT FK_61E3C6DA93CB796C FOREIGN KEY (file_id) REFERENCES media_file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_node ADD CONSTRAINT FK_4311BA3E727ACA70 FOREIGN KEY (parent_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_one_column_block ADD CONSTRAINT FK_66A916CD460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_one_column_block ADD CONSTRAINT FK_66A916CDBE8E8ED5 FOREIGN KEY (column_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_picture_block ADD CONSTRAINT FK_7A0C73CE460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_picture_block ADD CONSTRAINT FK_7A0C73CE93CB796C FOREIGN KEY (file_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE block_template_block ADD CONSTRAINT FK_886C4B4A460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_text_block ADD CONSTRAINT FK_B8422614460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_text_picture_block ADD CONSTRAINT FK_3B11DE2A460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_text_picture_block ADD CONSTRAINT FK_3B11DE2A93CB796C FOREIGN KEY (file_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE block_three_column_block ADD CONSTRAINT FK_BEA24F9B460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_three_column_block ADD CONSTRAINT FK_BEA24F9B4B499059 FOREIGN KEY (columnOne_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_three_column_block ADD CONSTRAINT FK_BEA24F9B20157796 FOREIGN KEY (columnTwo_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_three_column_block ADD CONSTRAINT FK_BEA24F9BF1E466CA FOREIGN KEY (columnThree_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_two_column_block ADD CONSTRAINT FK_3A725155460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_two_column_block ADD CONSTRAINT FK_3A7251554B499059 FOREIGN KEY (columnOne_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_two_column_block ADD CONSTRAINT FK_3A72515520157796 FOREIGN KEY (columnTwo_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_video_block ADD CONSTRAINT FK_D674CB5B460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_format ADD CONSTRAINT FK_62C3E80193CB796C FOREIGN KEY (file_id) REFERENCES media_file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE navigation_content ADD CONSTRAINT FK_B8473EDA460D9FD7 FOREIGN KEY (node_id) REFERENCES navigation_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE navigation_link ADD CONSTRAINT FK_12C4C83460D9FD7 FOREIGN KEY (node_id) REFERENCES navigation_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE navigation_node ADD CONSTRAINT FK_B2FF3D3739F79D6D FOREIGN KEY (navigation_id) REFERENCES navigation_navigation (id)');
        $this->addSql('ALTER TABLE navigation_node ADD CONSTRAINT FK_B2FF3D37727ACA70 FOREIGN KEY (parent_id) REFERENCES navigation_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE navigation_submenu ADD CONSTRAINT FK_E232466B460D9FD7 FOREIGN KEY (node_id) REFERENCES navigation_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFABCC7F8A8 FOREIGN KEY (openGraphImage_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFA34ECB4E6 FOREIGN KEY (route_id) REFERENCES routing_route (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFA84A0A3ED FOREIGN KEY (content_id) REFERENCES block_node (id)');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFA727ACA70 FOREIGN KEY (parent_id) REFERENCES page_page (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE setting_basic_value ADD CONSTRAINT FK_FCEB877FEE35BD72 FOREIGN KEY (setting_id) REFERENCES setting_setting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE setting_date_value ADD CONSTRAINT FK_61D6AF98EE35BD72 FOREIGN KEY (setting_id) REFERENCES setting_setting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE setting_media_value ADD CONSTRAINT FK_39C6ED52EE35BD72 FOREIGN KEY (setting_id) REFERENCES setting_setting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE setting_media_value ADD CONSTRAINT FK_39C6ED5293CB796C FOREIGN KEY (file_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE setting_media_value_files ADD CONSTRAINT FK_659369924870343F FOREIGN KEY (file_value_id) REFERENCES setting_media_value (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE setting_media_value_files ADD CONSTRAINT FK_6593699293CB796C FOREIGN KEY (file_id) REFERENCES media_file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE setting_text_value ADD CONSTRAINT FK_8D92FD49EE35BD72 FOREIGN KEY (setting_id) REFERENCES setting_setting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user_group ADD CONSTRAINT FK_28657971A76ED395 FOREIGN KEY (user_id) REFERENCES user_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user_group ADD CONSTRAINT FK_28657971FE54D947 FOREIGN KEY (group_id) REFERENCES user_group (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE block_blockquote_block DROP FOREIGN KEY FK_F1BBEE4E460D9FD7');
        $this->addSql('ALTER TABLE block_gallery_block DROP FOREIGN KEY FK_1E4B24A3460D9FD7');
        $this->addSql('ALTER TABLE block_gallery_block_file DROP FOREIGN KEY FK_61E3C6DA4E7AF8F');
        $this->addSql('ALTER TABLE block_gallery_block_file DROP FOREIGN KEY FK_61E3C6DA93CB796C');
        $this->addSql('ALTER TABLE block_node DROP FOREIGN KEY FK_4311BA3E727ACA70');
        $this->addSql('ALTER TABLE block_one_column_block DROP FOREIGN KEY FK_66A916CD460D9FD7');
        $this->addSql('ALTER TABLE block_one_column_block DROP FOREIGN KEY FK_66A916CDBE8E8ED5');
        $this->addSql('ALTER TABLE block_picture_block DROP FOREIGN KEY FK_7A0C73CE460D9FD7');
        $this->addSql('ALTER TABLE block_picture_block DROP FOREIGN KEY FK_7A0C73CE93CB796C');
        $this->addSql('ALTER TABLE block_template_block DROP FOREIGN KEY FK_886C4B4A460D9FD7');
        $this->addSql('ALTER TABLE block_text_block DROP FOREIGN KEY FK_B8422614460D9FD7');
        $this->addSql('ALTER TABLE block_text_picture_block DROP FOREIGN KEY FK_3B11DE2A460D9FD7');
        $this->addSql('ALTER TABLE block_text_picture_block DROP FOREIGN KEY FK_3B11DE2A93CB796C');
        $this->addSql('ALTER TABLE block_three_column_block DROP FOREIGN KEY FK_BEA24F9B460D9FD7');
        $this->addSql('ALTER TABLE block_three_column_block DROP FOREIGN KEY FK_BEA24F9B4B499059');
        $this->addSql('ALTER TABLE block_three_column_block DROP FOREIGN KEY FK_BEA24F9B20157796');
        $this->addSql('ALTER TABLE block_three_column_block DROP FOREIGN KEY FK_BEA24F9BF1E466CA');
        $this->addSql('ALTER TABLE block_two_column_block DROP FOREIGN KEY FK_3A725155460D9FD7');
        $this->addSql('ALTER TABLE block_two_column_block DROP FOREIGN KEY FK_3A7251554B499059');
        $this->addSql('ALTER TABLE block_two_column_block DROP FOREIGN KEY FK_3A72515520157796');
        $this->addSql('ALTER TABLE block_video_block DROP FOREIGN KEY FK_D674CB5B460D9FD7');
        $this->addSql('ALTER TABLE media_format DROP FOREIGN KEY FK_62C3E80193CB796C');
        $this->addSql('ALTER TABLE navigation_content DROP FOREIGN KEY FK_B8473EDA460D9FD7');
        $this->addSql('ALTER TABLE navigation_link DROP FOREIGN KEY FK_12C4C83460D9FD7');
        $this->addSql('ALTER TABLE navigation_node DROP FOREIGN KEY FK_B2FF3D3739F79D6D');
        $this->addSql('ALTER TABLE navigation_node DROP FOREIGN KEY FK_B2FF3D37727ACA70');
        $this->addSql('ALTER TABLE navigation_submenu DROP FOREIGN KEY FK_E232466B460D9FD7');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFABCC7F8A8');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFA34ECB4E6');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFA84A0A3ED');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFA727ACA70');
        $this->addSql('ALTER TABLE setting_basic_value DROP FOREIGN KEY FK_FCEB877FEE35BD72');
        $this->addSql('ALTER TABLE setting_date_value DROP FOREIGN KEY FK_61D6AF98EE35BD72');
        $this->addSql('ALTER TABLE setting_media_value DROP FOREIGN KEY FK_39C6ED52EE35BD72');
        $this->addSql('ALTER TABLE setting_media_value DROP FOREIGN KEY FK_39C6ED5293CB796C');
        $this->addSql('ALTER TABLE setting_media_value_files DROP FOREIGN KEY FK_659369924870343F');
        $this->addSql('ALTER TABLE setting_media_value_files DROP FOREIGN KEY FK_6593699293CB796C');
        $this->addSql('ALTER TABLE setting_text_value DROP FOREIGN KEY FK_8D92FD49EE35BD72');
        $this->addSql('ALTER TABLE user_user_group DROP FOREIGN KEY FK_28657971A76ED395');
        $this->addSql('ALTER TABLE user_user_group DROP FOREIGN KEY FK_28657971FE54D947');
        $this->addSql('DROP TABLE block_blockquote_block');
        $this->addSql('DROP TABLE block_gallery_block');
        $this->addSql('DROP TABLE block_gallery_block_file');
        $this->addSql('DROP TABLE block_node');
        $this->addSql('DROP TABLE block_one_column_block');
        $this->addSql('DROP TABLE block_picture_block');
        $this->addSql('DROP TABLE block_template_block');
        $this->addSql('DROP TABLE block_text_block');
        $this->addSql('DROP TABLE block_text_picture_block');
        $this->addSql('DROP TABLE block_three_column_block');
        $this->addSql('DROP TABLE block_two_column_block');
        $this->addSql('DROP TABLE block_video_block');
        $this->addSql('DROP TABLE media_file');
        $this->addSql('DROP TABLE media_format');
        $this->addSql('DROP TABLE media_usage');
        $this->addSql('DROP TABLE navigation_content');
        $this->addSql('DROP TABLE navigation_link');
        $this->addSql('DROP TABLE navigation_navigation');
        $this->addSql('DROP TABLE navigation_node');
        $this->addSql('DROP TABLE navigation_submenu');
        $this->addSql('DROP TABLE page_page');
        $this->addSql('DROP TABLE routing_route');
        $this->addSql('DROP TABLE setting_basic_value');
        $this->addSql('DROP TABLE setting_date_value');
        $this->addSql('DROP TABLE setting_media_value');
        $this->addSql('DROP TABLE setting_media_value_files');
        $this->addSql('DROP TABLE setting_setting');
        $this->addSql('DROP TABLE setting_text_value');
        $this->addSql('DROP TABLE user_group');
        $this->addSql('DROP TABLE user_user');
        $this->addSql('DROP TABLE user_user_group');
    }
}
