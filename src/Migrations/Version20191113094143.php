<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191113094143 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answer CHANGE question_id question_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice CHANGE question_id question_id INT DEFAULT NULL, CHANGE value value VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD type_id INT DEFAULT NULL, CHANGE survey_id survey_id INT DEFAULT NULL, CHANGE value value VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EC54C8C93 ON question (type_id)');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answer CHANGE question_id question_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice CHANGE question_id question_id INT DEFAULT NULL, CHANGE value value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EC54C8C93');
        $this->addSql('DROP INDEX IDX_B6F7494EC54C8C93 ON question');
        $this->addSql('ALTER TABLE question DROP type_id, CHANGE survey_id survey_id INT DEFAULT NULL, CHANGE value value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
