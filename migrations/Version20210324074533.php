<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324074533 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE newsletter_subscriber_group DROP FOREIGN KEY FK_842BCA037808B1AD');
        $this->addSql('CREATE TABLE newsletter_pending_subscriber (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) DEFAULT NULL, subscription VARCHAR(255) DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:object)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter_local_subscriber (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) DEFAULT NULL, subscription VARCHAR(255) DEFAULT NULL, token VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter_local_subscriber_group (subscriber_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_1A8103D17808B1AD (subscriber_id), INDEX IDX_1A8103D1FE54D947 (group_id), PRIMARY KEY(subscriber_id, group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE newsletter_local_subscriber_group ADD CONSTRAINT FK_1A8103D17808B1AD FOREIGN KEY (subscriber_id) REFERENCES newsletter_local_subscriber (id)');
        $this->addSql('ALTER TABLE newsletter_local_subscriber_group ADD CONSTRAINT FK_1A8103D1FE54D947 FOREIGN KEY (group_id) REFERENCES newsletter_group (id)');
        $this->addSql('DROP TABLE newsletter_subscriber');
        $this->addSql('DROP TABLE newsletter_subscriber_group');
        $this->addSql('DROP INDEX UNIQ_F7129A80A0D96FBF ON user_user');
        $this->addSql('DROP INDEX UNIQ_F7129A8092FC23A8 ON user_user');
        $this->addSql('ALTER TABLE user_user DROP username_canonical, DROP email_canonical, CHANGE username username VARCHAR(180) DEFAULT NULL, CHANGE email email VARCHAR(180) DEFAULT NULL, CHANGE enabled enabled TINYINT(1) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(255) DEFAULT NULL, CHANGE roles roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F7129A80E7927C74 ON user_user (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F7129A80F85E0677 ON user_user (username)');
        $this->addSql('DROP INDEX UNIQ_8F02BF9D5E237E06 ON user_group');
        $this->addSql('ALTER TABLE user_group CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE roles roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE newsletter_subscribe_block ADD subscription VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE newsletter_local_subscriber_group DROP FOREIGN KEY FK_1A8103D17808B1AD');
        $this->addSql('CREATE TABLE newsletter_subscriber (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, active TINYINT(1) DEFAULT NULL, activated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE newsletter_subscriber_group (subscriber_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_842BCA037808B1AD (subscriber_id), INDEX IDX_842BCA03FE54D947 (group_id), PRIMARY KEY(subscriber_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE newsletter_subscriber_group ADD CONSTRAINT FK_842BCA037808B1AD FOREIGN KEY (subscriber_id) REFERENCES newsletter_subscriber (id)');
        $this->addSql('ALTER TABLE newsletter_subscriber_group ADD CONSTRAINT FK_842BCA03FE54D947 FOREIGN KEY (group_id) REFERENCES newsletter_group (id)');
        $this->addSql('DROP TABLE newsletter_pending_subscriber');
        $this->addSql('DROP TABLE newsletter_local_subscriber');
        $this->addSql('DROP TABLE newsletter_local_subscriber_group');
        $this->addSql('ALTER TABLE newsletter_subscribe_block DROP subscription');
        $this->addSql('ALTER TABLE user_group CHANGE name name VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F02BF9D5E237E06 ON user_group (name)');
        $this->addSql('DROP INDEX UNIQ_F7129A80E7927C74 ON user_user');
        $this->addSql('DROP INDEX UNIQ_F7129A80F85E0677 ON user_user');
        $this->addSql('ALTER TABLE user_user ADD username_canonical VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD email_canonical VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE username username VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE enabled enabled TINYINT(1) NOT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F7129A80A0D96FBF ON user_user (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F7129A8092FC23A8 ON user_user (username_canonical)');
    }
}
