# database
 [![Build Status](https://travis-ci.org/seeren/database.svg?branch=master)](https://travis-ci.org/seeren/database) [![Coverage Status](https://coveralls.io/repos/github/seeren/database/badge.svg?branch=master)](https://coveralls.io/github/seeren/database?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/database.svg)](https://packagist.org/packages/seeren/database/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/4a0463fb5a084be5bda68e4e36d7c7ac)](https://www.codacy.com/app/seeren/database?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/database&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/database.svg)](https://packagist.org/packages/seeren/database#) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

**Data mapper and syntax resolvers**

## Features
* Database abstraction

## Installation
Require this package with [composer](https://getcomposer.org/)
```
composer require seeren/database dev-master
```

## Table Usage
#### `Seeren\Table\TableInterface`
A database table can be manipulated as object without write query syntax and without manager
```php
class MyTable extends AbstractTable implements TableInterface
{
    const NAME = "my_table";
    public function __construct()
    {
        parent::__construct();
        $this->addColumn(new StringColumn("foo", StringColumn::CHAR, 80));
        $this->addColumn(
            new StringColumn("bar", StringColumn::CHAR, 80, [
                StringColumn::OPT_NOT_NULL
            ])
        );
        $this->addKey(new Key(Key::PRIMARY, ["foo"]));
    }
}
```
Tables can be encoded to json
```php
echo json_encode($table);
```

 #### `Seeren\Table\User\User`
 The user table can be used for define database access rights. User implementations can be used for open a connection, create, use or delete a database
 ```php
class MyUser extends User
{
    public function __construct()
    {
        parent::__construct();
        $this->user = "root";
        $this->password = "";
        $this->host = "localhost";
        $this->dbname = "database_name";
        $this->charset = "utf8";
    }
}
```

## Layer Usage
#### `Seeren\Dal\DalInterface`
The layer handle database connection. You can use setLayer for provide PDO object or use the User class and the open  operation
```php
$layer = new MySqlDal;
$user->open($layer);
```
Table can use layers for execute database operations
```php
$table = new MyTable;
$table->foo = "foo";
$table->bar = "bar";
$table->insert($layer);
```
Layer can use tables for execute database operations. DalInterface provide severals default operations like create, insert, select, update
```php
$layer->query($table, "insert");
```

## Resolvers Usage
#### `Seeren\Dao\DaoInterface`
Syntax resolvers are available using the getObject method of a layer. Object query method is one of the tree way to execute the query operations
```php
$select = $layer->getObject("select");
$select->query($table, $layer);
```

## Run Unit tests
Install dependencies
```
composer update
```
Run [phpunit](https://phpunit.de/) with [Xdebug](https://xdebug.org/) enabled and [OPcache](http://php.net/manual/fr/book.opcache.php) disabled for coverage
```
./vendor/bin/phpunit
```
## Run Coverage
Install dependencies
```
composer update
```
Run [coveralls](https://coveralls.io/) for check coverage
```
./vendor/bin/coveralls -v
```

##  Contributors
* **Cyril Ichti** - *Initial work* - [seeren](https://github.com/seeren)

## License
This project is licensed under the **MIT License** - see the [license](LICENSE) file for details.