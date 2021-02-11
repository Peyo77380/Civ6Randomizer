<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211170544 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE leader_local_data_en');
        $this->addSql('DROP TABLE leader_local_data_fr');
        $this->addSql('DROP TABLE leader_local_data_ru');
        $this->addSql('ALTER TABLE leader ADD name VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE leader_local_data_en (id INT AUTO_INCREMENT NOT NULL, leader_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, country VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_DBFC4F6B73154ED4 (leader_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE leader_local_data_fr (id INT AUTO_INCREMENT NOT NULL, leader_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, country VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_E4D040E773154ED4 (leader_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE leader_local_data_ru (id INT AUTO_INCREMENT NOT NULL, leader_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, country VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_541A021173154ED4 (leader_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE leader_local_data_en ADD CONSTRAINT FK_DBFC4F6B73154ED4 FOREIGN KEY (leader_id) REFERENCES leader (id)');
        $this->addSql('ALTER TABLE leader_local_data_fr ADD CONSTRAINT FK_E4D040E773154ED4 FOREIGN KEY (leader_id) REFERENCES leader (id)');
        $this->addSql('ALTER TABLE leader_local_data_ru ADD CONSTRAINT FK_541A021173154ED4 FOREIGN KEY (leader_id) REFERENCES leader (id)');
        $this->addSql('ALTER TABLE leader DROP name, DROP country');
    }
}
