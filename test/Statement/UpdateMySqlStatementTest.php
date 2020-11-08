<?php

namespace Seeren\Database\Test\Statement;

use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\EntityInterface;
use Seeren\Database\Manager\MySqlManager;
use Seeren\Database\Statement\MySql\UpdateMySqlStatement;
use Seeren\Database\Test\Mock\Product;

class UpdateMySqlStatementTest extends TestCase
{

    /**
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::__set
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::set
     * @covers \Seeren\Database\Entity\Column\IntegerColumn::castValue
     * @covers \Seeren\Database\Entity\Column\IntegerColumn::getParam
     * @covers \Seeren\Database\Entity\Column\RelationColumn::__construct
     * @covers \Seeren\Database\Entity\Column\RelationColumn::getParam
     * @covers \Seeren\Database\Entity\Column\StringColumn::getParam
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Statement\MySql\UpdateMySqlStatement::execute
     */
    public function testExecute()
    {
        $manager = new MySqlManager('sqlite::memory:', 'user', 'password');
        $product = new Product($manager);
        $product->id = 1;
        $manager->getLayer()->query('CREATE TABLE product (id INT(11) PRIMARY KEY, name CHAR (64), description CHAR (64), secondary CHAR (64), accent CHAR (64))');
        $manager->getLayer()->query("INSERT INTO product (id, name) VALUES (1, 'Bike')");
        $mock = new UpdateMySqlStatement();
        $this->assertInstanceOf(EntityInterface::class, $mock->execute($manager, $product));
    }

}
