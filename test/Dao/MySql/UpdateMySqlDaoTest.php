<?php

/**
 * This file contain Seeren\Database\Test\Dao\MySql\UpdateMySqlDaoTest class
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
use Seeren\Database\Dao\MySql\UpdateMySqlDao;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\Clause\Clause;
use PDOException;
use ReflectionClass;

/**
 * Class for test UpdateMySqlDao
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dao\MySql
 */
class UpdateMySqlDaoTest extends AbstractMySqlDaoTest
{

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Test\Dao\AbstractDaoTest::getDao()
     */
    protected function getDao(): DaoInterface
    {
       return (new ReflectionClass(UpdateMySqlDao::class))
       ->newInstanceArgs([]);
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Test\Dao\AbstractDaoTest::getTable()
     */
    protected function getTable(): TableInterface
    {
        $table = parent::getTable();
        $table->host = "host_name";
        $table->addClause(new Clause(
            Clause::WHERE,
            "id",
            Clause::OPE_EQUAL,
            1));
        return $table;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Test\Dao\AbstractDaoTest::getDefaultSyntax()
     */
    protected function getDefaultSyntax(): string
    { 
        return "UPDATE `"
             . $this->getTable()->get(TableInterface::ATTR_NAME) . "` "
             . "SET `host`=:host, `dbname`=:dbname WHERE id = :c0_id;";
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::__construct
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
     * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::execute
     * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::getSyntax
     * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::query
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
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getValue
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getOption
     * @covers \Seeren\Database\Table\AbstractTable::__set
     * @covers \Seeren\Database\Table\Column\StringColumn::getParam
     * @covers \Seeren\Database\Table\Column\StringColumn::setValue
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
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
     * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::__construct
     * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::query
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::addClause
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\AbstractTable::clear
     * @covers \Seeren\Database\Table\AbstractTable::get
     * @covers \Seeren\Database\Table\Clause\Clause::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\AbstractTable::__set
     * @covers \Seeren\Database\Table\Column\StringColumn::setValue
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
     * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::close
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::close
     */
    public function testClose()
    {
        parent::testClose();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::clone
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
     */
    public function testClone()
    {
        parent::testClone();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::__construct
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
    * @covers \Seeren\Database\Dao\MySql\UpdateMySqlDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__get
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
    */
   public function test__get()
   {
       parent::test__get();
   }

}
