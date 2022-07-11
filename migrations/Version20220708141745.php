<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220708141745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livres ADD genre_livre_id INT NOT NULL');
        $this->addSql('ALTER TABLE livres ADD CONSTRAINT FK_927187A48484DA76 FOREIGN KEY (genre_livre_id) REFERENCES genres (id)');
        $this->addSql('CREATE INDEX IDX_927187A48484DA76 ON livres (genre_livre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livres DROP FOREIGN KEY FK_927187A48484DA76');
        $this->addSql('DROP INDEX IDX_927187A48484DA76 ON livres');
        $this->addSql('ALTER TABLE livres DROP genre_livre_id');
    }
}
