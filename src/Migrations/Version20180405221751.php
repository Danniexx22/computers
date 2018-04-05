<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180405221751 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE modelo (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, ram VARCHAR(50) NOT NULL, harddisk VARCHAR(50) NOT NULL, procesor VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP INDEX UNIQ_A298A7A620332D99 ON computer');
        $this->addSql('ALTER TABLE computer ADD codigo_id INT NOT NULL, DROP codigo');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6B797D96 FOREIGN KEY (codigo_id) REFERENCES modelo (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A6B797D96 ON computer (codigo_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6B797D96');
        $this->addSql('DROP TABLE modelo');
        $this->addSql('DROP INDEX IDX_A298A7A6B797D96 ON computer');
        $this->addSql('ALTER TABLE computer ADD codigo VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP codigo_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A298A7A620332D99 ON computer (codigo)');
    }
}
