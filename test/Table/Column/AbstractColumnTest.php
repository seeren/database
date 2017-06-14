<?php

/**
 * This file contain Seeren\Database\Test\Table\Column\AbstractColumnTest class
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

namespace Seeren\Database\Test;

use Seeren\Database\Table\Column\ColumnInterface;

/**
 * Class for test AbstractColumn
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table\Column
 * @abstract
 */
abstract class AbstractColumnTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get Column
    * 
    * @return ColumnInterface column
    */
   abstract protected function getColumn(): ColumnInterface;

}
