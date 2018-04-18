<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180418203830 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nor1 (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer ADD nor1_id INT NOT NULL, DROP nor');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6EDC26500 FOREIGN KEY (nor1_id) REFERENCES nor1 (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A6EDC26500 ON computer (nor1_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6EDC26500');
        $this->addSql('DROP TABLE nor1');
        $this->addSql('DROP INDEX IDX_A298A7A6EDC26500 ON computer');
        $this->addSql('ALTER TABLE computer ADD nor VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP nor1_id');
    }
}
