<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601204921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accommodation_activity (accommodation_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_F150262C8F3692CD (accommodation_id), INDEX IDX_F150262C81C06096 (activity_id), PRIMARY KEY(accommodation_id, activity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accommodation_activity ADD CONSTRAINT FK_F150262C8F3692CD FOREIGN KEY (accommodation_id) REFERENCES accommodation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accommodation_activity ADD CONSTRAINT FK_F150262C81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accommodation DROP FOREIGN KEY FK_2D38541281C06096');
        $this->addSql('DROP INDEX IDX_2D38541281C06096 ON accommodation');
        $this->addSql('ALTER TABLE accommodation DROP activity_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE accommodation_activity');
        $this->addSql('ALTER TABLE accommodation ADD activity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE accommodation ADD CONSTRAINT FK_2D38541281C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('CREATE INDEX IDX_2D38541281C06096 ON accommodation (activity_id)');
    }
}
