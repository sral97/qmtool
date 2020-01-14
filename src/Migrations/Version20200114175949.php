<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200114175949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Initial creation of the basic tables.';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE corrective_action (id INT AUTO_INCREMENT NOT NULL, incident_id INT NOT NULL, analysis_and_idea LONGTEXT DEFAULT NULL, actions LONGTEXT DEFAULT NULL, approved_by_management TINYINT(1) DEFAULT NULL, implemented_until DATE DEFAULT NULL, implemented_by VARCHAR(255) DEFAULT NULL, effectiveness_proofed_by VARCHAR(255) DEFAULT NULL, effectiveness_proofed_at DATE DEFAULT NULL, effectiveness_proofed_through LONGTEXT DEFAULT NULL, INDEX IDX_ECD872CE59E53FB9 (incident_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE incident (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, reporter VARCHAR(255) NOT NULL, type SMALLINT NOT NULL, description VARCHAR(500) NOT NULL, immediate_action LONGTEXT NOT NULL, fixed TINYINT(1) NOT NULL, corrective_action_needed TINYINT(1) NOT NULL, responsible_quality_manager VARCHAR(255) NOT NULL, poor_quality_costs INT DEFAULT NULL, overhead INT DEFAULT NULL, risk LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE corrective_action ADD CONSTRAINT FK_ECD872CE59E53FB9 FOREIGN KEY (incident_id) REFERENCES incident (id)');
    }

    public function down(Schema $schema) : void
    {
        // Ain't gonna happen
    }
}
