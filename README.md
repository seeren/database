# database
 [![Build Status](https://travis-ci.org/seeren/database.svg?branch=master)](https://travis-ci.org/seeren/database) [![Coverage Status](https://coveralls.io/repos/github/seeren/database/badge.svg?branch=master)](https://coveralls.io/github/seeren/database?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/database.svg)](https://packagist.org/packages/seeren/database/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/4a0463fb5a084be5bda68e4e36d7c7ac)](https://www.codacy.com/app/seeren/database?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/database&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/database.svg)](https://packagist.org/packages/seeren/database#) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

**Data mapper and syntax resolvers**

## Features
* Simple Database abstraction
## Installation
Require this package with [composer](https://getcomposer.org/)
```
composer require seeren/database dev-master
```

## Usage
#### `Seeren\Table\TableInterface`
User describe a connection
```php
$table = new User();
$table->dbname = "dbname";
$table->host = "localhost";
$table->user = "root";
$table->pswd = "";
```

User can open layer
```php
$layer = new MySqlDal;
$table->open($layer);
```

Table and layer can execute database operations
```php
$table
->create($layer);
->insert($layer);
```
Table can be encoded to json
```php
echo json_encode($table);
```

## Run Tests
Run [phpunit](https://phpunit.de/) with [Xdebug](https://xdebug.org/) enable and [OPcache](http://php.net/manual/fr/book.opcache.php) disable
```
./vendor/bin/phpunit
```
## Run Coverage
Run [coveralls](https://coveralls.io/) 
```
./vendor/bin/php-coveralls -v
```

## License
This project is licensed under the **MIT License** - see the [license](LICENSE) file for details.