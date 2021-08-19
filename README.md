# Teste: Desenvolvedor Fullstack (PHP)

## Instação com Laravel Sail - Docker

- `git clone git@github.com:FeTares/laravel-test-full-stack.git`
- `cd laravel-test-full-stack/`
- `cp .env.example .env`
- `docker run --rm -v $(pwd):/opt -w /opt laravelsail/php80-composer:latest composer install`
- `vendor/bin/sail up -d`
- `vendor/bin/sail composer install`
- `vendor/bin/sail artisan key:generate`
- `vendor/bin/sail artisan migrate`
- `vendor/bin/sail artisan passport:install`

## Unit Test

#### Rodar PHPUnit

```bash
# rodar PHPUnit para testar todos os casos
vendor/bin/sail test
# ou Feature Test apenas
vendor/bin/sail test --testsuite Feature
```

#### Code Coverage Report

```bash
# reports é o nome do diretório
vendor/bin/phpunit --coverage-html reports/
```

------------

#### Backend:
Crie uma pequena API para cadastro de usuários, deve conter criação, listagem, edição e remoção de registros.

As informações devem ser persistidas em um banco de dados. Um registro de usuário é constituído por, pelo menos, nome, e-mail, senha, telefone e uma foto. 

##### Pontos importantes:

Os valores recebidos devem ser validados;
Evite duplicação de arquivos no envio de imagens;
O e-mail deve ser único;

##### Requisitos Técnicos:

Utilize a linguagem de programação PHP na versão 7.3 ou superior;
Utilize o framework Laravel na versão 6 ou superior;
Utilize o banco de dados relacional;

#### Frontend:

Crie uma pequena aplicação frontend para utilizar a API desenvolvida.

##### Pontos importantes:

Exiba mensagens para orientar o usuário (erros, avisos e alertas).

##### Requisitos Técnicos:

Utilizar um framework Javascript (preferencialmente VueJS);

##### Diferenciais Técnicos:
VueX;
VueRouter;
Redis;
Testes;
GraphQL;
Docker.

Ao finalizar, documente em um arquivo **README.md** o processo necessário para que seja possível testar o código desenvolvido. Publique o código no **Github** e nos envie o link para acesso.
