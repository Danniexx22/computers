<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180418205716 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nor2 (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer ADD nor2_id INT NOT NULL, DROP nor2');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6FF77CAEE FOREIGN KEY (nor2_id) REFERENCES nor2 (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A6FF77CAEE ON computer (nor2_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6FF77CAEE');
        $this->addSql('DROP TABLE nor2');
        $this->addSql('DROP INDEX IDX_A298A7A6FF77CAEE ON computer');
        $this->addSql('ALTER TABLE computer ADD nor2 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP nor2_id');
    }
}
