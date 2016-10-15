<?php

/**
 * This file contain Seeren\Database\Dal\Dal class
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
use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Table\TableInterface;
use RuntimeException;
use Throwable;

/**
 * Class for provide data access layer
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dal
 */
class Dal
{

    private
        /**
         * @var PDO database layer
         */
        $layer,
        /**
         * @var array namespace collection
         */
        $object;

    /**
     * Construct Dal
     * 
     * @param array $strategy Dao::class collection
     * @return null
     */
    public function __construct(array $object = [])
    {
        $this->object = [];
        foreach ($object as $key => $value) {
            if (defined("static::" . strtoupper($key)) && is_string($value)) {
                $this->object[$key] = $value;
            }
        }
    }

    /**
     * Get layer
     *
     * @return PDO database layer
     *
     * @throws RuntimeException on null
     */
    public final function getLayer(): PDO
    {
        if (!$this->layer) {
            throw new RuntimeException("Can't get layer: not set");
        }
        return $this->layer;
    }

    /**
     * Set layer
     *
     * @param PDO $dbh layer
     * @return null
     */
    public final function setLayer(PDO $dbh)
    {
        $this->layer = $dbh;
    }

    /**
     * Query table for operation
     *
     * @param TableInterface $table table
     * @param string $operation operation name
     * @return DalInterface self
     * 
     * @throws RuntimeException on faillure
     */
    public function query(
        TableInterface $table,
        string $operation): DalInterface
    {
        try {
            $table->set($this->getObject($operation)->query($table, $this));
            return $this;
        } catch (Throwable $e) {
            throw new RuntimeException("Can't query: " . $e->getMessage());
        }
    }

    /**
     * Get object for operation
     *
     * @param string $operation operation name
     * @return DaoInterface access object
     *
     * @throws RuntimeException on operation unreachable
     */
    public function getObject(string $operation): DaoInterface
    {
        try {
            if (is_object($this->object[$operation])) {
                return $this->object[$operation]->clone();
            } else {
                $this->object[$operation] = new $this->object[$operation];
                return $this->getObject($operation);
            }
        } catch (Throwable $e) {
            throw new RuntimeException(
                "Can't get object: operation unreachable");
        }
    }

}
