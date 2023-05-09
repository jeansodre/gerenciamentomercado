# Sistema de Gerenciamento de Vendas Mercado - Teste Prática
# Escolhi o nome - Mercado São José para a Aplicação.

Este projeto é um sistema de gerenciamento de mercado, desenvolvido como um desafio técnico. O sistema permite o cadastro de produtos, tipos de produtos, valores percentuais de imposto dos tipos de produtos e a realização de vendas.

## Requisitos

- PHP 7.4 ou superior
- PostgreSQL
- Servidor nativo do PHP ou algum servidor web (Apache, Nginx, etc.)

## Instalação

1. Clone este repositório para a sua máquina local:
-Utilize o comando:
git clone https://github.com/SEU_USUARIO/sistema-mercado.git


2. Navegue até a pasta do projeto e instale as dependências, se houver:

cd sistema-mercado
composer install


3. Configure o banco de dados PostgreSQL ou MSSQL Server. Crie um banco de dados e usuário para a aplicação. Importe o backup do banco de dados fornecido no arquivo `backup.tar`:

pg_restore -U SEU_USUARIO -d SEU_BANCO_DE_DADOS -F t backup.tar


4. Atualize o arquivo de configuração do banco de dados (por exemplo, `config/database.php`) com as informações corretas do banco de dados.

5. Inicie o servidor nativo do PHP na raiz do projeto:

php -S localhost:8080



6. Abra o navegador e acesse a aplicação em `http://localhost:8080` - API
6. Abra o navegador e acesse a aplicação em `http://localhost:4200` - Aplicação


## Funcionalidades

- Cadastro de produtos
- Cadastro de tipos de produtos
- Cadastro dos valores percentuais de imposto dos tipos de produtos
- Realização de vendas com cálculo de impostos e totalização
- Listagem de vendas realizadas

## Desafio técnico

Este projeto foi desenvolvido como um desafio técnico para demonstrar habilidades em PHP, PostgreSQL Server, no front-end com Angular.

Durante o desenvolvimento do projeto, foram aplicados conhecimentos em design patterns, visando demonstrar as melhores práticas de desenvolvimento e garantir a qualidade do código.

