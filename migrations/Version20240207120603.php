<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207120603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE juego (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, imagen LONGBLOB DEFAULT NULL, min_jug INT DEFAULT NULL, max_jug INT DEFAULT NULL, tipomesa_id INT DEFAULT NULL, INDEX IDX_F0EC403DE7566B72 (tipomesa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE mesa (id INT AUTO_INCREMENT NOT NULL, disponible TINYINT(1) NOT NULL, tipomesa_id INT DEFAULT NULL, INDEX IDX_98B382F2E7566B72 (tipomesa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE reserva (id INT AUTO_INCREMENT NOT NULL, completada TINYINT(1) DEFAULT NULL, fecha_inicio DATETIME DEFAULT NULL, fecha_fin DATETIME DEFAULT NULL, juego_id INT DEFAULT NULL, usuario_id INT DEFAULT NULL, mesa_id INT DEFAULT NULL, INDEX IDX_188D2E3B13375255 (juego_id), INDEX IDX_188D2E3BDB38439E (usuario_id), INDEX IDX_188D2E3B8BDC7AE9 (mesa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE rol (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tipo_mesa (id INT AUTO_INCREMENT NOT NULL, ancho INT NOT NULL, largo INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(20) NOT NULL, apellidos VARCHAR(30) DEFAULT NULL, nickname VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, puntuacion INT DEFAULT NULL, rol_id INT DEFAULT NULL, INDEX IDX_2265B05D4BAB96C (rol_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE juego ADD CONSTRAINT FK_F0EC403DE7566B72 FOREIGN KEY (tipomesa_id) REFERENCES tipo_mesa (id)');
        $this->addSql('ALTER TABLE mesa ADD CONSTRAINT FK_98B382F2E7566B72 FOREIGN KEY (tipomesa_id) REFERENCES tipo_mesa (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B13375255 FOREIGN KEY (juego_id) REFERENCES juego (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B8BDC7AE9 FOREIGN KEY (mesa_id) REFERENCES mesa (id)');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D4BAB96C FOREIGN KEY (rol_id) REFERENCES rol (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE juego DROP FOREIGN KEY FK_F0EC403DE7566B72');
        $this->addSql('ALTER TABLE mesa DROP FOREIGN KEY FK_98B382F2E7566B72');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3B13375255');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BDB38439E');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3B8BDC7AE9');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D4BAB96C');
        $this->addSql('DROP TABLE juego');
        $this->addSql('DROP TABLE mesa');
        $this->addSql('DROP TABLE reserva');
        $this->addSql('DROP TABLE rol');
        $this->addSql('DROP TABLE tipo_mesa');
        $this->addSql('DROP TABLE usuario');
    }
}
