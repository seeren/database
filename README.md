## Seeren\Database\

Data mapper.

#### Code Example

Package contain table, access layer and access object. Table is an entity like,
dal provide access objects then access objects can parse table for resolve
query syntaxe and execute an operation. There is
one access object per operation, like select, update, drop, delete etc.

### Seeren\Database\Dal

Dal can be used for limit access, providing only specific operations.

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

### Seeren\Database\Dao

Access object can be manipulated directy for execute an operation for and an access layer.

```php
$select->query($table, $dal);
```

### Seeren\Database\Table

TableInterface allow to query layer and objects with tables. A mapped object
can execute operation for a layer.

```php
$table->create($dal);
$table->foo = "foo";
$table->bar = "bar";
$table->insert($dal);
```

Using a layer, the table can execute operation for differents thread of connection and do not require configuration for persistent layer. Operations allowed for tables are defined as constant class in dal interface.

#### Running the tests

Running tests with phpunit in the test folder.

```
$ phpunit test/Dal/DalTest.php
$ phpunit test/Dao/DaoTest.php
$ phpunit test/Table/TableTest.php
```

#### License

[MIT](https://github.com/Seeren/Seeren/blob/master/LICENSE)
