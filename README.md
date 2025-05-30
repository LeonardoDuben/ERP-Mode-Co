Projeto de loja virtual com cupons de desconto.

-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS sistema_cupom
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Usar o banco de dados
USE sistema_cupom;

-- Criar tabela de produtos
CREATE TABLE IF NOT EXISTS produtos (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserir alguns produtos de exemplo (opcional)
INSERT INTO produtos (nome, preco, created_at, updated_at) VALUES
('Notebook Dell', 2499.99, NOW(), NOW()),
('Mouse Logitech', 89.90, NOW(), NOW()),
('Teclado Mecânico', 299.00, NOW(), NOW()),
('Monitor 24"', 899.00, NOW(), NOW()),
('Webcam HD', 199.90, NOW(), NOW());

Configuração do .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_cupom
DB_USERNAME=root
DB_PASSWORD=sua_senha


# Sistema de Cupom

Sistema de gerenciamento de produtos desenvolvido em Laravel.

## Requisitos

- PHP >= 8.0
- Composer
- MySQL
- Node.js & NPM

## Instalação

1. Clone o repositório
```bash
git clone <https://github.com/seu-usuario/sistema-cupom.git>
cd sistema-cupom

​
Instale as dependências
composer install
npm install

​
Configure o ambiente
cp .env.example .env
php artisan key:generate

​
Configure o banco de dados no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_cupom
DB_USERNAME=root
DB_PASSWORD=sua_senha

​
Crie o banco de dados
mysql -u root -p < database/sistema_cupom.sql

​
Ou use as migrations:
php artisan migrate

​
Inicie o servidor
php artisan serve

​
Acesse: http://localhost:8000