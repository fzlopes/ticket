# Joker - The admin panel of [BeMobile](http://bemobile.cc)

[![PHP version](https://img.shields.io/packagist/php-v/symfony/symfony.svg)](https://travis-ci.org/laravel/framework)
[![Laravel version](https://img.shields.io/badge/Laravel-v5.6-brightgreen.svg)](https://travis-ci.org/laravel/framework)
[![BeMobile project](https://img.shields.io/badge/admin-BeMobile-blue.svg)](http://bemobile.cc)
[![Latest Stable Version](https://img.shields.io/badge/stable-v1.2.0-2d9cd2.svg)](http://bemobile.cc)
[![Latest Unstable Version](https://img.shields.io/badge/unstable-v1.3.0-orange.svg)](http://bemobile.cc)
[![Created Apps](https://img.shields.io/badge/apps-5-ff69b4.svg)](http://bemobile.cc)




Base do admin utilizado pela Be Mobile para desenvolver painéis administrativos utilizando Laravel com o template Metronic. 

## Desenvolvedores

Marcos Echevarria quinho@gmail.com

## Criando um novo admin

1. Clone este repositório na sua máquina local para sua nova aplicação

2. Configure o arquivo `.env` com as configurações do ambiente local

3. Instalando as dependências via composer (na raiz do projeto)
```composer install```

4. Dentro do diretório da nova aplicação gere a nova key (na raiz do projeto)
```php artisan key:generate```

5. Crie a base de dados que foi configurada no `.env`

6. Rode as migrations
```php artisan migrate```

7. Gere os seeds para a aplicação (se necessário adicione mais seeds)
```php artisan db:seed```

8. Rode a aplicação
```php artisan serve```

9. Criar a pasta photos na pasta public
