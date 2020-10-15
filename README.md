![alt text](enhavo.svg "enhavo")
<br/>
<br/>

The enhavo CMS is a open source PHP project on top of the fullstack Symfony framework and uses awesome Sylius components to serve a very flexible software, that can handle most of complex data structure with a clean and usability interface.

Demo
----

This is a enhavo demo project.

Use email **admin@enhavo.com** with password **admin** to log in into the backend under **/admin**

Install
-------

```
$ composer install
$ yarn install
```


Create a `.env.local`  file and add following line with your database credentials

```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
```

If your database doesn't exist yet, you can create it by following command

```
$ bin/console doctrine:database:create
```

Then execute this commands to get ready

```
$ yarn routes:dump
$ yarn encore dev
$ bin/console doctrine:migrations:migrate
$ bin/console doctrine:fixtures:load
$ bin/console enhavo:init
```

Now you can start the server

```
$ bin/console server:run
```

You should see a result that the server started already. Use the link to see if it works!

Use docker
----------

If you want to start the demo with docker you can use the `docker-compose.yml` file

```yaml
version: '3.3'

services:
   db:
     image: mysql:5.7
     environment:
       MYSQL_ROOT_PASSWORD: root
       MYSQL_DATABASE: demo
   web:
     depends_on:
       - db
     image: enhavo/enhavo-demo:latest
     ports:
       - "8080:80"
     environment:
       DATABASE_URL: mysql://root:root@db:3306/demo?serverVersion=5.7

```




