<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602073203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE images_projet (id INT AUTO_INCREMENT NOT NULL, projets_id INT DEFAULT NULL, nom_fichier VARCHAR(255) NOT NULL, INDEX IDX_92EF5BEF597A6CB7 (projets_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE images_projet ADD CONSTRAINT FK_92EF5BEF597A6CB7 FOREIGN KEY (projets_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE projet DROP images');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE images_projet');
        $this->addSql('ALTER TABLE projet ADD images VARCHAR(255) NOT NULL');
    }
}
