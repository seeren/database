<?php

/**
 * This file contain Seeren\Database\Test\Dao\DaoInterfaceTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */

namespace Seeren\Database\Test\Dao;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dal\Dal;
use Seeren\Database\Table\User\User;
use ReflectionClass;
use Throwable;

/**
 * Class for test DaoInterface
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dao
 * @abstract
 */
abstract class DaoInterfaceTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get DaoInterface
    * 
    * @return DaoInterface dao
    */
   abstract protected function getDaoInterface(): DaoInterface;

   /**
    * Test TableInterface::query
    */
   public final function testQuery()
   {
       $dal = (new ReflectionClass(Dal::class))->newInstanceArgs([]);
       $table = (new ReflectionClass(User::class))->newInstanceArgs([]);
       $dao = $this->getDaoInterface();
       try {
           $dao->query($table, $dal);
       } catch (Throwable $e) {
       }
       $this->assertTrue($dao->__toString() === $dao->queryString);
  }

    /**
    * Test TableInterface::close
    */
    public final function testClose()
    {
      $dal = (new ReflectionClass(Dal::class))->newInstanceArgs([]);
      $table = (new ReflectionClass(User::class))->newInstanceArgs([]);
      $dao = $this->getDaoInterface();
      try {
          $dao->query($table, $dal);
      } catch (Throwable $e) {
      }
      $dao->close();
      $this->assertTrue(null === $dao->queryString);
    }

}
