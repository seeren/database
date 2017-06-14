<?php

/**
 * This file contain Seeren\Database\Test\Table\Column\IntegerColumnTest class
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
use Seeren\Database\Table\Column\IntegerColumn;
use Seeren\Database\Table\Column\IntegerColumnInterface;
use ReflectionClass;
use PDO;
/**
 * Class for test IntegerColumn
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table\Column
 */
class IntegerColumnTest extends AbstractColumnTest
{

   /**
    * Get Column
    * 
    * @return ColumnInterface column
    */
   protected function getColumn(): ColumnInterface
   {
       return (new ReflectionClass(IntegerColumn::class))->newInstanceArgs([
           "column_name",
           IntegerColumnInterface::INT,
           10,
       ]);
   }

   /**
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
    */
   public function testGetName()
   {
       $this->assertTrue($this->getColumn()->getName() === "column_name");
   }

   /**
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getType
    */
   public function testGetType()
   {
       $this->assertTrue($this->getColumn()->getType() === "INT");
   }

   /**
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getType
    */
   public function testGetTypeDefault()
   {
       $column = $this->getColumn();
       $column->__construct(
           "column_name",
           "bad type",
           10);
       $this->assertTrue($this->getColumn()->getType() === "INT");
   }

   /**
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getSize
    */
   public function testGetSize()
   {
       $this->assertTrue($this->getColumn()->getSize() === 10);
   }

   /**
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getOption
    */
   public function testGetOption()
   {
       $column = $this->getColumn();
       $column->__construct(
           "column_name",
           IntegerColumnInterface::INT,
           10,
           [
               IntegerColumnInterface::OPT_AUTO_INCREMENT,
               "bad option",
               IntegerColumnInterface::OPT_NOT_NULL
           ]);
       $this->assertTrue($column->getOption() === [
           IntegerColumnInterface::OPT_AUTO_INCREMENT,
           IntegerColumnInterface::OPT_NOT_NULL
       ]);
   }

   /**
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::getOption
    */
   public function testGetOptionDefault()
   {
       parent::testGetOptionDefault();
   }

   /**
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\IntegerColumn::setValue
    * @covers \Seeren\Database\Table\Column\IntegerColumn::getValue
    */
   public function testSetValue()
   {
       $column = $this->getColumn();
       $column->setValue(null);
       $this->assertTrue($column->getValue() === 0);
   }

   /**
    * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
    * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
    * @covers \Seeren\Database\Table\Column\IntegerColumn::getParam
    */
   public function testGetParam()
   {
       $this->assertTrue($this->getColumn()->getParam() === PDO::PARAM_INT);
   }

}
