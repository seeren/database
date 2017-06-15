<?php

/**
 * This file contain Seeren\Database\Test\Dal\AbstractDalTest class
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

namespace Seeren\Database\Test\Dal;

use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\User\User;
use ReflectionClass;
use PDO;

/**
 * Class for test Dal
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dal
 * @abstract
 */
abstract class AbstractDalTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get Dal
    * 
    * @return DalInterface dal
    */
    abstract protected function getDal(): DalInterface;

    /**
     * Get Table
     *
     * @return TableInterface table
     */
    private function getTable(): TableInterface
    {
        return (new ReflectionClass(User::class))->newInstanceArgs([]);
    }

    /**
     * Get PDO
     */
    private function getPdo()
    {
        return $this->createMock(PDO::class);
    }

    /**
     * Test get layer RuntimeException
     */
    public function testGetLayerRuntimeException()
    {
        $this->getDal()->getLayer();
    }

    /**
     * Test set layer
     */
    public function testSetLayer()
    {
        $dal = $this->getDal();
        $pdo = $this->getPdo();
        $dal->setLayer($pdo);
        $this->assertTrue($dal->getLayer() === $pdo);
    }

    /**
     * Test query RuntimeException
     */
    public function testQueryRuntimeException()
    {
        $this->getDal()->query($this->getTable(), "bad value");
    }

    /**
     * Test get object
     */
    public function testGetObject()
    {
        $dal = $this->getDal();
        $this->assertTrue(
            (bool) $dal->getObject(DalInterface::COUNT)
            && (bool) $dal->getObject(DalInterface::CREATE)
            && (bool) $dal->getObject(DalInterface::CREATE_DB)
            && (bool) $dal->getObject(DalInterface::DELETE)
            && (bool) $dal->getObject(DalInterface::DROP)
            && (bool) $dal->getObject(DalInterface::DROP_DB)
            && (bool) $dal->getObject(DalInterface::INSERT)
            && (bool) $dal->getObject(DalInterface::OPEN)
            && (bool) $dal->getObject(DalInterface::SELECT)
            && (bool) $dal->getObject(DalInterface::UPDATE)
            && (bool) $dal->getObject(DalInterface::USE_DB)
            );
    }

    /**
     * Test get object twice
     */
    public function testGetObjectTwice()
    {
        $dal = $this->getDal();
        $this->assertTrue($dal->getObject(DalInterface::COUNT)
            !== $dal->getObject(DalInterface::COUNT)
        );
    }

    /**
     * Test get object RuntimeException
     */
    public function testGetObjectRuntimeException()
    {
        $this->getDal()->getObject("bad value");
    }

}
