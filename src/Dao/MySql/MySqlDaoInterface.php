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
         * @var string
         */
        NULL = "NULL",
        
        /**
         * @var string
         */
        NOT_NULL = "NOT NULL",
        
        /**
         * @var string
         */
        DEFAULT_NULL = "DEFAULT NULL",
        
        /**
         * @var string
         */
        DEFAULT_STRING = "DEFAULT ''",
        
        /**
         * @var string
         */
        DEFAULT_TIMESTAMP = "DEFAULT CURRENT_TIMESTAMP",
        
        /**
         * @var string
         */
        BINARY = "BINARY",
        
        /**
         * @var string
         */
        UNSIGNED = "UNSIGNED",
        
        /**
         * @var string
         */
        AUTO_INCREMENT = "",
        
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
        VARCHAR = "VARCHAR",
        
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
        BIGINT = "BIGINT",
        
        /**
         * @var string
         */
        AND = "AND",
        
        /**
         * @var string
         */
        JOIN = "JOIN",
        
        /**
         * @var string
         */
        LIMIT = "LIMIT",
        
        /**
         * @var string
         */
        OR = "OR",
        
        /**
         * @var string
         */
        ORDER_BY = "ORDER BY",
        
        /**
         * @var string
         */
        WHERE = "WHERE",
        
        /**
         * @var string
         */
        IS_NULL = "IS NULL",
        
        /**
         * @var string
         */
        IS_NOT_NULL = "IS NOT NULL",
        
        /**
         * @var string
         */
        EQUAL = "=",
        
        /**
         * @var string
         */
        INEQUAL = "!=",
        
        /**
         * @var string
         */
        SUP = ">",
        
        /**
         * @var string
         */
        SUP_EQUAL = ">=",
        
        /**
         * @var string
         */
        INF = "<",
        
        /**
         * @var string
         */
        INF_EQUAL = "<",
        
        /**
         * @var string
         */
        ASC = "ASC",
        
        /**
         * @var string
         */
        DESC = "DESC",
        
        /**
         * @var string
         */
        PRIMARY = "PRIMARY KEY",
        
        /**
         * @var string
         */
        KEY = "KEY",
        
        /**
         * @var string
         */
        INDEX = "KEY",
        
        /**
         * @var string
         */
        UNIQUE = "UNIQUE KEY",
        
        /**
         * @var string
         */
        FOREIGN = "FOREIGN KEY";

}
