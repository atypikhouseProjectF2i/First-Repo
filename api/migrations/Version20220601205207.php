<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601205207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accommodation ADD type_accommodation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE accommodation ADD CONSTRAINT FK_2D385412D8A9137C FOREIGN KEY (type_accommodation_id) REFERENCES type_accommodation (id)');
        $this->addSql('CREATE INDEX IDX_2D385412D8A9137C ON accommodation (type_accommodation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accommodation DROP FOREIGN KEY FK_2D385412D8A9137C');
        $this->addSql('DROP INDEX IDX_2D385412D8A9137C ON accommodation');
        $this->addSql('ALTER TABLE accommodation DROP type_accommodation_id');
    }
}
