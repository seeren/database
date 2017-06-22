<?php

/**
 * This file contain Seeren\Database\Table\Column\IntegerColumnInterface
 * interface
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
         * @var string type name
         */
        TINYINT   = "TINYINT",
        /**
         * @var string type name
         */
        SMALLINT  = "SMALLINT",
        /**
         * @var string type name
         */
        MEDIUMINT = "MEDIUMINT",
        /**
         * @var string type name
         */
        INT       = "INT",
        /**
         * @var string type name
         */
        BIGINT    = "BIGINT";

}
