<?php

/**
 * This file contain Seeren\Database\Dal\MySql\MySqlDal class
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

namespace Seeren\Database\Dal\MySql;

use Seeren\Database\Dal\Dal;
use Seeren\Database\Dao\MySql\CountMySqlDao;
use Seeren\Database\Dao\MySql\CreateMySqlDao;
use Seeren\Database\Dao\MySql\CreateDbMySqlDao;
use Seeren\Database\Dao\MySql\DeleteMySqlDao;
use Seeren\Database\Dao\MySql\DropMySqlDao;
use Seeren\Database\Dao\MySql\DropDbMySqlDao;
use Seeren\Database\Dao\MySql\InsertMySqlDao;
use Seeren\Database\Dao\MySql\OpenMySqlDao;
use Seeren\Database\Dao\MySql\SelectMySqlDao;
use Seeren\Database\Dao\MySql\UpdateMySqlDao;
use Seeren\Database\Dao\MySql\UseDbMySqlDao;

/**
 * Class for provide MySql data access object
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dal\MySql
 */
class MySqlDal extends Dal
{

    /**
     * Construct MySqlDal
     * 
     * @return null
     */
    public function __construct()
    {
        parent::__construct([
            self::COUNT => CountMySqlDao::class,
            self::CREATE => CreateMySqlDao::class,
            self::CREATE_DB => CreateDbMySqlDao::class,
            self::DELETE => DeleteMySqlDao::class,
            self::DROP => DropMySqlDao::class,
            self::DROP_DB => DropDbMySqlDao::class,
            self::INSERT => InsertMySqlDao::class,
            self::OPEN => OpenMySqlDao::class,
            self::SELECT => SelectMySqlDao::class,
            self::UPDATE => UpdateMySqlDao::class,
            self::USE_DB => UseDbMySqlDao::class,
        ]);
    }

}
