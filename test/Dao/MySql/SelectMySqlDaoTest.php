<?php

/**
 * This file contain Seeren\Database\Test\Dao\MySql\SelectMySqlDaoTest class
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
use Seeren\Database\Dao\MySql\SelectMySqlDao;
use Seeren\Database\Table\TableInterface;
use PDOException;
use ReflectionClass;

/**
 * Class for test SelectMySqlDao
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dao\MySql
 */
class SelectMySqlDaoTest extends AbstractMySqlDaoTest
{

    /**
     * Get Dao
     *
     * @return DaoInterface dao
     */
    protected function getDao(): DaoInterface
    {
       return (new ReflectionClass(SelectMySqlDao::class))
       ->newInstanceArgs([]);
    }

    /**
     * Get default syntax
     *
     * @return string dao to string
     */
    protected function getDefaultSyntax(): string
    {
        return "SELECT * FROM `"
            . $this->getTable()->get(TableInterface::ATTR_NAME) . "`;";
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::__construct
     * @covers \Seeren\Database\Dal\Dal::__construct
     * @covers \Seeren\Database\Dal\Dal::getLayer
     * @covers \Seeren\Database\Dal\Dal::setLayer
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::query
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::bindParam
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::getClause
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::setParam
     * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::execute
     * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::getSyntax
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::__set
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\AbstractTable::get
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getValue
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
     * @covers \Seeren\Database\Table\Column\StringColumn::getParam
     * @covers \Seeren\Database\Table\Column\StringColumn::setValue
     * @covers \Seeren\Database\Table\Key\Key::__construct
     * @covers \Seeren\Database\Table\User\User::__construct
     */
    public function testGetDefaultSyntax()
    {
         parent::testGetDefaultSyntax();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::__construct
     * @covers \Seeren\Database\Dal\Dal::__construct
     * @covers \Seeren\Database\Dal\Dal::getLayer
     * @covers \Seeren\Database\Dal\Dal::setLayer
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::query
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::bindParam
     * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::getClause
     * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::execute
     * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::getSyntax
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::__set
     * @covers \Seeren\Database\Table\AbstractTable::__get
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\AbstractTable::get
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getValue
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
     * @covers \Seeren\Database\Table\Column\StringColumn::setValue
     * @covers \Seeren\Database\Table\Key\Key::__construct
     * @covers \Seeren\Database\Table\User\User::__construct
     */
    public function testGeSyntax()
    {
        $dao = $this->getDao();
        $table = $this->getTable();
        $table->host = "dummy";
        try {
            $dao->query($table, $this->getDal());
        } catch (PDOException $e) {
        }
        $this->assertTrue(
            $dao->queryString
        === "SELECT `host` FROM `"
          . $table->get(TableInterface::ATTR_NAME) . "`;"
         && $table->host === "host_name"
        );
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::__construct
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
     * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::clone
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
     */
    public function testClone()
    {
        parent::testClone();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::__construct
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
    * @covers \Seeren\Database\Dao\MySql\SelectMySqlDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__get
    * @covers \Seeren\Database\Dao\MySql\AbstractMySqlDao::__construct
    */
   public function test__get()
   {
       parent::test__get();
   }

}
