<?php

/**
 * This file contain Seeren\Database\Test\Dao\MySql\CreateDbMySqlDaoTest class
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
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Test\Dao\AbstractDaoTest;
use Seeren\Database\Dao\MySql\CreateDbMySqlDao;
use Seeren\Database\Test\Table\DummyTable;
use ReflectionClass;

/**
 * Class for test CreateDbMySqlDao
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dao\MySql
 */
class CreateDbMySqlDaoTest extends AbstractDaoTest
{

    /**
     * Get Dao
     *
     * @return DaoInterface dao
     */
    protected function getDao(): DaoInterface
    {
       return (new ReflectionClass(CreateDbMySqlDao::class))
       ->newInstanceArgs([]);
    }

    /**
     * Get Table
     *
     * @return TableInterface table
     */
    protected function getTable(): TableInterface
    {
        $table = parent::getTable();
        $table->dbname = "database_name";
        return $table;
    }

    /**
     * Get default syntax
     *
     * @return string dao to string
     */
    protected function getDefaultSyntax(): string
    {
        return "CREATE DATABASE IF NOT EXISTS database_name;";
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::__construct
     * @covers \Seeren\Database\Dal\Dal::__construct
     * @covers \Seeren\Database\Dal\Dal::getLayer
     * @covers \Seeren\Database\Dal\Dal::setLayer
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::query
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::execute
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::getSyntax
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::query
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::__get
     * @covers \Seeren\Database\Table\AbstractTable::__set
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getValue
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
     * @covers \Seeren\Database\Table\Column\StringColumn::setValue
     * @covers \Seeren\Database\Table\Key\Key::__construct
     * @covers \Seeren\Database\Table\User\User::__construct
     */
    public function testGetDefaultSyntax()
    {
            parent::testGetDefaultSyntax();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::__construct
     * @covers \Seeren\Database\Dal\Dal::__construct
     * @covers \Seeren\Database\Dal\Dal::setLayer
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::query
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\MasterTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
     * @covers \Seeren\Database\Table\Key\Key::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testGetSyntaxInvalidTable()
    {
        $this->getDao()->query(new DummyTable(), $this->getDal());

    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::__construct
     * @covers \Seeren\Database\Dal\Dal::__construct
     * @covers \Seeren\Database\Dal\Dal::setLayer
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::query
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::__get
     * @covers \Seeren\Database\Table\AbstractTable::__set
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getValue
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
     * @covers \Seeren\Database\Table\Column\StringColumn::setValue
     * @covers \Seeren\Database\Table\Key\Key::__construct
     * @covers \Seeren\Database\Table\User\User::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testGetSyntaxInvalidDbName()
    {
        $table = $this->getTable();
        $table->dbname = "";
        $this->getDao()->query($table, $this->getDal());
        
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::close
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     */
    public function testClose()
    {
        parent::testClose();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::clone
     */
    public function testClone()
    {
        parent::testClone();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::__toString
     */
   public function test__toString()
   {
       parent::test__toString();
   }

   /**
    * @covers \Seeren\Database\Dao\MySql\CreateDbMySqlDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__get
    */
   public function test__get()
   {
       parent::test__get();
   }

}
