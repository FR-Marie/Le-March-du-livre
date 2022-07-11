<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220708142157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livres ADD format_livre_id INT NOT NULL');
        $this->addSql('ALTER TABLE livres ADD CONSTRAINT FK_927187A490E3151F FOREIGN KEY (format_livre_id) REFERENCES formats (id)');
        $this->addSql('CREATE INDEX IDX_927187A490E3151F ON livres (format_livre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livres DROP FOREIGN KEY FK_927187A490E3151F');
        $this->addSql('DROP INDEX IDX_927187A490E3151F ON livres');
        $this->addSql('ALTER TABLE livres DROP format_livre_id');
    }
}
