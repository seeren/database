<?php

/**
 * This file contain Seeren\Database\Test\Dal\DalTest class
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

namespace Seeren\Database\Test\Dal;

use Seeren\Database\Dal\DalInterface;
use ReflectionClass;
use Seeren\Database\Dal\MySql\MySqlDal;

/**
 * Class for test Dal
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dal
 */
class DalTest extends DalInterfaceTest
{

   /**
    * Get DalInterface
    * 
    * @return DalInterface dal
    */
   protected function getDalInterface(): DalInterface
   {
       $reflection = new ReflectionClass(MySqlDal::class);
       return $reflection->newInstanceArgs([]);
   }

}
