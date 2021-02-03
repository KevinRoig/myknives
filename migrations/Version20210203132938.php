<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203132938 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, real_location VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE knife ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE knife ADD CONSTRAINT FK_BA40982864D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_BA40982864D218E ON knife (location_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE knife DROP FOREIGN KEY FK_BA40982864D218E');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP INDEX IDX_BA40982864D218E ON knife');
        $this->addSql('ALTER TABLE knife DROP location_id');
    }
}
