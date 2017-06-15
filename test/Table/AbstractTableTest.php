<?php

/**
 * This file contain Seeren\Database\Test\Table\AbstractTableTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/database
 * @version 2.0.1
 */

namespace Seeren\Database\Test\Table;

use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\Clause\ClauseInterface;
use Seeren\Database\Table\Clause\Clause;
use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dao\MySql\OpenMySqlDao;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Dal\MySql\MySqlDal;
use ReflectionClass;

/**
 * Class for test AbstractTable
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table
 * @abstract
 */
abstract class AbstractTableTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get Table
    * 
    * @return TableInterface column
    */
    abstract protected function getTable(): TableInterface;

    /**
     * Get Dal
     *
     * @return DalInterface dal
     */
    private function getDal(): DalInterface
    {
        return (new ReflectionClass(MySqlDal::class))->newInstanceArgs([]);
    }

    /**
     * Get column name
     *
     * @return string column name
     */
    private function getColumnName(): string
    {
        return current($this->getTable()
        ->get(TableInterface::ATTR_COLUMN))
        ->getName();
    }

    /**
     * Get Dao
     *
     * @return DaoInterface dao
     */
    private function getDao(): DaoInterface
    {
        return (new ReflectionClass(OpenMySqlDao::class))->newInstanceArgs([]);
    }

    /**
     * Get Clause
     *
     * @return ClauseInterface clause
     */
    private function getClause(): ClauseInterface
    {
        return (new ReflectionClass(Clause::class))->newInstanceArgs([
            ClauseInterface::WHERE,
        ]);
    }

    /**
     * Test __get __set null
     */
    public function test__get__setNull()
    {
        $table = $this->getTable();
        $columnName = uniqid();
        $table->{$columnName} = null;
        $this->assertTrue($table->{$columnName} === null);
    }

    /**
     * Test __get __set
     */
    public function test__get__set()
    {
        $table = $this->getTable();
        $columnName = $this->getColumnName();
        $table->{$columnName} = true;
        $this->assertTrue($table->{$columnName} !== null);
    }

    /**
     * Test get
     */
    public function testGet()
    {
        $table = $this->getTable();
        $this->assertTrue(
            is_string($table->get(TableInterface::ATTR_NAME))
            && $table->get(TableInterface::ATTR_CLAUSE) === []
            && is_array($table->get(TableInterface::ATTR_COLUMN))
            && is_array($table->get(TableInterface::ATTR_KEY))
            && $table->get(TableInterface::ATTR_OBJECT) === null
            && $table->get(uniqid()) === null
            );
    }

    /**
     * Test add clause
     */
    public function testAddClause()
    {
        $table = $this->getTable();
        $table->addClause($this->getClause());
        $this->assertTrue($table->get(TableInterface::ATTR_CLAUSE) !== []);
    }

    /**
     * Test set
     */
    public function testSet()
    {
        $table = $this->getTable();
        $table->set($this->getDao());
        $this->assertTrue($table->get(TableInterface::ATTR_OBJECT) !== null);
    }

    /**
     * Test clear
     */
    public function testClear()
    {
        $table = $this->getTable();
        $table->set($this->getDao());
        $table->addClause($this->getClause());
        $table->clear();
        $this->assertTrue(
            $table->get(TableInterface::ATTR_CLAUSE) === []
            && $table->get(TableInterface::ATTR_OBJECT) == null
            );
    }

    /**
     * Test __call InvalidArgumentException
     */
    public function test__callInvalidArgumentException()
    {
        $this->getTable()->select();
    }

    /**
     * Test __call RuntimeException
     */
    public function test__callRuntimeException()
    {
        $this->getTable()->__call("bad value", [$this->getDal()]);
    }

}
