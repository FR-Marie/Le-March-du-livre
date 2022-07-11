<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220708140519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE genres ADD livres_id INT NOT NULL');
        $this->addSql('ALTER TABLE genres ADD CONSTRAINT FK_A8EBE516EBF07F38 FOREIGN KEY (livres_id) REFERENCES livres (id)');
        $this->addSql('CREATE INDEX IDX_A8EBE516EBF07F38 ON genres (livres_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE genres DROP FOREIGN KEY FK_A8EBE516EBF07F38');
        $this->addSql('DROP INDEX IDX_A8EBE516EBF07F38 ON genres');
        $this->addSql('ALTER TABLE genres DROP livres_id');
    }
}
