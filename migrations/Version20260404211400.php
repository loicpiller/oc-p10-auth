<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Makes employe.email unique — it's what users log in with, so duplicates would break auth.
 */
final class Version20260404211400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Enforce unique email on employe since it is the login identifier.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F804D3B9E7927C74 ON employe (email)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX UNIQ_F804D3B9E7927C74 ON employe');
    }
}
