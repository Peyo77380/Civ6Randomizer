<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210408105644 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE localization (id INT AUTO_INCREMENT NOT NULL, leader_id INT NOT NULL, country_id INT NOT NULL, translation VARCHAR(255) NOT NULL, dtype VARCHAR(255) NOT NULL, INDEX IDX_98DC9F4773154ED4 (leader_id), INDEX IDX_98DC9F47F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localization_language (localization_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_2B1E01596A2856C7 (localization_id), INDEX IDX_2B1E015982F1BAF4 (language_id), PRIMARY KEY(localization_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE localization ADD CONSTRAINT FK_98DC9F4773154ED4 FOREIGN KEY (leader_id) REFERENCES leader (id)');
        $this->addSql('ALTER TABLE localization ADD CONSTRAINT FK_98DC9F47F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE localization_language ADD CONSTRAINT FK_2B1E01596A2856C7 FOREIGN KEY (localization_id) REFERENCES localization (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE localization_language ADD CONSTRAINT FK_2B1E015982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE leader_translate');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE localization_language DROP FOREIGN KEY FK_2B1E01596A2856C7');
        $this->addSql('CREATE TABLE leader_translate (id INT AUTO_INCREMENT NOT NULL, language_id INT NOT NULL, data_type INT NOT NULL, dataType INT NOT NULL, leader_id INT NOT NULL, country_id INT NOT NULL, translation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_2E406AD382F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE leader_translate ADD CONSTRAINT FK_2E406AD382F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('DROP TABLE localization');
        $this->addSql('DROP TABLE localization_language');
    }
}
