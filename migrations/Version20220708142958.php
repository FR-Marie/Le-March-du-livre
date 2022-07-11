<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220708142958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livres ADD vendeur_livre_id INT NOT NULL');
        $this->addSql('ALTER TABLE livres ADD CONSTRAINT FK_927187A4AAD1C4A8 FOREIGN KEY (vendeur_livre_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_927187A4AAD1C4A8 ON livres (vendeur_livre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livres DROP FOREIGN KEY FK_927187A4AAD1C4A8');
        $this->addSql('DROP INDEX IDX_927187A4AAD1C4A8 ON livres');
        $this->addSql('ALTER TABLE livres DROP vendeur_livre_id');
    }
}
