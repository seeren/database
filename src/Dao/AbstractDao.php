<?php

/**
 * This file contain Seeren\Database\Dao\AbstractDao class
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

namespace Seeren\Database\Dao;

use Seeren\Database\Table\TableInterface;
use Seeren\Database\Dal\DalInterface;

/**
 * Class for provide data access object
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao
 */
abstract class AbstractDao
{

    protected
        /**
         * @var string query string
         */
        $queryString,
        /**
         * @var int row number
         */
        $row;

    /**
     * Template method Get MSql syntaxe
     *
     * @param TableInterface $table table
     * @return string Myql operation for table
     */
    abstract protected function getSyntax(TableInterface $table): string;

    /**
     * Template method Execute operation
     *
     * @param TableInterface $table table
     * @param DalInterface $dal access layer
     * @return null
     */
    abstract protected function execute(
        TableInterface $table,
        DalInterface $dal);

    /**
     * Construct AbstractDao
     *
     * @return null
     */
    protected function __construct()
    {
        $this->queryString = "";
        $this->row = 0;
    }

    /**
     * Get constant
     *
     * @param string $name const name
     * @return string static const
     */
    protected final function constant($name): string
    {
        $const = "static::" . $name;
        return defined($const) ? constant($const) : $name;
    }

    /**
     * Query table for dal
     *
     * @param TableInterface $table table
     * @param DalInterface $dal access layer
     * @return DaoInterface this
     */
    public function query(
        TableInterface $table,
        DalInterface $dal): DaoInterface
    {
        $this->queryString = $this->getSyntax($table);
        $this->execute($table, $dal);
        return $this;
    }

    /**
     * Close
     *
     * @return null
     */
    public function close()
    {
        unset($this->queryString);
    }

    /**
     * Get an instance
     *
     * @return PrototypeInterface instance
     *
     */
    public final function clone(): DaoInterface
    {
        return clone $this;
    }

    /**
     * Get string representation
     *
     * @return string representation
     */
    public final function __toString(): string
    {
        return (string) $this->queryString;
    }

    /**
     * Get attribut
     *
     * @param string $name attribut name
     * @return null
     */
    public final function __get($name)
    {
        return property_exists($this, $name) ? $this->{$name} : null;
    }

}
