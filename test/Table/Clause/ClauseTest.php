<?php

/**
 * This file contain Seeren\Database\Test\Table\Clause\ClauseTest class
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

namespace Seeren\Database\Test\Table\Clause;

use Seeren\Database\Table\Clause\ClauseInterface;
use Seeren\Database\Table\Clause\Clause;
use ReflectionClass;

/**
 * Class for test Clause
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table\Clause
 */
class ClauseTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get Clause
    * 
    * @return ClauseInterface clause
    */
   private function getClause(): ClauseInterface
   {
       return (new ReflectionClass(Clause::class))->newInstanceArgs([
           ClauseInterface::WHERE,
           "column_name",
           ClauseInterface::OPE_EQUAL,
           true
       ]);
   }

   /**
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Clause\Clause::getType
    */
   public function testGetType()
   {
       $this->assertTrue(
           $this->getClause()->getType() === ClauseInterface::WHERE
       );
   }

   /**
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Clause\Clause::getType
    */
   public function testGetTypeVoidString()
   {
       $clause = $this->getClause();
       $clause->__construct("foo");
       $this->assertTrue($clause->getType() === "");
   }

   /**
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Clause\Clause::getSubject
    */
   public function testGetSubject()
   {
       $this->assertTrue($this->getClause()->getSubject() === "column_name");
   }

   /**
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Clause\Clause::getSubject
    */
   public function testGetSubjectVoidString()
   {
       $clause = $this->getClause();
       $clause->__construct("foo");
       $this->assertTrue($clause->getSubject() === "");
   }

   /**
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Clause\Clause::getOperator
    */
   public function testGetOperator()
   {
       $this->assertTrue($this->getClause()->getOperator() === "EQUAL");
   }

   /**
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Clause\Clause::getOperator
    */
   public function testGetOperatorVoidString()
   {
       $clause = $this->getClause();
       $clause->__construct("foo");
       $this->assertTrue($clause->getOperator() === "");
   }

   /**
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Clause\Clause::getValue
    */
   public function testGetValue()
   {
       $this->assertTrue($this->getClause()->getValue());
   }

   /**
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Clause\Clause::getValue
    */
   public function testGetValueNull()
   {
       $clause = $this->getClause();
       $clause->__construct("foo");
       $this->assertTrue($clause->getValue() === null);
   }

   /**
    * @covers \Seeren\Database\Table\Clause\Clause::__construct
    * @covers \Seeren\Database\Table\Clause\Clause::getValue
    * @covers \Seeren\Database\Table\Clause\Clause::setValue
    */
   public function testSetValue()
   {
       $clause = $this->getClause();
       $clause->setValue(false);
       $this->assertFalse($clause->getValue());
   }

}
