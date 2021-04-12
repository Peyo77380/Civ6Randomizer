<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412124848 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE localization_language');
        $this->addSql('ALTER TABLE localization ADD language_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE localization ADD CONSTRAINT FK_98DC9F4782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE localization ADD CONSTRAINT FK_98DC9F47F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_98DC9F4782F1BAF4 ON localization (language_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE localization_language (localization_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_2B1E01596A2856C7 (localization_id), INDEX IDX_2B1E015982F1BAF4 (language_id), PRIMARY KEY(localization_id, language_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE localization_language ADD CONSTRAINT FK_2B1E01596A2856C7 FOREIGN KEY (localization_id) REFERENCES localization (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE localization_language ADD CONSTRAINT FK_2B1E015982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE localization DROP FOREIGN KEY FK_98DC9F4782F1BAF4');
        $this->addSql('ALTER TABLE localization DROP FOREIGN KEY FK_98DC9F47F92F3E70');
        $this->addSql('DROP INDEX IDX_98DC9F4782F1BAF4 ON localization');
        $this->addSql('ALTER TABLE localization DROP language_id');
    }
}
