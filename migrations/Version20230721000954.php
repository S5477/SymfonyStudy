<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230721000954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'User schema';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE "users" (
                    id UUID NOT NULL, PRIMARY KEY(id),
                    name VARCHAR(50) NOT NULL,
                    surname VARCHAR(50) NOT NULL,
                    nickname VARCHAR(50) NOT NULL,
                    email VARCHAR(150) NOT NULL,
                    password VARCHAR(255) NOT NULL,
                    salt VARCHAR(10) NOT NULL,
                    created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP(0) WITHOUT TIME ZONE,
                    deleted_at TIMESTAMP(0) WITHOUT TIME ZONE,
                    UNIQUE (id, email, nickname)
                )
            '
        );

        $this->addSql('CREATE INDEX idx_nickname_email ON users (nickname, email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE "users"');
    }
}
