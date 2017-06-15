<?php

/**
 * This file contain Seeren\Database\Test\Dao\AbstractDaoTest class
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

namespace Seeren\Database\Test\Dao;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\User\User;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Dal\Dal;
use Seeren\Database\Table\AbstractTable;
use Seeren\Database\Table\Column\StringColumn;
use Seeren\Database\Table\Column\IntegerColumn;
use Seeren\Database\Table\Key\Key;
use ReflectionClass;
use PDOException;
use PDO;

/**
 * Class for test AbstractDao
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dao
 * @abstract
 */
abstract class AbstractDaoTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get Dao
    * 
    * @return DaoInterface dao
    */
    abstract protected function getDao(): DaoInterface;

    /**
     * Get default syntax
     *
     * @return string dao to string
     */
    abstract protected function getDefaultSyntax(): string;

    /**
     * Get Dal
     *
     * @return DalInterface dal
     */
    protected function getDal(): DalInterface
    {
        $dal = (new ReflectionClass(Dal::class))->newInstanceArgs([]);
        $dal->setLayer($this->getPdo());
        return $dal;
    }

    /**
     * Get Table
     *
     * @return TableInterface table
     */
    protected function getTable(): TableInterface
    {
        return (new ReflectionClass(User::class))->newInstanceArgs([]);
    }

    /**
     * Get PDO
     */
    protected function getPdo()
    {
        return $this->createMock(PDO::class);
    }

    /**
     * Test get default syntax
     */
    public function testGetDefaultSyntax()
    {
        $dao = $this->getDao();
        try {
            $dao->query($this->getTable(), $this->getDal());
        } catch (PDOException $e) {
        }
        $this->assertTrue($dao->queryString === $this->getDefaultSyntax());
    }

    /**
     * Test close
     */
    public function testClose()
    {
        $dao = $this->getDao();
        $dao->close();
        $this->assertTrue($dao->queryString === "");
    }

    /**
     * Test clone
     */
    public function testClone()
    {
        $dao = $this->getDao();
        $this->assertTrue($dao !== $dao->clone());
    }

    /**
     * Test __toString
     */
    public function test__toString()
    {
        $dao = $this->getDao();
        $this->assertTrue($dao->queryString === $dao->__toString());
    }

    /**
     * Test __get
     */
    public function test__get()
    {
        $dao = $this->getDao();
        $this->assertTrue(
            $dao->queryString === ""
         && $dao->row === 0
         && $dao->foo === null);
    }

}

class DummyTable extends AbstractTable implements TableInterface
{

    const NAME = "dummy";

    public function __construct()
    {
        parent::__construct();
        $this->addColumn(
            new IntegerColumn("id", IntegerColumn::INT, 10, [
                IntegerColumn::OPT_AUTO_INCREMENT,
                IntegerColumn::OPT_NOT_NULL])
            );
        $this->addColumn(
            new StringColumn("user", StringColumn::CHAR, 80, [
                StringColumn::OPT_NOT_NULL,
                StringColumn::OPT_DEFAULT_STRING])
            );
        $this->addKey(new Key(Key::PRIMARY, ["id"]));
        $this->addKey(new Key(
            Key::FOREIGN,
            ["user"],
            User::NAME,
            [User::COL_USER]));
    }

}
