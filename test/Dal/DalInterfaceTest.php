<?php

/**
 * This file contain Seeren\Database\Test\Dal\DalInterfaceTest class
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

namespace Seeren\Database\Test\Dal;

use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Dao\DaoInterface;

/**
 * Class for test DalInterface
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dal
 * @abstract
 */
abstract class DalInterfaceTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get DalInterface
    * 
    * @return DalInterface dal
    */
   abstract protected function getDalInterface(): DalInterface;

   /**
    * Test TableInterface::getObject
    * 
    * @dataProvider getObjectProvider
    */
   public final function testGetObject($operation)
   {
      $this->assertTrue(
          $this->getDalInterface()
          ->getObject($operation) instanceof DaoInterface  
      );
  }

   /**
    * getObject Provider
    */
   public final function getObjectProvider()
   {
       return [
            [DalInterface::COUNT],
            [DalInterface::CREATE],
            [DalInterface::CREATE_DB],
            [DalInterface::DELETE],
            [DalInterface::DROP],
            [DalInterface::DROP_DB],
            [DalInterface::INSERT],
            [DalInterface::OPEN],
            [DalInterface::SELECT],
            [DalInterface::UPDATE],
            [DalInterface::USE_DB]
       ];
  }

}
