<?php

namespace Seeren\Database\Test\Statement;

use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\Clause\Clause;
use Seeren\Database\Manager\MySqlManager;
use Seeren\Database\Statement\MySql\SelectMySqlStatement;
use Seeren\Database\Test\Mock\Product;

class SelectMySqlStatementTest extends TestCase
{

    /**
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::__get
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
     * @covers \Seeren\Database\Entity\Column\StringColumn::castValue
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Statement\MySql\ClauseTrait::buildColumnsClause
     * @covers \Seeren\Database\Statement\MySql\ClauseTrait::getClause
     * @covers \Seeren\Database\Statement\MySql\SelectMySqlStatement::buildEntity
     * @covers \Seeren\Database\Statement\MySql\SelectMySqlStatement::execute
     */
    public function testExecute()
    {
        $manager = new MySqlManager('sqlite::memory:', 'user', 'password');
        $product = new Product($manager);
        $product->id = 1;
        $manager->getLayer()->query('CREATE TABLE product (id INT(11) PRIMARY KEY, name CHAR (64))');
        $manager->getLayer()->query("INSERT INTO product (id, name) VALUES (1, 'Bike')");
        $mock = new SelectMySqlStatement();
        $this->assertEquals('Bike', $mock->execute($manager, $product)->name);
    }

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
     * @covers \Seeren\Database\Statement\MySql\SelectMySqlStatement::execute
     */
    public function testExecuteNull()
    {
        $manager = new MySqlManager('sqlite::memory:', 'user', 'password');
        $product = new Product($manager);
        $product->id = 2;
        $manager->getLayer()->query('CREATE TABLE product (id INT(11) PRIMARY KEY, name CHAR (64))');
        $manager->getLayer()->query("INSERT INTO product (id, name) VALUES (1, 'Bike')");
        $mock = new SelectMySqlStatement();
        $this->assertNull($mock->execute($manager, $product));
    }

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
     * @covers \Seeren\Database\Entity\Column\RelationColumn::__construct
     * @covers \Seeren\Database\Entity\Column\StringColumn::castValue
     * @covers \Seeren\Database\Entity\Column\StringColumn::getParam
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Statement\MySql\ClauseTrait::buildColumnsClause
     * @covers \Seeren\Database\Statement\MySql\ClauseTrait::getClause
     * @covers \Seeren\Database\Statement\MySql\SelectMySqlStatement::buildEntity
     * @covers \Seeren\Database\Statement\MySql\SelectMySqlStatement::execute
     */
    public function testExecuteCollection()
    {
        $manager = new MySqlManager('sqlite::memory:', 'user', 'password');
        $product = new Product($manager);
        $product->name = 'Bike';
        $manager->getLayer()->query('CREATE TABLE product (id INT(11) PRIMARY KEY, name CHAR (64))');
        $manager->getLayer()->query("INSERT INTO product (id, name) VALUES (1, 'Bike')");
        $manager->getLayer()->query("INSERT INTO product (id, name) VALUES (2, 'Bike')");
        $mock = new SelectMySqlStatement();
        $mock->execute($manager, $product);
        $this->assertIsArray($mock->execute($manager, $product));
    }

}
