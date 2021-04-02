<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210330181124 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE leader_translate ADD CONSTRAINT FK_2E406AD373154ED4 FOREIGN KEY (leader_id) REFERENCES leader (id)');
        $this->addSql('ALTER TABLE leader_translate ADD CONSTRAINT FK_2E406AD3F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_2E406AD373154ED4 ON leader_translate (leader_id)');
        $this->addSql('CREATE INDEX IDX_2E406AD3F92F3E70 ON leader_translate (country_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE leader_translate DROP FOREIGN KEY FK_2E406AD373154ED4');
        $this->addSql('ALTER TABLE leader_translate DROP FOREIGN KEY FK_2E406AD3F92F3E70');
        $this->addSql('DROP INDEX IDX_2E406AD373154ED4 ON leader_translate');
        $this->addSql('DROP INDEX IDX_2E406AD3F92F3E70 ON leader_translate');
    }
}
