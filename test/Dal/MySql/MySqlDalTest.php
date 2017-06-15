<?php

/**
 * This file contain Seeren\Database\Test\Dal\MySql\MySqlDalTest class
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

namespace Seeren\Database\Test\Dal\MySql;

use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Test\Dal\AbstractDalTest;
use Seeren\Database\Dal\MySql\MySqlDal;
use ReflectionClass;

/**
 * Class for test MySqlDal
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dal\MySql
 */
class MySqlDalTest extends AbstractDalTest
{

    /**
     * Get Dal
     *
     * @return DalInterface dal
     */
    protected function getDal(): DalInterface
   {
       return (new ReflectionClass(MySqlDal::class))->newInstanceArgs([]);
   }

   /**
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getLayer
    * @expectedException \RuntimeException
    */
   public function testGetLayerRuntimeException()
   {
       parent::testGetLayerRuntimeException();
   }

   /**
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getLayer
    * @covers \Seeren\Database\Dal\Dal::setLayer
    */
   public function testSetLayer()
   {
       parent::testSetLayer();
   }

   /**
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getObject
    * @covers \Seeren\Database\Dal\Dal::query
    * @covers \Seeren\Database\Table\AbstractTable::__construct
    * @covers \Seeren\Database\Table\AbstractTable::addColumn
    * @covers \Seeren\Database\Table\AbstractTable::addKey
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\User\User::__construct
    * @expectedException \RuntimeException
    */
   public function testQueryRuntimeException()
   {
       parent::testQueryRuntimeException();
   }

   /**
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getLayer
    * @covers \Seeren\Database\Dal\Dal::getObject
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::clone
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\CountMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\DropDbMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\DropMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\InsertMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\OpenMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\UseDbMySqlDao::__construct
    */
   public function testGetObject()
   {
       parent::testGetObject();
   }

   /**
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getLayer
    * @covers \Seeren\Database\Dal\Dal::getObject
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::clone
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
    * @covers \Seeren\Database\Dao\MySql\CountMySqlDao::__construct
    */
   public function testGetObjectTwice()
   {
       parent::testGetObjectTwice();
   }

   /**
    * @covers \Seeren\Database\Dal\MySql\MySqlDal::__construct
    * @covers \Seeren\Database\Dal\Dal::__construct
    * @covers \Seeren\Database\Dal\Dal::getLayer
    * @covers \Seeren\Database\Dal\Dal::getObject
    * @expectedException \RuntimeException
    */
   public function testGetObjectRuntimeException()
   {
       parent::testGetObjectRuntimeException();
   }

}
