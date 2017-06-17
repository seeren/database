<?php

/**
 * This file contain Seeren\Database\Test\Test\Table\DummyTableTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/database
 * @version 2.0.1
 */

namespace Seeren\Database\Test\Table;

use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\User\User;
use ReflectionClass;

/**
 * Class for test DummyTable
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table
 */
class DummyTableTest extends MasterTableTest
{

    /**
     * Get Table
     *
     * @return TableInterface table
     */
    protected function getTable(): TableInterface
   {
       return (new ReflectionClass(DummyTable::class))->newInstanceArgs([]);
   }

   /**
    * Get dependencie name
    *
    * @return string dependencie name
    */
   protected function getDependencieName(): string
   {
       return User::NAME;
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__get
    * @covers \Seeren\Database\Table\AbstractTable::__set
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\MasterTable::__get
    * @covers \Seeren\Database\Table\MasterTable::__set
    */
   public function test__get__setNull()
   {
       parent::test__get__setNull();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__get
    * @covers \Seeren\Database\Table\AbstractTable::__set
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getValue
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\IntegerColumn::setValue
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\MasterTable::__get
    * @covers \Seeren\Database\Table\MasterTable::__set
    * @covers \Seeren\Database\Table\MasterTable::get
    */
   public function test__get__set()
   {
       parent::test__get__set();
   }
   
   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\MasterTable::get
    */
   public function testGet()
   {
       parent::testGet();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addClause
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\MasterTable::addClause
    * @covers \Seeren\Database\Table\MasterTable::get
    */
   public function testAddClause()
   {
       parent::testAddClause();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::close
    * @covers \Seeren\Database\Dao\MySql\OpenMySqlDao::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\AbstractTable::set
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\MasterTable::get
    */
   public function testSet()
   {
       parent::testSet();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::close
    * @covers \Seeren\Database\Dao\MySql\OpenMySqlDao::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addClause
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::clear
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\AbstractTable::set
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\MasterTable::addClause
    * @covers \Seeren\Database\Table\MasterTable::clear
    * @covers \Seeren\Database\Table\MasterTable::get
    */
   public function testClear()
   {
       parent::testClear();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__call
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__call
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\User\User::__construct
    * @expectedException \InvalidArgumentException
    */
   public function test__callInvalidArgumentException()
   {
       parent::test__callInvalidArgumentException();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getLayer
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__call
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\User\User::__construct
    * @expectedException \RuntimeException
    */
   public function test__callRuntimeException()
   {
       parent::test__callRuntimeException();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getLayer
    * @covers \Seeren\Database\Dal\Dal::getObject
    * @covers \Seeren\Database\Dal\Dal::query
    * @covers \Seeren\Database\Dal\Dal::setLayer
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::clone
    * @covers \Seeren\Database\Dao\AbstractDao::close
    * @covers \Seeren\Database\Dao\AbstractDao::query
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::bindParam
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::close
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::getClause
    * @covers \Seeren\Database\Dao\MySql\CountMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\CountMySqlDao::execute
    * @covers \Seeren\Database\Dao\MySql\CountMySqlDao::getSyntax
    * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::execute
    * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::getSyntax
    * @covers \Seeren\Database\Table\AbstractTable::__call
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__set
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\AbstractTable::set
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getValue
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::setValue
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__call
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\MasterTable::__set
    * @covers \Seeren\Database\Table\MasterTable::get
    * @covers \Seeren\Database\Table\MasterTable::select
    * @covers \Seeren\Database\Table\User\User::__construct
    */
   public function test__call()
   {
       parent::test__call();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getLayer
    * @covers \Seeren\Database\Dal\Dal::getObject
    * @covers \Seeren\Database\Dal\Dal::query
    * @covers \Seeren\Database\Dal\Dal::setLayer
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::clone
    * @covers \Seeren\Database\Dao\AbstractDao::close
    * @covers \Seeren\Database\Dao\AbstractDao::constant
    * @covers \Seeren\Database\Dao\AbstractDao::query
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::bindParam
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::close
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::getClause
    * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::execute
    * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::getSyntax
    * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::query
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addClause
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\AbstractTable::set
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Clause\Clause::getOperator
    * @covers \Seeren\Database\Table\Clause\Clause::getSubject
    * @covers \Seeren\Database\Table\Clause\Clause::getType
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\MasterTable::addClause
    * @covers \Seeren\Database\Table\MasterTable::delete
    * @covers \Seeren\Database\Table\MasterTable::get
    * @covers \Seeren\Database\Table\User\User::__construct
    */
   public function testDelete()
   {
       parent::testDelete();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getLayer
    * @covers \Seeren\Database\Dal\Dal::getObject
    * @covers \Seeren\Database\Dal\Dal::query
    * @covers \Seeren\Database\Dal\Dal::setLayer
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\MasterTable::delete
    * @covers \Seeren\Database\Table\User\User::__construct
    * @expectedException \RuntimeException
    */
   public function testDeleteRuntimeException()
   {
       parent::testDeleteRuntimeException();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getLayer
    * @covers \Seeren\Database\Dal\Dal::getObject
    * @covers \Seeren\Database\Dal\Dal::query
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::clone
    * @covers \Seeren\Database\Dao\AbstractDao::query
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::getClause
    * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::execute
    * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::getSyntax
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getValue
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\MasterTable::select
    * @covers \Seeren\Database\Table\User\User::__construct
    * @expectedException \RuntimeException
    */
   public function testSelectRuntimeException()
   {
       parent::testSelectRuntimeException();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\MasterTable::get
    * @covers \Seeren\Database\Table\User\User::__construct
    */
   public function testGetDependencie()
   {
       parent::testGetDependencie();
   }

   /**
    * @covers \Seeren\Database\Test\Table\DummyTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__get
    * @covers \Seeren\Database\Table\AbstractTable::__set
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getValue
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::setValue
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\MasterTable::__construct
    * @covers \Seeren\Database\Table\MasterTable::__get
    * @covers \Seeren\Database\Table\MasterTable::__set
    * @covers \Seeren\Database\Table\MasterTable::get
    * @covers \Seeren\Database\Table\User\User::__construct
    */
   public function testGetDependencieColumnValue()
   {
       parent::testGetDependencieColumnValue();
   }

}
