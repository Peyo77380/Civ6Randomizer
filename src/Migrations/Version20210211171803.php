<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211171803 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, iso VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE leader_translate (id INT AUTO_INCREMENT NOT NULL, leader_id INT NOT NULL, language_id INT NOT NULL, name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, INDEX IDX_2E406AD373154ED4 (leader_id), INDEX IDX_2E406AD382F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE leader_translate ADD CONSTRAINT FK_2E406AD373154ED4 FOREIGN KEY (leader_id) REFERENCES leader (id)');
        $this->addSql('ALTER TABLE leader_translate ADD CONSTRAINT FK_2E406AD382F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE leader_translate DROP FOREIGN KEY FK_2E406AD382F1BAF4');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE leader_translate');
    }
}
