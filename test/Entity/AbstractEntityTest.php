<?php

namespace Seeren\Database\Test\Entity;

use InvalidArgumentException;
use PDOException;
use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\AbstractEntity;
use Seeren\Database\Entity\Clause\Clause;
use Seeren\Database\Entity\Column\StringColumn;
use Seeren\Database\Entity\EntityInterface;
use Seeren\Database\Manager\MySqlManager;

class AbstractEntityTest extends TestCase
{

    /**
     * @return EntityInterface
     */
    public function getMock(): EntityInterface
    {
        return new MyEntity(new MySqlManager(
            'sqlite::memory:',
            'user',
            'password'
        ), [
            new StringColumn('foo', 'varchar', 64)
        ]);
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::__get
     * @covers \Seeren\Database\Entity\AbstractEntity::__set
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::set
     * @covers \Seeren\Database\Entity\Column\IntegerColumn::castValue
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     */
    public function testGetSet(): void
    {
        $mock = $this->getMock();
        $mock->id = 1;
        $this->assertEquals(1, $mock->id);
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     */
    public function testGetName(): void
    {
        $this->assertEquals('my_entity', $this->getMock()->getName());
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     */
    public function testGetColumns(): void
    {
        $this->assertIsArray($this->getMock()->getColumns());
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::getKeys
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     */
    public function testGetKeys(): void
    {
        $this->assertIsArray($this->getMock()->getKeys());
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::getClauses
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     */
    public function testGetClauses(): void
    {
        $this->assertIsArray($this->getMock()->getClauses());
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::addClause
     * @covers \Seeren\Database\Entity\AbstractEntity::getClauses
     * @covers \Seeren\Database\Entity\Clause\Clause::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     */
    public function testAddClause(): void
    {
        $mock = $this->getMock();
        $mock->addClause(new Clause(
            Clause::WHERE,
            'id',
            Clause::OP_EQUAL,
            1
        ));
        $this->assertCount(1, $mock->getClauses());
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::addClause
     * @covers \Seeren\Database\Entity\AbstractEntity::clearClauses
     * @covers \Seeren\Database\Entity\AbstractEntity::getClauses
     * @covers \Seeren\Database\Entity\Clause\Clause::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     */
    public function testClearClauses(): void
    {
        $mock = $this->getMock();
        $mock->addClause(new Clause(
            Clause::WHERE,
            'id',
            Clause::OP_EQUAL,
            1
        ));
        $mock->clearClauses();
        $this->assertCount(0, $mock->getClauses());
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\AbstractEntity::jsonSerialize
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     */
    public function testJsonSerialize(): void
    {
        $mock = $this->getMock();
        $this->assertEquals($mock->getColumns(), $mock->jsonSerialize());
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::count
     * @covers \Seeren\Database\Entity\AbstractEntity::getClauses
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::execute
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Manager\Manager::prepare
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Statement\MySql\ClauseTrait::getClause
     * @covers \Seeren\Database\Statement\MySql\CountMySqlStatement::execute
     */
    public function testCount(): void
    {
        $this->expectException(PDOException::class);
        $this->getMock()->count();
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::create
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\AbstractEntity::getKeys
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getOptions
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getSize
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getType
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Entity\Key\Key::getColumnsName
     * @covers \Seeren\Database\Entity\Key\Key::getType
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::execute
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Manager\Manager::prepare
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Statement\MySql\CreateMySqlStatement::execute
     * @covers \Seeren\Database\Statement\MySql\CreateMySqlStatement::getAlteration
     * @covers \Seeren\Database\Statement\MySql\CreateMySqlStatement::getColumnList
     * @covers \Seeren\Database\Statement\MySql\CreateMySqlStatement::getConstraint
     */
    public function testCreate(): void
    {
        $this->expectException(PDOException::class);
        $this->getMock()->create();
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::delete
     * @covers \Seeren\Database\Entity\AbstractEntity::getClauses
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::execute
     * @covers \Seeren\Database\Manager\Manager::prepare
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Statement\MySql\ClauseTrait::buildColumnsClause
     * @covers \Seeren\Database\Statement\MySql\DeleteMySqlStatement::execute
     */
    public function testDelete(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->delete();
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::drop
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::execute
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Manager\Manager::prepare
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Statement\MySql\DropMySqlStatement::execute
     */
    public function testDrop(): void
    {
        $this->assertInstanceOf(EntityInterface::class, $this->getMock()->drop());
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::__get
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\AbstractEntity::insert
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::execute
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Manager\Manager::prepare
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Statement\MySql\InsertMySqlStatement::execute
     */
    public function testInsert(): void
    {
        $this->expectException(PDOException::class);
        $this->getMock()->insert();
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::clearClauses
     * @covers \Seeren\Database\Entity\AbstractEntity::getClauses
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\AbstractEntity::select
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::execute
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Manager\Manager::prepare
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Statement\MySql\ClauseTrait::buildColumnsClause
     * @covers \Seeren\Database\Statement\MySql\ClauseTrait::getClause
     * @covers \Seeren\Database\Statement\MySql\SelectMySqlStatement::execute
     */
    public function testSelect(): void
    {
        $this->expectException(PDOException::class);
        $this->getMock()->select();
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\AbstractEntity::update
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Column\IntegerColumn::getParam
     * @covers \Seeren\Database\Entity\Column\StringColumn::getParam
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::execute
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Manager\Manager::prepare
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Statement\MySql\UpdateMySqlStatement::execute
     */
    public function testUpdate(): void
    {
        $this->expectException(PDOException::class);
        $this->getMock()->update();
    }

}

class MyEntity extends AbstractEntity
{
}
