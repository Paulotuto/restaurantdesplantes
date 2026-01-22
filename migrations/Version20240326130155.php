<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240326130155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evasion_et_terroir (id INT AUTO_INCREMENT NOT NULL, entree LONGTEXT NOT NULL, plat_1 LONGTEXT NOT NULL, plat_2 LONGTEXT DEFAULT NULL, dessert LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_caroussel DROP extrait, CHANGE description description VARCHAR(1000) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE evasion_et_terroir');
        $this->addSql('ALTER TABLE article_caroussel ADD extrait VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL');
    }
}
