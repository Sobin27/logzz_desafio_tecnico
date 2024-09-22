# Teste prático para Back-End 
***
Desafio técnico de um CRUD de produtos, onde é possivel o usuário criar, atualizar
e excluir um produto, também é possível importar pedidos de uma API externa. Tecnologias utilizadas
laravel e react.


## Instalação
Primeiro você precisa clonar o repositório
```bash
git clone https://github.com/Sobin27/logzz_desafio_tecnico.git
```
Depois entre na pasta do projeto
```bash
cd logzz_desafio_tecnico
```
Instale as dependências do composer
```bash
composer install
```
e Instale as dependências do npm
```bash
npm install
```
Após instalar todas as dependencias, crie um arquivo .env e copie o conteúdo do arquivo .env.example.

Importante se atentar as configurações de banco e também configurar a url da api externa.
segue abaixo um exemplo de configuração do arquivo .env
```
DB_CONNECTION=banco_de_dados
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desafio_logzz
DB_USERNAME=root
DB_PASSWORD=

API_EXTERNA="https://fakestoreapi.com/"
```
Após configurar o .env, execute os comandos abaixo para criar as chaves do projeto e JWT
```bash
php artisan key:generate
php artisan jwt:secret
```
Após criar as chaves, execute o comando abaixo para criar as tabelas no banco de dados
```bash
php artisan migrate
```
Pronto, agora o projeto está configura.

## Utilização
Para rodar o projeto execute o comando abaixo
```bash
php artisan serve
```
e em outro terminal execute o comando abaixo
```bash
npm run dev
```
acesse no seu navegador a rota: http://127.0.0.1:8000/ ou http://localhost:8000/

### Caso você queira importar os produtos da API externa, execute o comando abaixo:
```bash
php artisan import:products
```
Ou se preferir importar apenas um pedido, execute o seguinte comando:
```bash
php artisan import:products --id=id_produto
```
