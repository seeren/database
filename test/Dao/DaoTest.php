<?php

/**
 * This file contain Seeren\Database\Test\Dao\DaoTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Database\Test\Dao;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dao\MySql\OpenMySqlDao;
use ReflectionClass;

/**
 * Class for test Dao
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dao
 */
class DaoTest extends DaoInterfaceTest
{

   /**
    * Get DaoInterface
    * 
    * @return DaoInterface dao
    */
   protected function getDaoInterface(): DaoInterface
   {
       $reflection = new ReflectionClass(OpenMySqlDao::class);
       return $reflection->newInstanceArgs([]);
   }

}
