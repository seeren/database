<?php

/**
 * This file contain Seeren\Database\Test\Table\Column\AbstractColumnTest class
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

/**
 * Class for test AbstractColumn
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table\Column
 * @abstract
 */
abstract class AbstractColumnTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get Column
    * 
    * @return ColumnInterface column
    */
   abstract protected function getColumn(): ColumnInterface;

   /**
    * Test get name
    */
   abstract public function testGetName();

   /**
    * Test get type
    */
   abstract public function testGetType();

   /**
    * Test get type default
    */
   abstract public function testGetTypeDefault();

   /**
    * Test get size
    */
   abstract public function testGetSize();

   /**
    * Test get option
    */
   abstract public function testGetOption();

   /**
    * Test set value
    */
   abstract public function testSetValue();

   /**
    * Test get value param
    */
   abstract public function testGetParam();

   /**
    * Assert get option defaukt
    */
    protected function testGetOptionDefault()
    {
      $this->assertTrue($this->getColumn()->getOption() === []);
    }

}
