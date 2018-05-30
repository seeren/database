<?php

/**
 * This file contain Seeren\Database\Test\Dao\MySql\AbstractMySqlDaoTest class
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

namespace Seeren\Database\Test\Dao\MySql;

use Seeren\Database\Test\Dao\AbstractDaoTest;

/**
 * Class for test AbstractMySqlDao
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Dao\MySql
 * @abstract
 */
abstract class AbstractMySqlDaoTest extends AbstractDaoTest
{

    /**
     * Test __get
     */
    public function test__get()
    {
        parent::test__get();
        $this->assertTrue($this->getDao()->result === []);
    }

}
