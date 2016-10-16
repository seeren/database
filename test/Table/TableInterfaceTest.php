<?php

/**
 * This file contain Seeren\Database\Test\Table\TableInterfaceTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */


namespace Seeren\Database\Test\Table;

use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\Key\KeyInterface;
use Seeren\Database\Table\Column\ColumnInterface;
use Seeren\Database\Dao\MySql\CreateMySqlDao;
use ReflectionClass;
use Seeren\Database\Table\Clause\Clause;
use Seeren\Database\Dal\Dal;

/**
 * Class for test TableInterface
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table
 * @abstract
 */
abstract class TableInterfaceTest extends \PHPUnit_Framework_TestCase
{

   /**
    * Get TableInterface
    * 
    * @return TableInterface table
    */
   abstract protected function getTableInterface(): TableInterface;

   /**
    * Test TableInterface::get clause
    */
   public final function testGetClause()
   {
       $this->assertTrue(
           is_array(
               $this->getTableInterface()->get(TableInterface::ATTR_CLAUSE)
           )
       );
   }

   /**
    * Test TableInterface::get key
    */
   public final function testGetKey()
   {
       foreach (
           $this->getTableInterface()->get(TableInterface::ATTR_KEY) as $key
       ) {
          $this->assertTrue($key instanceof  KeyInterface);
          break;
       }
      }

   /**
    * Test TableInterface::get column
    */
   public final function testGetColumn()
   {
       foreach (
           $this->getTableInterface()->get(TableInterface::ATTR_COLUMN) as $key
       ) {
          $this->assertTrue($key instanceof  ColumnInterface);
          break;
       }
   }

   /**
    * Test TableInterface::get name
    */
   public final function testGetName()
   {
       $this->assertTrue(
           is_string($this->getTableInterface()->get(TableInterface::ATTR_NAME))
       );
   }

   /**
    * Test TableInterface::get object
    */
   public final function testGetObject()
   {
       $this->assertTrue(
           null === $this->getTableInterface()->get(TableInterface::ATTR_OBJECT)
       );
   }

   /**
    * Test TableInterface::set
    */
   public final function testSet()
   {
       $table = $this->getTableInterface();
       $object = (new ReflectionClass(CreateMySqlDao::class))
       ->newInstanceArgs([]);
       $table->set($object);
       $this->assertTrue($object === $table->get(TableInterface::ATTR_OBJECT));
   }

   /**
    * Test TableInterface::addClause
    */
   public final function testAddClause()
   {
       $table = $this->getTableInterface();
       $clause = (new ReflectionClass(Clause::class))
       ->newInstanceArgs([Clause::WHERE, "id", Clause::OPE_EQUAL, 5]);
       $table->addClause($clause);
       $this->assertTrue(
           $clause
       === current($table->get(TableInterface::ATTR_CLAUSE)));
      }

   /**
    * Test TableInterface::clear
    */
   public final function testClear()
   {
       $table = $this->getTableInterface();
       $clause = (new ReflectionClass(Clause::class))
       ->newInstanceArgs([Clause::WHERE, "id", Clause::OPE_EQUAL, 5]);
       $object = (new ReflectionClass(CreateMySqlDao::class))
       ->newInstanceArgs([]);
       $table->addClause($clause);
       $table->set($object);
       $table->clear();
       $this->assertTrue(
           null === $table->get(TableInterface::ATTR_OBJECT)
        && [] === $table->get(TableInterface::ATTR_CLAUSE)
       );
   }

   /**
    * Test TableInterface::__call InvalidArgumentException
    * 
    * @expectedException \InvalidArgumentException
    */
   public final function testCallInvalidArgumentException()
   {
       $this->getTableInterface()->update();
   }

   /**
    * Test TableInterface::__call RuntimeException
    *
    * @expectedException \RuntimeException
    */
   public final function testCallRuntimeException()
   {
       $dal = (new ReflectionClass(Dal::class))->newInstanceArgs([]);
       $this->getTableInterface()->update($dal);
   }

}
