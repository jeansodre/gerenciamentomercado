# Sistema de Gerenciamento de Vendas Mercado - Teste Prática
![apresentacao](https://github.com/jeansodre/gerenciamentomercado/assets/124155102/0210c792-942d-46f4-9586-9906ddf5ff4d)

# Escolhi o nome - Mercado São José para a Aplicação.

Este projeto é um sistema de gerenciamento de mercado, desenvolvido como um desafio técnico. O sistema permite o cadastro de produtos, tipos de produtos, valores percentuais de imposto dos tipos de produtos e a realização de vendas.

# Vídeo Apresentação

Gravei um breve vídeo demonstrando todas as funcionalidades do programa, para o caso de um acesso mais rápido:
https://www.jeansodre.com/projeto/

## Requisitos

- PHP 7.4 ou superior
- PostgreSQL
- Servidor nativo do PHP ou algum servidor web (Apache, Nginx, etc.)

## Instalação

1. Clone este repositório para a sua máquina local com:

git clone 


2. Navegue até a pasta do projeto front e instale as dependências, rode o comando:
npm install/ yarn install

2.1 Navegue até a pasta back-end e rode o seguinte comando:
composer install


3. Configure o banco de dados PostgreSQL. Na raiz do projeto tem um docker-compose.yml, um container com docker. (é necessário ter o docker instalado na máquina) Na raiz do projeto, dê o seguinte comando: (você precisa estar vendo o arquivo docker-compose.yml com o comando ls)

dock-compose up -d


4. Importe o backup do banco de dados fornecido no arquivo `backup.tar`:

pg_restore -U SEU_USUARIO -d SEU_BANCO_DE_DADOS -F t backup.tar


5. Atualize o arquivo de configuração do banco de dados (back-end/api/models/database.php`) com as informações corretas do banco de dados.


6. Inicie o servidor nativo do PHP na raiz do back-end. Navegue até a pasta back-end e execute:(você precisa estar vendo o diretório dapi com o comando ls)

php -S localhost:8080 -t api

7. Inicie o front-end da aplicação, navegue até a pasta front, e execute o comando:

ng serve


`http://localhost:8080` - API
`http://localhost:4200` - Aplicação


## Funcionalidades

- Cadastro de produtos
- Cadastro de tipos de produtos
- Cadastro dos valores percentuais de imposto dos tipos de produtos
- Realização de vendas com cálculo de impostos e totalização
- Listagem de vendas realizadas

## Desafio técnico

Este projeto foi desenvolvido como um desafio técnico para demonstrar habilidades em PHP, PostgreSQL Server, no front-end com Angular.

Durante o desenvolvimento do projeto, foram aplicados conhecimentos em design patterns, visando demonstrar as melhores práticas de desenvolvimento e garantir a qualidade do código.

