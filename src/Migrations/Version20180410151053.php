<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180410151053 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer ADD ip VARCHAR(255) NOT NULL, ADD marcamonitor VARCHAR(255) NOT NULL, ADD seriemonitor VARCHAR(255) NOT NULL, ADD usuariogenerico VARCHAR(255) NOT NULL, ADD noinventario VARCHAR(255) NOT NULL, ADD anioadquisicion VARCHAR(255) NOT NULL, ADD dominio VARCHAR(255) NOT NULL, ADD cantidadusuarios INT NOT NULL, ADD idnodo VARCHAR(255) NOT NULL, ADD origen VARCHAR(255) NOT NULL, ADD piso VARCHAR(255) NOT NULL, ADD tipoconsultorio VARCHAR(255) NOT NULL, ADD area VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP ip, DROP marcamonitor, DROP seriemonitor, DROP usuariogenerico, DROP noinventario, DROP anioadquisicion, DROP dominio, DROP cantidadusuarios, DROP idnodo, DROP origen, DROP piso, DROP tipoconsultorio, DROP area');
    }
}
