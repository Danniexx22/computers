<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180418212420 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE norm (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer ADD norm_id INT NOT NULL, DROP norm');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A66C19D51A FOREIGN KEY (norm_id) REFERENCES norm (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A66C19D51A ON computer (norm_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A66C19D51A');
        $this->addSql('DROP TABLE norm');
        $this->addSql('DROP INDEX IDX_A298A7A66C19D51A ON computer');
        $this->addSql('ALTER TABLE computer ADD norm VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP norm_id');
    }
}
