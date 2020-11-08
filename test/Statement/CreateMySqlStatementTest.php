<?php

namespace Seeren\Database\Test\Statement;

use PDOException;
use PHPUnit\Framework\TestCase;
use Seeren\Database\Manager\MySqlManager;
use Seeren\Database\Statement\MySql\CreateMySqlStatement;
use Seeren\Database\Test\Mock\Product;

class CreateMySqlStatementTest extends TestCase
{

    /**
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\AbstractEntity::getKeys
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getOptions
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getSize
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getType
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::set
     * @covers \Seeren\Database\Entity\Column\RelationColumn::__construct
     * @covers \Seeren\Database\Entity\Column\RelationColumn::castValue
     * @covers \Seeren\Database\Entity\Column\RelationColumn::getClassName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Entity\Key\Key::getColumnsName
     * @covers \Seeren\Database\Entity\Key\Key::getType
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Statement\MySql\CreateMySqlStatement::execute
     * @covers \Seeren\Database\Statement\MySql\CreateMySqlStatement::getAlteration
     * @covers \Seeren\Database\Statement\MySql\CreateMySqlStatement::getColumnList
     * @covers \Seeren\Database\Statement\MySql\CreateMySqlStatement::getConstraint
     */
    public function testExecute()
    {
        $manager = new MySqlManager('sqlite::memory:', 'user', 'password');
        $product = new Product($manager);
        $manager->getLayer()->query('CREATE TABLE product (id INT(11) PRIMARY KEY, name CHAR (64))');
        $mock = new CreateMySqlStatement();
        $this->expectException(PDOException::class);
        $mock->execute($manager, $product);
    }

}