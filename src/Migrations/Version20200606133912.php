<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200606133912 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE shopper (id INT AUTO_INCREMENT NOT NULL, customers_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, contact INT NOT NULL, creatdat DATETIME NOT NULL, upddat DATETIME DEFAULT NULL, INDEX IDX_26663F5DC3568B40 (customers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apiuser (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, creatdat DATETIME NOT NULL, upddat DATETIME DEFAULT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_837A8987F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, administrators_id INT NOT NULL, name VARCHAR(100) NOT NULL, series VARCHAR(100) NOT NULL, numseries VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, pictureurl VARCHAR(255) DEFAULT NULL, quantity INT NOT NULL, price DOUBLE PRECISION NOT NULL, creatdat DATETIME NOT NULL, upddat DATETIME DEFAULT NULL, INDEX IDX_D34A04ADD5E2D82F (administrators_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_shopper (product_id INT NOT NULL, shopper_id INT NOT NULL, INDEX IDX_F7BF24ED4584665A (product_id), INDEX IDX_F7BF24EDFE2A96A4 (shopper_id), PRIMARY KEY(product_id, shopper_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT NOT NULL, contact INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE administrator (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shopper ADD CONSTRAINT FK_26663F5DC3568B40 FOREIGN KEY (customers_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADD5E2D82F FOREIGN KEY (administrators_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE product_shopper ADD CONSTRAINT FK_F7BF24ED4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_shopper ADD CONSTRAINT FK_F7BF24EDFE2A96A4 FOREIGN KEY (shopper_id) REFERENCES shopper (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09BF396750 FOREIGN KEY (id) REFERENCES apiuser (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE administrator ADD CONSTRAINT FK_58DF0651BF396750 FOREIGN KEY (id) REFERENCES apiuser (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_shopper DROP FOREIGN KEY FK_F7BF24EDFE2A96A4');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09BF396750');
        $this->addSql('ALTER TABLE administrator DROP FOREIGN KEY FK_58DF0651BF396750');
        $this->addSql('ALTER TABLE product_shopper DROP FOREIGN KEY FK_F7BF24ED4584665A');
        $this->addSql('ALTER TABLE shopper DROP FOREIGN KEY FK_26663F5DC3568B40');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADD5E2D82F');
        $this->addSql('DROP TABLE shopper');
        $this->addSql('DROP TABLE apiuser');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_shopper');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE administrator');
    }
}
