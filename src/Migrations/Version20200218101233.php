<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200218101233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE articles (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_art VARCHAR(255) NOT NULL, qt_art INTEGER NOT NULL, fournisseur_id INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE entrees (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, qt_entree INTEGER NOT NULL, article_id INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE fournisseurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_four VARCHAR(255) NOT NULL, site_web_four VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE sorties (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, qt_sortie INTEGER NOT NULL, article_id INTEGER NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE entrees');
        $this->addSql('DROP TABLE fournisseurs');
        $this->addSql('DROP TABLE sorties');
    }
}
