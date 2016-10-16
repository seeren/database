<?php

/**
 * This file contain Seeren\Database\Test\Table\TableTest class
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
use ReflectionClass;
use Seeren\Database\Table\User\User;

/**
 * Class for test AbstractTable
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table
 */
class TableTest extends TableInterfaceTest
{

   /**
    * Get TableInterface
    * 
    * @return TableInterface table
    */
   protected function getTableInterface(): TableInterface
   {
       $reflection = new ReflectionClass(User::class);
       return $reflection->newInstanceArgs([]);
   }

   /**
    * Test TableInterface::__get __set
    */
   public function testGetSet()
   {
       $table = $this->getTableInterface();
       $name = current($table->get(TableInterface::ATTR_COLUMN))->getName();
       $table->{$name} = true;
       $this->assertTrue(true == $table->{$name});
   }

}
