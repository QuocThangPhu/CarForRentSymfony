<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220617035253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, created_user_id_id INT NOT NULL, thumbnail_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, seats INT NOT NULL, year INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_773DE69D3C026CAE (created_user_id_id), UNIQUE INDEX UNIQ_773DE69DBED34FF2 (thumbnail_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rent (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, car_id INT NOT NULL, status VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_2784DCCA76ED395 (user_id), INDEX IDX_2784DCCC3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D3C026CAE FOREIGN KEY (created_user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DBED34FF2 FOREIGN KEY (thumbnail_id_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCCC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCCC3C6F69F');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DBED34FF2');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D3C026CAE');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCCA76ED395');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE rent');
        $this->addSql('DROP TABLE user');
    }
}
