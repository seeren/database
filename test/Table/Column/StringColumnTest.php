<?php

/**
 * This file contain Seeren\Database\Test\Table\Column\StringColumnTest class
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

namespace Seeren\Database\Test;

use Seeren\Database\Table\Column\ColumnInterface;
use Seeren\Database\Table\Column\Column;
use ReflectionClass;
use Seeren\Database\Table\Column\StringColumn;

/**
 * Class for test Column
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table\Column
 */
class StringColumnTest extends AbstractColumnTest
{

   /**
    * Get Column
    * 
    * @return ColumnInterface column
    */
   protected function getColumn(): ColumnInterface
   {
       return (new ReflectionClass(StringColumn::class))->newInstanceArgs([
           "rr",
           "column_name",
           11
       ]);
   }

   public function testFoo()
   {
       $this->getColumn();
       $this->assertTrue(true);
   }
}
