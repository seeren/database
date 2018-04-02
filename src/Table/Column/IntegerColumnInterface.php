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
 * @version 1.0.2
 */

namespace Seeren\Database\Table\Column;

/**
 * Interface for represent a table integer column
 *
 * @category Seeren
 * @package Database
 * @subpackage Table\Column
 */
interface IntegerColumnInterface extends ColumnInterface
{

    const

        /**
         * @var string
         */
        TINYINT = "TINYINT",
        
        /**
         * @var string
         */
        SMALLINT = "SMALLINT",
        
        /**
         * @var string
         */
        MEDIUMINT = "MEDIUMINT",
        
        /**
         * @var string
         */
        INT = "INT",
        
        /**
         * @var string
         */
        BIGINT = "BIGINT";

}
