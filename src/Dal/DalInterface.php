<?php

/**
 * This file contain Seeren\Database\Dal\DalInterface interface
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

namespace Seeren\Database\Dal;

use PDO;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Dao\DaoInterface;

/**
 * Interface for provide data access layer
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dal
 */
interface DalInterface
{

    const
        /**
         * @var string operation name
         */
        COUNT = "count",
        /**
         * @var string operation name
         */
        CREATE = "create",
        /**
         * @var string operation name
         */
        CREATE_DB = "createdb",
        /**
         * @var string operation name
         */
        DELETE = "delete",
        /**
         * @var string operation name
         */
        DROP = "drop",
        /**
         * @var string operation name
         */
        DROP_DB = "dropdb",
        /**
         * @var string operation name
         */
        INSERT = "insert",
        /**
         * @var string operation name
         */
        OPEN = "open",
        /**
         * @var string operation name
         */
        SELECT = "select",
        /**
         * @var string operation name
         */
        UPDATE = "update",
        /**
         * @var string operation name
         */
        USE_DB = "usedb";

    /**
     * Query table for operation
     *
     * @param TableInterface $table table
     * @param string $operation operation name
     * @return DalInterface self
     * 
     * @throws RuntimeException on faillure
     */
    public function query(TableInterface $table, string $operation): self;

    /**
     * Get layer
     *
     * @return PDO database layer
     * 
     * @throws RuntimeException on null
     */
    public function getLayer(): PDO;

    /**
     * Set layer
     *
     * @param PDO $dbh layer
     * @return null
     */
    public function setLayer(PDO $dbh);

    /**
     * Get object for operation
     *
     * @param string $operation operation name
     * @return DaoInterface access object
     *
     * @throws RuntimeException on operation unreachable
     */
    public function getObject(string $operation): DaoInterface;

}
