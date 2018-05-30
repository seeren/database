<?php

/**
 * This file contain Seeren\Database\Test\Dao\MySql\DeleteMySqlDaoTest class
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
use Seeren\Database\Dao\MySql\DeleteMySqlDao;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\Clause\ClauseInterface;
use Seeren\Database\Table\Clause\Clause;
use PDOException;
use ReflectionClass;

/**
 * Class for test DeleteMySqlDao
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dao\MySql
 */
class DeleteMySqlDaoTest extends AbstractMySqlDaoTest
{

    /**
     * Get Dao
     *
     * @return DaoInterface dao
     */
    protected function getDao(): DaoInterface
    {
       return (new ReflectionClass(DeleteMySqlDao::class))
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
        $table->addClause(new Clause(
            ClauseInterface::WHERE, "host",
            ClauseInterface::OPE_EQUAL,
            "host"));
        $table->addClause(new Clause(
            ClauseInterface::OR, "column_name",
            ClauseInterface::OPE_EQUAL,
            "1"));
        $table->addClause(new Clause(
            ClauseInterface::OR, "column_name",
            ClauseInterface::OPE_EQUAL,
            1));
        $table->addClause(new Clause(
            ClauseInterface::OR, "column_name",
            ClauseInterface::OPE_EQUAL,
            null));
        return $table;
    }

    /**
     * Get default syntax
     *
     * @return string dao to string
     */
    protected function getDefaultSyntax(): string
    {
        return "DELETE FROM `"
             . $this->getTable()->get(TableInterface::ATTR_NAME)
             . "` WHERE host = :c0_host "
             . "OR column_name = :c1_column_name "
             . "OR column_name = :c2_column_name "
             . "OR column_name = :c3_column_name;";
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::__construct
     * @covers \Seeren\Database\Dal\Dal::__construct
     * @covers \Seeren\Database\Dal\Dal::getLayer
     * @covers \Seeren\Database\Dal\Dal::setLayer
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::constant
     * @covers \Seeren\Database\Dao\AbstractDao::query
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::bindParam
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::getClause
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::setParam
     * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::execute
     * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::getSyntax
     * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::query
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::addClause
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\AbstractTable::get
     * @covers \Seeren\Database\Table\Clause\Clause::__construct
     * @covers \Seeren\Database\Table\Clause\Clause::getOperator
     * @covers \Seeren\Database\Table\Clause\Clause::getSubject
     * @covers \Seeren\Database\Table\Clause\Clause::getType
     * @covers \Seeren\Database\Table\Clause\Clause::getValue
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
     * @covers \Seeren\Database\Table\Column\StringColumn::getParam
     * @covers \Seeren\Database\Table\Key\Key::__construct
     * @covers \Seeren\Database\Table\User\User::__construct
     */
    public function testGetDefaultSyntax()
    {
         parent::testGetDefaultSyntax();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::__construct
     * @covers \Seeren\Database\Dal\Dal::__construct
     * @covers \Seeren\Database\Dal\Dal::setLayer
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
     * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::query
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::addClause
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\AbstractTable::clear
     * @covers \Seeren\Database\Table\AbstractTable::get
     * @covers \Seeren\Database\Table\Clause\Clause::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
     * @covers \Seeren\Database\Table\Key\Key::__construct
     * @covers \Seeren\Database\Table\User\User::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testGetDefaultSyntaxInvalidArgumentException()
    {
        $dao = $this->getDao();
        $table = $this->getTable();
        $table->clear();
        try {
            $dao->query($table, $this->getDal());
        } catch (PDOException $e) {
        }
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::clone
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
     */
    public function testClone()
    {
        parent::testClone();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::__toString
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
     */
   public function test__toString()
   {
       parent::test__toString();
   }

   /**
    * @covers \Seeren\Database\Dao\MySql\DeleteMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
    */
   public function test__get()
   {
       parent::test__get();
   }

}
