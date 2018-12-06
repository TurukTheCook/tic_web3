<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181206094033 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE traduction_target (id INT AUTO_INCREMENT NOT NULL, lang_code_id INT NOT NULL, traduction_source_id INT NOT NULL, INDEX IDX_17B4841B64BB6B3 (lang_code_id), INDEX IDX_17B4841B6563B46B (traduction_source_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE traduction_target ADD CONSTRAINT FK_17B4841B64BB6B3 FOREIGN KEY (lang_code_id) REFERENCES lang_code (id)');
        $this->addSql('ALTER TABLE traduction_target ADD CONSTRAINT FK_17B4841B6563B46B FOREIGN KEY (traduction_source_id) REFERENCES traduction_source (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE traduction_target DROP FOREIGN KEY FK_17B4841B6563B46B');
        $this->addSql('DROP TABLE traduction_target');
    }
}
