![image](https://github.com/user-attachments/assets/7ff17f2b-a482-4da9-9da3-a2708360c125)
![image](https://github.com/user-attachments/assets/fc2511a5-6f8f-4ad4-aadf-204accd9403a)
![image](https://github.com/user-attachments/assets/52e7b875-172c-4156-82b7-b458471a0e7c)
![image](https://github.com/user-attachments/assets/910d7241-453c-48b1-8982-c8b921b4e1cd)
![image](https://github.com/user-attachments/assets/a4fd8b88-62bc-421a-8c3f-010da0bfbb39)

# Mode\&Co E-commerce 🛍️

**Mode\&Co** é um projeto de e-commerce de vestuário desenvolvido com o objetivo de aplicar conceitos modernos de desenvolvimento web utilizando o framework Laravel. A plataforma permite que usuários se cadastrem, explorem um catálogo de produtos, gerenciem seus carrinhos de compras e finalizem pedidos com cálculo de frete em tempo real.

Este projeto serve como um portfólio prático, demonstrando a implementação de funcionalidades essenciais de uma loja virtual, desde a autenticação de usuários até a integração com APIs externas para cálculo de frete.

-----

## ✨ Funcionalidades Principais

  * 👤 **Autenticação de Usuário:** Sistema completo de Registro e Login.
  * 📦 **Gerenciamento de Produtos:** Funcionalidade para o administrador registrar, atualizar e remover produtos do catálogo.
  * 👕 **Listagem de Produtos:** Página principal com a exibição de todos os produtos disponíveis para os clientes.
  * 🛒 **Carrinho de Compras:** Os usuários podem adicionar e remover produtos do carrinho, que persiste durante a sessão.
  * 🚚 **Checkout com Cálculo de Frete:** Processo de finalização de compra com cálculo de frete dinâmico baseado no CEP do usuário, utilizando a API **ViaCEP**.

-----

## ✨ Adições Futuras
  * 👤 **Cupons:** Sistema de cupons para desconto.
  * 📦 **Melhoras FrontEnd:** Melhoria no Desingn do site.
  * 👕 **Frete Grátis:** Frete Grátis acima de valor X.
  * 🛒 **Gerenciamento de permissões:** Sistema de permissão para quem pode adicionar produtos.


## 🛠️ Tecnologias e Ferramentas Utilizadas

  * **Backend:** PHP 8.3 / Laravel 12.16
  * **Frontend:** Blade Templates, HTML5, CSS3, JavaScript
  * **Banco de Dados:** MySQL
  * **Servidor:** `php artisan serve` para ambiente local)
  * **API Externa:** [ViaCEP](https://viacep.com.br/) para consulta de endereços e cálculo de frete.
  * **Gerenciador de Dependências:** Composer

## 🚀 Como Executar o Projeto

Siga os passos abaixo para configurar e rodar o projeto em seu ambiente local.

### Pré-requisitos

  * [PHP](https://www.php.net/downloads.php) (versão 8.1 ou superior)
  * [Composer](https://getcomposer.org/)
  * [Node.js](https://nodejs.org/en/) e NPM (opcional, para assets de frontend)
  * Um servidor de banco de dados (MySQL, MariaDB, etc.)

### Passos de Instalação

1.  **Clone o repositório:**

    ```bash
    git clone https://github.com/LeonardoDuben/ERP-Mode-Co.git
    ```

2.  **Instale as dependências do PHP:**

    ```bash
    composer install
    ```

3.  **Crie o arquivo de ambiente:**
    Copie o arquivo de exemplo `.env.example` para um novo arquivo chamado `.env`.

    ```bash
    cp .env.example .env
    ```

4.  **Gere a chave da aplicação:**

    ```bash
    php artisan key:generate
    ```

5.  **Configure o banco de dados:**
    Abra o arquivo `.env` e edite as variáveis `DB_*` com as credenciais do seu banco de dados local.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=mode_co
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6.  **Execute as Migrations:**
    Este comando irá criar todas as tabelas necessárias no seu banco de dados.

    ```bash
    php artisan migrate
    ```

    *Opcional: Se você criou seeders para popular o banco com dados iniciais (produtos, usuários, etc.), execute:*

    ```bash
    php artisan db:seed
    ```

7.  **Inicie o servidor local:**

    ```bash
    php artisan serve
    ```

8.  Pronto\! Agora você pode acessar o projeto em seu navegador.

-----

## 🔄 Como Usar

1.  Acesse a página de **Registro** para criar uma nova conta de usuário.
2.  Faça **Login** com suas credenciais.
3.  Navegue pela página de produtos e adicione os itens desejados ao carrinho clicando no botão "Adicionar ao Carrinho".
4.  Acesse o seu **Carrinho** para revisar os produtos.
5.  Prossiga para o **Checkout**, informe o seu CEP para que o frete seja calculado e o endereço preenchido automaticamente.
6.  Clique em "Finalizar Compra" para concluir o processo.

-----

Desenvolvido por Leonardo Duben
