<?php

/**
 * This file contain Seeren\Database\Test\Table\User\UserTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/database
 * @version 1.0.1
 */

namespace Seeren\Database\Test\Table\User;

use Seeren\Database\Test\Table\AbstractTableTest;
use Seeren\Database\Table\User\User;
use Seeren\Database\Table\TableInterface;
use ReflectionClass;
use Seeren\Database\Dal\DalInterface;

/**
 * Class for test User
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table\User
 */
class UserTest extends AbstractTableTest
{

    /**
     * Get Table
     *
     * @return TableInterface table
     */
    protected function getTable(): TableInterface
   {
       return (new ReflectionClass(User::class))->newInstanceArgs([]);
   }

   /**
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__get
    * @covers \Seeren\Database\Table\AbstractTable::__set
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    */
   public function test__get__setNull()
   {
       parent::test__get__setNull();
   }

   /**
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\AbstractTable::__get
    * @covers \Seeren\Database\Table\AbstractTable::__set
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getValue
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::setValue
    * @covers \Seeren\Database\Table\Key\Key::__construct
    */
   public function test__get__set()
   {
       parent::test__get__set();
   }
   
   /**
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    */
   public function testGet()
   {
       parent::testGet();
   }

   /**
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addClause
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    */
   public function testAddClause()
   {
       parent::testAddClause();
   }

   /**
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::get
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addClause
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::close
    * @covers \Seeren\Database\Dao\MySql\OpenMySqlDao::__construct
    * @covers \Seeren\Database\Table\AbstractTable::set
    */
   public function testSet()
   {
       parent::testSet();
   }

   /**
    * @covers \Seeren\Database\Table\User\User::__construct
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
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    */
   public function testClear()
   {
       parent::testClear();
   }

   /**
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__call
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @expectedException \InvalidArgumentException
    */
   public function test__callInvalidArgumentException()
   {
       parent::test__callInvalidArgumentException();
   }

   /**
    * @covers \Seeren\Database\Table\User\User::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getObject
    * @covers \Seeren\Database\Dal\Dal::query
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Table\AbstractTable::__call
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @expectedException \RuntimeException
    */
   public function test__callRuntimeException()
   {
       parent::test__callRuntimeException();
   }

   /**
    * @covers \Seeren\Database\Table\User\User::__construct
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
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::setValue
    * @covers \Seeren\Database\Table\Key\Key::__construct
    */
   public function test__call()
   {
       parent::test__call();
   }

}
