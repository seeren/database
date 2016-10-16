<?php

/**
 * This file contain Seeren\Database\Dao\MySql\MySqlDaoInterface class
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

namespace Seeren\Database\Dao\MySql;

use Seeren\Database\Dao\DaoInterface;

/**
 * Interface for represent MySql syntaxe
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 */
interface MySqlDaoInterface extends DaoInterface
{

    const
        /**
         * @var string column option
         */
        NULL = "NULL",
        /**
         * @var string column option
         */
        NOT_NULL = "NOT NULL",
        /**
         * @var string column option
        */
        DEFAULT_NULL = "DEFAULT NULL",
        /**
         * @var string column option
         */
        DEFAULT_STRING = "DEFAULT ''",
        /**
         * @var string column option
         */
        DEFAULT_TIMESTAMP = "DEFAULT CURRENT_TIMESTAMP",
        /**
         * @var string column option
         */
        BINARY = "BINARY",
        /**
         * @var string column option
         */
        UNSIGNED = "UNSIGNED",
        /**
         * @var string column option
         */
        AUTO_INCREMENT = "",
        /**
         * @var string column type
         */
        TINYTEXT = "TINYTEXT",
        /**
         * @var string column type
         */
        TEXT = "TEXT",
        /**
         * @var string column type
         */
        MEDIUMTEXT = "MEDIUMTEXT",
        /**
         * @var string column type
         */
        LONGTEXT = "LONGTEXT",
        /**
         * @var string column type
         */
        CHAR = "CHAR",
        /**
         * @var string column type
         */
        VARCHAR = "VARCHAR",
        /**
         * @var string column type
         */
        TINYINT = "TINYINT",
        /**
         * @var string column type
         */
        SMALLINT = "SMALLINT",
        /**
         * @var string column type
         */
        MEDIUMINT = "MEDIUMINT",
        /**
         * @var string column type
         */
        INT = "INT",
        /**
         * @var string column type
         */
        BIGINT = "BIGINT",
        /**
         * @var string clause type
         */
        AND = "AND",
        /**
         * @var string clause type
        */
        JOIN = "JOIN",
        /**
         * @var string clause type
        */
        LIMIT = "LIMIT",
        /**
         * @var string clause type
        */
        OR = "OR",
        /**
         * @var string clause type
        */
        ORDER_BY = "ORDER BY",
        /**
         * @var string clause type
        */
        WHERE = "WHERE",
        /**
         * @var string clause operator
         */
        IS_NULL = "IS NULL",
        /**
         * @var string clause operator
         */
        IS_NOT_NULL = "IS NOT NULL",
        /**
         * @var string clause operator
         */
        EQUAL = "=",
        /**
         * @var string clause operator
         */
        INEQUAL = "!=",
        /**
         * @var string clause operator
         */
        SUP = ">",
        /**
         * @var string clause operator
         */
        SUP_EQUAL = ">=",
        /**
         * @var string clause operator
         */
        INF = "<",
        /**
         * @var string clause operator
         */
        INF_EQUAL = "<",
        /**
         * @var string clause operator
         */
        ASC = "ASC",
        /**
         * @var string clause operator
         */
        DESC = "DESC",
        /**
         * @var string key type
         */
        PRIMARY = "PRIMARY KEY",
        /**
         * @var string key type
         */
        KEY = "KEY",
        /**
         * @var string key type
         */
        INDEX = "KEY",
        /**
         * @var string key type
         */
        UNIQUE = "UNIQUE KEY",
        /**
         * @var string key type
         */
        FOREIGN = "FOREIGN KEY";

}
