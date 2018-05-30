<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 2.0.2
 */

namespace Seeren\Database\Table\User;

/**
 * Interface for represent a database user
 *
 * @category Seeren
 * @package Database
 * @subpackage Table/User
 */
interface UserInterface
{

    const

    /**
     * @var string
     */
    COL_HOST = "host",
    
    /**
     * @var string
     */
    COL_USER = "user",
    
    /**
     * @var string
     */
    COL_PSWD = "password",
    
    /**
     * @var string
     */
    COL_DB = "dbname";

}
