<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180405222246 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6B797D96');
        $this->addSql('DROP INDEX IDX_A298A7A6B797D96 ON computer');
        $this->addSql('ALTER TABLE computer CHANGE codigo_id modelo_id INT NOT NULL, CHANGE modelo codigo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6C3A9576E FOREIGN KEY (modelo_id) REFERENCES modelo (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A6C3A9576E ON computer (modelo_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6C3A9576E');
        $this->addSql('DROP INDEX IDX_A298A7A6C3A9576E ON computer');
        $this->addSql('ALTER TABLE computer CHANGE modelo_id codigo_id INT NOT NULL, CHANGE codigo modelo VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6B797D96 FOREIGN KEY (codigo_id) REFERENCES modelo (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A6B797D96 ON computer (codigo_id)');
    }
}
