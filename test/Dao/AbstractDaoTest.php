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
 * @version 1.0.2
 */

namespace Seeren\Database\Test\Dao;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\User\User;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Dal\Dal;
use ReflectionClass;
use PDOException;
use PDOStatement;
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
        $sth = $this->createMock(PDOStatement::class);
        $sth->method("execute")->willReturn(true);
        $sth->method("fetch")->willReturn([]);
        $sth->method("fetchAll")->willReturn([["host" => "host_name"]]);
        $pdo = $this->createMock(PDO::class);
        $pdo->method("prepare")->willReturn($sth);
        return $pdo;
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
