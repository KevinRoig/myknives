<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203132756 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE knife ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE knife ADD CONSTRAINT FK_BA409828A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BA409828A76ED395 ON knife (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE knife DROP FOREIGN KEY FK_BA409828A76ED395');
        $this->addSql('DROP INDEX IDX_BA409828A76ED395 ON knife');
        $this->addSql('ALTER TABLE knife DROP user_id');
    }
}
