<?php

/**
 * This file contain Seeren\Database\Test\Dao\MySql\DropMySqlDaoTest class
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

namespace Seeren\Database\Test\Dao\MySql;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Test\Dao\AbstractDaoTest;
use Seeren\Database\Dao\MySql\DropMySqlDao;
use Seeren\Database\Table\TableInterface;
use ReflectionClass;

/**
 * Class for test DropMySqlDao
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dao\MySql
 */
class DropMySqlDaoTest extends AbstractDaoTest
{

    /**
     * Get Dao
     *
     * @return DaoInterface dao
     */
    protected function getDao(): DaoInterface
    {
       return (new ReflectionClass(DropMySqlDao::class))
       ->newInstanceArgs([]);
    }

    /**
     * Get default syntax
     *
     * @return string dao to string
     */
    protected function getDefaultSyntax(): string
    {
        return "DROP TABLE IF EXISTS "
             . $this->getTable()->get(TableInterface::ATTR_NAME) . ";";
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\DropMySqlDao::__construct
     * @covers \Seeren\Database\Dal\Dal::__construct
     * @covers \Seeren\Database\Dal\Dal::getLayer
     * @covers \Seeren\Database\Dal\Dal::setLayer
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::query
     * @covers \Seeren\Database\Dao\MySql\DropMySqlDao::execute
     * @covers \Seeren\Database\Dao\MySql\DropMySqlDao::getSyntax
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\AbstractTable::get
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
     * @covers \Seeren\Database\Table\Key\Key::__construct
     * @covers \Seeren\Database\Table\User\User::__construct
     */
    public function testGetDefaultSyntax()
    {
         parent::testGetDefaultSyntax();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\DropMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::close
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     */
    public function testClose()
    {
        parent::testClose();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\DropMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::clone
     */
    public function testClone()
    {
        parent::testClone();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\DropMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::__toString
     */
   public function test__toString()
   {
       parent::test__toString();
   }

   /**
    * @covers \Seeren\Database\Dao\MySql\DropMySqlDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__get
    */
   public function test__get()
   {
       parent::test__get();
   }

}
