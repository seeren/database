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
use Seeren\Database\Table\Column\StringColumn;
use Seeren\Database\Table\Column\StringColumnInterface;
use ReflectionClass;
use PDO;

/**
 * Class for test StringColumn
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
           "column_name",
           StringColumnInterface::CHAR,
           255,
       ]);
   }

   /**
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    */
   public function testGetName()
   {
       $this->assertTrue($this->getColumn()->getName() === "column_name");
   }

   /**
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getType
    */
   public function testGetType()
   {
       $this->assertTrue($this->getColumn()->getType() === "CHAR");
   }

   /**
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getType
    */
   public function testGetTypeDefault()
   {
       $column = $this->getColumn();
       $column->__construct(
           "column_name",
           "bad type",
           255);
       $this->assertTrue($this->getColumn()->getType() === "CHAR");
   }

   /**
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getSize
    */
   public function testGetSize()
   {
       $this->assertTrue($this->getColumn()->getSize() === 255);
   }

   /**
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getOption
    */
   public function testGetOption()
   {
       $column = $this->getColumn();
       $column->__construct(
           "column_name",
           StringColumnInterface::CHAR,
           255,
           [
               StringColumnInterface::OPT_DEFAULT_STRING,
               "bad option",
               StringColumnInterface::OPT_NOT_NULL
           ]);
       $this->assertTrue($column->getOption() === [
           StringColumnInterface::OPT_DEFAULT_STRING,
           StringColumnInterface::OPT_NOT_NULL
       ]);
   }

   /**
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getOption
    */
   public function testGetOptionDefault()
   {
       parent::testGetOptionDefault();
   }

   /**
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::setValue
    * @covers \Seeren\Database\Table\Column\StringColumn::getValue
    */
   public function testSetValue()
   {
       $column = $this->getColumn();
       $column->setValue(null);
       $this->assertTrue($column->getValue() === "");
   }

   /**
    * @covers \Seeren\Database\Table\Column\StringColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\StringColumn::getParam
    */
   public function testGetParam()
   {
       $this->assertTrue($this->getColumn()->getParam() === PDO::PARAM_STR);
   }

}
