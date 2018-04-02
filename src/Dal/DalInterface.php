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
         * @var string
         */
        COUNT = "count",
        
        /**
         * @var string
         */
        CREATE = "create",
        
        /**
         * @var string
         */
        CREATE_DB = "create_db",
        
        /**
         * @var string
         */
        DELETE = "delete",
        
        /**
         * @var string
         */
        DROP = "drop",
        
        /**
         * @var string
         */
        DROP_DB = "drop_db",
        
        /**
         * @var string
         */
        INSERT = "insert",
        
        /**
         * @var string
         */
        OPEN = "open",
        
        /**
         * @var string
         */
        SELECT = "select",
        
        /**
         * @var string
         */
        UPDATE = "update",
        
        /**
         * @var string
         */
        USE_DB = "use_db";

    /**
     * Query table for operation
     *
     * @param TableInterface $table
     * @param string $operation
     * @return DalInterface self
     *        
     * @throws \RuntimeException on faillure
     */
    public function query(TableInterface $table, string $operation): self;

    /**
     * Get layer
     *
     * @return PDO database layer
     *        
     * @throws \RuntimeException on null
     */
    public function getLayer(): PDO;

    /**
     * Set layer
     *
     * @param PDO $dbh
     * @return null
     */
    public function setLayer(PDO $dbh);

    /**
     * Get object for operation
     *
     * @param string $operation
     * @return DaoInterface access object
     *        
     * @throws \RuntimeException on operation unreachable
     */
    public function getObject(string $operation): DaoInterface;

}
