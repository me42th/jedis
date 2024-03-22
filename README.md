# Configuração
## Instalação do projeto
### [[Configuração](./README.md)] | [[Desafio](./DESAFIO.md)] | [[API](./API.md)]
<br><br>
### Guarde o retorno do comando _passport:client_, você irá precisar para configurar [[API](./API.md)]
~~~
 git clone git clone https://github.com/me42th/jedis
 docker-compose up -d
 docker-compose exec laravel composer install
 docker-compose exec laravel cp .env.example .env
 docker-compose exec laravel php artisan key:generate
 docker-compose exec laravel php artisan migrate
 docker-compose exec laravel php artisan db:seed
 docker-compose exec laravel php artisan passport:client --password
 docker-compose exec laravel ./vendor/bin/pest
~~~
