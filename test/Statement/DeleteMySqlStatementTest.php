<?php

namespace Seeren\Database\Test\Statement;

use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\Clause\Clause;
use Seeren\Database\Entity\EntityInterface;
use Seeren\Database\Manager\MySqlManager;
use Seeren\Database\Statement\MySql\DeleteMySqlStatement;
use Seeren\Database\Test\Mock\Product;

class DeleteMySqlStatementTest extends TestCase
{

    /**
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::__set
     * @covers \Seeren\Database\Entity\AbstractEntity::addClause
     * @covers \Seeren\Database\Entity\AbstractEntity::clearClauses
     * @covers \Seeren\Database\Entity\AbstractEntity::getClauses
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\Clause\Clause::__construct
     * @covers \Seeren\Database\Entity\Clause\Clause::getColumnName
     * @covers \Seeren\Database\Entity\Clause\Clause::getOperator
     * @covers \Seeren\Database\Entity\Clause\Clause::getType
     * @covers \Seeren\Database\Entity\Clause\Clause::getValue
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::set
     * @covers \Seeren\Database\Entity\Column\IntegerColumn::castValue
     * @covers \Seeren\Database\Entity\Column\IntegerColumn::getParam
     * @covers \Seeren\Database\Entity\Column\RelationColumn::__construct
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Statement\MySql\ClauseTrait::buildColumnsClause
     * @covers \Seeren\Database\Statement\MySql\ClauseTrait::getClause
     * @covers \Seeren\Database\Statement\MySql\DeleteMySqlStatement::execute
     */
    public function testExecute()
    {
        $manager = new MySqlManager('sqlite::memory:', 'user', 'password');
        $product = new Product($manager);
        $manager->getLayer()->query('CREATE TABLE product (id INT(11) PRIMARY KEY, name CHAR (64))');
        $manager->getLayer()->query("INSERT INTO product (id, name) VALUES (1, 'Bike')");
        $product->id = 1;
        $mock = new DeleteMySqlStatement();
        $this->assertInstanceOf(
            EntityInterface::class,
            $mock->execute($manager, $product)
        );
    }

}