<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250120222719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fipe (id SERIAL NOT NULL, codigo VARCHAR(8) NOT NULL, valor DOUBLE PRECISION NOT NULL, historico DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE veiculo (id SERIAL NOT NULL, fipe_id INT NOT NULL, fabricante VARCHAR(50) NOT NULL, modelo VARCHAR(50) NOT NULL, ano INT NOT NULL, versao VARCHAR(255) NOT NULL, preco DOUBLE PRECISION NOT NULL, qtd_estoque INT NOT NULL, cidade VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B1231B8E36DB03EF ON veiculo (fipe_id)');
        $this->addSql('ALTER TABLE veiculo ADD CONSTRAINT FK_B1231B8E36DB03EF FOREIGN KEY (fipe_id) REFERENCES fipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE veiculo DROP CONSTRAINT FK_B1231B8E36DB03EF');
        $this->addSql('DROP TABLE fipe');
        $this->addSql('DROP TABLE veiculo');
    }
}
