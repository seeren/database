# Seeren\Database

[![Build Status](https://travis-ci.org/seeren/database.svg?branch=master)](https://travis-ci.org/seeren/database) [![Coverage Status](https://coveralls.io/repos/github/seeren/database/badge.svg?branch=master)](https://coveralls.io/github/seeren/database?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/database.svg)](https://packagist.org/packages/seeren/database/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/4a0463fb5a084be5bda68e4e36d7c7ac)](https://www.codacy.com/app/seeren/database?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/database&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/database.svg)](https://packagist.org/packages/seeren/database#) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

Database Active record pattern

## Installation

```bash
composer require seeren/database
```

## Seeren\Database\Entity\EntityInterface

> Entities must be used with autowiring, examples run in a JsonController

>@see [Seeren\Router](https://github.com/seeren/router)

### Select

Select entity collection

```php
public function showAll(Product $product)
{
    $productList = $product->select();
    return $this->render($productList);
}
```

Select entity

```php
public function show(int $id, Product $product)
{
    $product->id = $id;
    $product->select();
    return $this->render($product);
}
```

### Insert

Insert with cascade

```php
public function new(Product $product, Color $color)
{
    $product->color = $color;
    $product->name = 'Bike';
    $product->color->label = "Red";
    $product->insert();
    return $this->render($product);
}
```

### Update

Update without cascade

```php
public function new(int $id, Product $product)
{
    $product->id = $id;
    if ($product->select()) {
        $product->name = 'Skate';
        $product->update();
    }
    return $this->render($product);
}
```

### Delete

Delete without cascade

```php
public function new(int $id, Product $product)
{
    $product->id = $id;
    if ($product->select()) {
        $product->delete();
    }
    return $this->render($product);
}
```

### Create

Create with cascade

```php
public function create(Product $product)
{
    $product->create();
    return $this->render($product);
}
```

### Drop

Drop with cascade

```php
public function drop(Product $product)
{
    $product->drop();
    return $this->render($product);
}
```

### Clause

Clauses can be used for queries

```php
public function count(Product $product)
{
    $product->addClause(new Clause('where', 'name', '=', 'Bike'));
    $product->addClause(new Clause('or', 'name', '=', 'Skate'));
    return $this->render([
        'row' => $product->count()
    ]);
}
```

## Declaration

There is no automation to create entity, you need to provide manager, columns and keys at construction

```php
<?php

namespace App\Entity;

use Seeren\Database\Entity\AbstractEntity;
use Seeren\Database\Entity\Column\RelationColumn;
use Seeren\Database\Entity\Column\StringColumn;
use Seeren\Database\Entity\Key\Key;
use Seeren\Database\Manager\MySqlManager;

/**
 * @property string name
 * @property Color color
 */
class Product extends AbstractEntity
{

    public function __construct(MySqlManager $manager)
    {
        parent::__construct(
            $manager,
            [
                new StringColumn('name', StringColumn::CHAR, 255),
                new RelationColumn('color', Color::class),
            ],
            [
                new Key(Key::UNIQUE, ['name'])
            ]
        );
    }

}
```

## Seeren\Database\Entity\Manager\ManagerInterface

Manager need credentials at construction: use container to resolve arguments

`config/services.json`

```json
{
  "parameters": { },
  "services": {
    "Seeren\\Database\\Manager\MySqlManager": {
      "dsn": ":localhost",
      "user": ":root",
      "password": ""
    }
  }
}
```

## License

This project is licensed under the MIT License