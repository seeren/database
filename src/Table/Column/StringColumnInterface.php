<?php

/**
 * This file contain Seeren\Database\Table\Column\StringColumnInterface
 * interface
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

namespace Seeren\Database\Table\Column;

/**
 * Interface for represent table string column
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table\Column
 */
interface StringColumnInterface extends ColumnInterface
{

    const
        /**
         * @var string type name
         */
        TINYTEXT   = "TINYTEXT",
        /**
         * @var string type name
         */
        TEXT       = "TEXT",
        /**
         * @var string type name
         */
        MEDIUMTEXT = "MEDIUMTEXT",
        /**
         * @var string type name
         */
        LONGTEXT   = "LONGTEXT",
        /**
         * @var string type name
         */
        CHAR       = "CHAR",
        /**
         * @var string type name
         */
        VARCHAR    = "VARCHAR";

}
