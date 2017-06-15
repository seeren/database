<?php

/**
 * This file contain Seeren\Database\Test\Table\Key\KeyTest class
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

namespace Seeren\Database\Test\Table\Key;

use Seeren\Database\Table\Key\KeyInterface;
use Seeren\Database\Table\Key\Key;
use ReflectionClass;

/**
 * Class for test Key
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table\Key
 */
class KeyTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get Key
    * 
    * @return KeyInterface Key
    */
   private function getKey(): KeyInterface
   {
       return (new ReflectionClass(Key::class))->newInstanceArgs([
           KeyInterface::PRIMARY,
           ["column_name"],
       ]);
   }

   /**
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\Key\Key::getType
    */
   public function testGetType()
   {
       $this->assertTrue(
           $this->getKey()->getType() === "PRIMARY"
       );
   }

   /**
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\Key\Key::getType
    */
   public function testGetTypeDefault()
   {
       $key = $this->getKey();
       $key->__construct("foo", ["column_name"]);
       $this->assertTrue($key->getType() === "KEY");
   }

   /**
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\Key\Key::getSubject
    */
   public function testGetSubject()
   {
       $this->assertTrue($this->getKey()->getSubject() === ["column_name"]);
   }

   /**
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\Key\Key::getForeigner
    */
   public function testGetForeigner()
   {
       $key = $this->getKey();
       $key->__construct(
          KeyInterface::PRIMARY,
          ["column_name"],
          "table_name");
       $this->assertTrue($key->getForeigner() === "table_name");
   }

   /**
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\Key\Key::getForeigner
    */
   public function testGetForeignerDefault()
   {
       $this->assertTrue($this->getKey()->getForeigner() === "");
   }

   /**
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\Key\Key::getForeignerSubject
    */
   public function testGetForeignerSubject()
   {
       $key = $this->getKey();
       $key->__construct(
           KeyInterface::PRIMARY,
           ["column_name"],
           "table_name",
           ["column_name"]);
       $this->assertTrue($key->getForeignerSubject() === ["column_name"]);
   }

   /**
    * @covers \Seeren\Database\Table\Key\Key::__construct
    * @covers \Seeren\Database\Table\Key\Key::getForeignerSubject
    */
   public function testGetForeignerSubjectDefault()
   {
       $this->assertTrue($this->getKey()->getForeignerSubject() === []);
   }

}
