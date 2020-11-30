# Catálogo de Cinema

App de apoio desenvolvida durante a mentoria de desenvolvimento web utilizando o framework CakePHP. E projeto de migração do CakePHP 2 para CakePHP 4

Mais detalhes:
- [joacir.dev] (https://joacir.dev/introducao-ao-cakephp-4-e-roteiro-de-migracao-de-sistemas/)

## Pré requisito

- [CakePHP versão 4.x] (https://github.com/cakephp/cakephp/)

## Como instalar

Clone o projeto na pasta webroot do seu servidor web. Ex: "public_html", "htdocs", etc: 

```
git clone git@github.com:aelian-repo/cinema.git cinema
cd cinema
git checkout "Migração-para-Cake4"
php composer.phar update 
git clone git@github.com:aelian-repo/Pdf.git plugins/Pdf
```

## Crie o banco de dados

- host: localhost
- database: cinema
- user: root
- senha: 1234

O schema do database esta na pasta "config\schema\metatada.sql"