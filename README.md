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

If you your database not exists yat you can create it by following command

```
$ bin/console doctrine:database:create
```

Then execute following commands to make get ready

```
$ yarn routes:dump
$ yarn encore dev
$ bin/console doctrine:migrations:migrate
$ bin/console doctrine:fixtures:load
$ bin/console enhavo:init
```

```
$ bin/console server:run
```

You should see a result that the server started already. Use the link to see if it works
