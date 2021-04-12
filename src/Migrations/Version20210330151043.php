<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210330151043 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE leader_translate DROP FOREIGN KEY FK_2E406AD373154ED4');
        $this->addSql('DROP INDEX IDX_2E406AD373154ED4 ON leader_translate');
        $this->addSql('ALTER TABLE leader_translate ADD dataType INT NOT NULL, ADD translation_id INT NOT NULL, DROP name, DROP country, CHANGE leader_id data_type INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_2E406AD39CAA2B25 ON leader_translate (translation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_2E406AD39CAA2B25 ON leader_translate');
        $this->addSql('ALTER TABLE leader_translate ADD leader_id INT NOT NULL, ADD name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD country VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP data_type, DROP dataType, DROP translation_id');
        $this->addSql('ALTER TABLE leader_translate ADD CONSTRAINT FK_2E406AD373154ED4 FOREIGN KEY (leader_id) REFERENCES leader (id)');
        $this->addSql('CREATE INDEX IDX_2E406AD373154ED4 ON leader_translate (leader_id)');
    }
}
