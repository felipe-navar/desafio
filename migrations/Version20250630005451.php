<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250630005451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE veiculo DROP CONSTRAINT FK_B1231B8E36DB03EF');
        $this->addSql('ALTER TABLE veiculo ADD tipo VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE veiculo ADD CONSTRAINT FK_B1231B8E36DB03EF FOREIGN KEY (fipe_id) REFERENCES fipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE veiculo DROP CONSTRAINT fk_b1231b8e36db03ef');
        $this->addSql('ALTER TABLE veiculo DROP tipo');
        $this->addSql('ALTER TABLE veiculo ADD CONSTRAINT fk_b1231b8e36db03ef FOREIGN KEY (fipe_id) REFERENCES fipe (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
