<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180418161513 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE computer (id INT AUTO_INCREMENT NOT NULL, modelo_id INT NOT NULL, categoria_id INT NOT NULL, unidad_id INT NOT NULL, serie VARCHAR(255) NOT NULL, marca VARCHAR(255) NOT NULL, codigo VARCHAR(255) NOT NULL, ip VARCHAR(255) NOT NULL, marcamonitor VARCHAR(255) NOT NULL, seriemonitor VARCHAR(255) NOT NULL, usuariogenerico VARCHAR(255) NOT NULL, noinventario VARCHAR(255) NOT NULL, anioadquisicion VARCHAR(255) NOT NULL, dominio VARCHAR(255) NOT NULL, cantidadusuarios INT NOT NULL, idnodo VARCHAR(255) NOT NULL, origen VARCHAR(255) NOT NULL, piso VARCHAR(255) NOT NULL, tipoconsultorio VARCHAR(255) NOT NULL, area VARCHAR(255) NOT NULL, nombres VARCHAR(255) NOT NULL, paterno VARCHAR(255) NOT NULL, materno VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, matricula VARCHAR(255) NOT NULL, delegacion VARCHAR(255) NOT NULL, nor VARCHAR(255) NOT NULL, nor2 VARCHAR(255) NOT NULL, jefserv VARCHAR(255) NOT NULL, coordept VARCHAR(255) NOT NULL, norm VARCHAR(255) NOT NULL, tinmueble VARCHAR(255) NOT NULL, noinmueble VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A298A7A6AA3A9334 (serie), INDEX IDX_A298A7A6C3A9576E (modelo_id), INDEX IDX_A298A7A63397707A (categoria_id), INDEX IDX_A298A7A69D01464C (unidad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modelo (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, ram VARCHAR(50) NOT NULL, harddisk VARCHAR(50) NOT NULL, procesor VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unidad (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6C3A9576E FOREIGN KEY (modelo_id) REFERENCES modelo (id)');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A63397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A69D01464C FOREIGN KEY (unidad_id) REFERENCES unidad (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A63397707A');
        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6C3A9576E');
        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A69D01464C');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE computer');
        $this->addSql('DROP TABLE modelo');
        $this->addSql('DROP TABLE unidad');
    }
}
