<?php

/**
 * This file contain Seeren\Database\Test\Dao\MySql\CreateMySqlDaoTest class
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
use Seeren\Database\Dao\MySql\CreateMySqlDao;
use Seeren\Database\Test\Dao\DummyTable;
use ReflectionClass;
use PDOException;

/**
 * Class for test CreateMySqlDao
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dao\MySql
 */
class CreateMySqlDaoTest extends AbstractDaoTest
{

    /**
     * Get Dao
     *
     * @return DaoInterface dao
     */
    protected function getDao(): DaoInterface
    {
       return (new ReflectionClass(CreateMySqlDao::class))->newInstanceArgs([]);
    }

    /**
     * Get default syntax
     *
     * @return string dao to string
     */
    protected function getDefaultSyntax(): string
    {
        return "CREATE TABLE IF NOT EXISTS `user` (" . "\n"
            . "`host` CHAR(60) NOT NULL DEFAULT ''," . "\n"
            . "`user` CHAR(80) NOT NULL DEFAULT ''," . "\n"
            . "`password` CHAR(41) NOT NULL DEFAULT ''," . "\n"
            . "`dbname` CHAR(32) DEFAULT NULL" . "\n"
            . ") ENGINE=innoDB CHARSET=utf8;" . "\n"
            . "ALTER TABLE `user`" . "\n"
            . "ADD PRIMARY KEY `k_user_0` (`host`, `user`)," . "\n"
            . "ADD KEY `k_user_1` (`password`);";
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::__construct
     * @covers \Seeren\Database\Dal\Dal::__construct
     * @covers \Seeren\Database\Dal\Dal::getLayer
     * @covers \Seeren\Database\Dal\Dal::setLayer
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::constant
     * @covers \Seeren\Database\Dao\AbstractDao::query
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::addAutoIncrement
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::addKey
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::constraint
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::execute
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::getColumnSyntaxe
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::getSyntax
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\AbstractTable::get
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getOption
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getSize
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getType
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
     * @covers \Seeren\Database\Table\Key\Key::__construct
     * @covers \Seeren\Database\Table\Key\Key::getSubject
     * @covers \Seeren\Database\Table\Key\Key::getType
     * @covers \Seeren\Database\Table\User\User::__construct
     */
    public function testGetDefaultSyntax()
    {
        parent::testGetDefaultSyntax();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::__construct
     * @covers \Seeren\Database\Dal\Dal::__construct
     * @covers \Seeren\Database\Dal\Dal::getLayer
     * @covers \Seeren\Database\Dal\Dal::setLayer
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::constant
     * @covers \Seeren\Database\Dao\AbstractDao::query
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::addAutoIncrement
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::addForeign
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::addKey
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::constraint
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::execute
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::getColumnSyntaxe
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::getSyntax
     * @covers \Seeren\Database\Table\AbstractTable::__construct
     * @covers \Seeren\Database\Table\AbstractTable::addColumn
     * @covers \Seeren\Database\Table\AbstractTable::addKey
     * @covers \Seeren\Database\Table\AbstractTable::get
     * @covers \Seeren\Database\Table\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getOption
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getSize
     * @covers \Seeren\Database\Table\Column\AbstractColumn::getType
     * @covers \Seeren\Database\Table\Column\IntegerColumn::__construct
     * @covers \Seeren\Database\Table\Column\StringColumn::__construct
     * @covers \Seeren\Database\Table\Key\Key::__construct
     * @covers \Seeren\Database\Table\Key\Key::getForeigner
     * @covers \Seeren\Database\Table\Key\Key::getForeignerSubject
     * @covers \Seeren\Database\Table\Key\Key::getSubject
     * @covers \Seeren\Database\Table\Key\Key::getType
     */
    public function testGetSyntax()
    {
        $dao = $this->getDao();
        try {
            $dao->query(new DummyTable(), $this->getDal());
        } catch (PDOException $e) {
        }
        $this->assertTrue(
            $dao->queryString
        === "CREATE TABLE IF NOT EXISTS `dummy` (" . "\n"
          . "`id` INT(10) NOT NULL," . "\n"
          . "`user` CHAR(80) NOT NULL DEFAULT ''" . "\n"
          . ") ENGINE=innoDB CHARSET=utf8;" . "\n"
          . "ALTER TABLE `dummy`" . "\n"
          . "ADD PRIMARY KEY `k_dummy_0` (`id`)," . "\n"
          . "MODIFY `id` INT(10) NOT NULL AUTO_INCREMENT;" . "\n"
          . "ALTER TABLE `dummy`" . "\n"
          . "ADD CONSTRAINT `fk_dummy_1` FOREIGN KEY (`user`)  "
          . "REFERENCES `user` (`user`);"
        );
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::close
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     */
    public function testClose()
    {
        parent::testClose();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::clone
     */
    public function testClone()
    {
        parent::testClone();
    }

    /**
     * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__construct
     * @covers \Seeren\Database\Dao\AbstractDao::__get
     * @covers \Seeren\Database\Dao\AbstractDao::__toString
     */
   public function test__toString()
   {
       parent::test__toString();
   }

   /**
    * @covers \Seeren\Database\Dao\MySql\CreateMySqlDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__construct
    * @covers \Seeren\Database\Dao\AbstractDao::__get
    */
   public function test__get()
   {
       parent::test__get();
   }

}
