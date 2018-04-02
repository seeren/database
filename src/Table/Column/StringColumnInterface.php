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
         * @var string
         */
        TINYTEXT = "TINYTEXT",
        
        /**
         * @var string
         */
        TEXT = "TEXT",
        
        /**
         * @var string
         */
        MEDIUMTEXT = "MEDIUMTEXT",
        
        /**
         * @var string
         */
        LONGTEXT = "LONGTEXT",
        
        /**
         * @var string
         */
        CHAR = "CHAR",
        
        /**
         * @var string
         */
        VARCHAR = "VARCHAR";

}
