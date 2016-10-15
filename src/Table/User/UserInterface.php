<?php

/**
 * This file contain Seeren\Database\Table\User\UserInterface interface
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

namespace Seeren\Database\Table\User;

use Seeren\Database\Table\TableInterface;

/**
 * Interface for represent a database user
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table/User
 */
interface UserInterface extends TableInterface
{

    const
        /**
         * @var string column name
         */
        COL_HOST = "host",
        /**
         * @var string column name
         */
        COL_USER = "user",
        /**
         * @var string column name
         */
        COL_PSWD = "password",
        /**
         * @var string column name
         */
        COL_DB = "dbname";

}
