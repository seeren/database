[![Codacy Badge](https://api.codacy.com/project/badge/Grade/de22108fe4b94e9691bcae0f9da7b73a)](https://www.codacy.com/app/seeren/database?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/database&amp;utm_campaign=Badge_Grade) [![Build Status](https://travis-ci.org/seeren/database.svg?branch=master)](https://travis-ci.org/seeren/database) [![GitHub license](https://img.shields.io/badge/license-MIT-orange.svg)](https://raw.githubusercontent.com/seeren/database/master/LICENSE) [![Packagist](https://img.shields.io/packagist/v/seeren/database.svg)](https://packagist.org/packages/seeren/database#v1.0.4) [![Packagist](https://img.shields.io/packagist/dt/seeren/database.svg)](https://packagist.org/packages/seeren/database/stats)

# Seeren\Database\
Data mapper and syntax resolvers.
Table is an entity like, dal provide access objects then access objects resolve query syntax and execute an operation. There is one access object per operation, like select, update, drop, delete etc.

## Seeren\Database\Table
TableInterface allow to query layer and objects with tables. A mapped object can execute operation for a layer.
```php
$table->create($dal);
$table->foo = "foo";
$table->bar = "bar";
$table->insert($dal);
```
Using a layer, the table can execute operation for differents thread of connection and do not require configuration for persistent layer. Operations allowed for tables are defined as constant class in DalInterface.

## Seeren\Database\Dal
Dal can be used for access limitation, providing only specific operations.
```php
$dal = new Dal([
    Dal::OPEN   => OpenMySqlDao::class,
    Dal::SELECT => SelectMySqlDao::class
]);
```
Or can be driver oriented providing full common operation.
```php
$dal = new MySqlDal;
```
Access layer can provid access object.
```php
$select = $dal->getObject("select");
```
Dal query method is one of the tree way to execute query.
```php
$dal->query($table, "select");
```

## Seeren\Database\Dao
Access object can be manipulated directy for execute an operation for a table and an access layer.
```php
$select->query($table, $dal);
```

## Installation
Require this package with composer
```
composer require seeren/database dev-master
```

## Run the tests
Run with phpunit after install dependencies
```
composer update
phpunit
```

## Authors
* **Cyril Ichti** - [www.seeren.fr](http://www.seeren.fr)