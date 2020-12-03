# Projeto de Avaliação - Filmes!

Desenvolvido com Laravel e base sqlite foi buscado neste teste uma estrutura básica para mostrar o conhecimento do framework e também com a possibilidade de utilização do mesmo e sendo possível a ampliação.

### Link Postman Collection

https://www.postman.com/collections/26af0f4db3f8d5c2edc9

### Sobre Sqlite

Criar o banco de dados **database.sqlite** dentro da **pasta database**

### Passos para a instalação e ativação do servidor

Na raiz:

1.  composer install (para instalar a pasta vendor)
2.  php artisan migrate
3.  php artisan serve

### Ordem de inclusão via API

1.  Incluir Categorias
2.  Incluir Pessoas
3.  Incluir Filmes

### Informações

-   Por se tratar de um teste de funcionalidades da API, não foram criados seeders. Mas nada impede que o mesmo seja criado e atualizado este projeto.
-   Foi utilizado o sqlite pois ele facilita para um teste rápido.
-   Buscou o uso de Resources para respostas dos Json.
