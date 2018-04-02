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
 * @version 1.0.3
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
         * @var string
         */
        $queryString,

        /**
         * @var int
         */
        $row;

    /**
     * @param TableInterface $table
     * @return string
     */
    abstract protected function getSyntax(TableInterface $table): string;

    /**
     * @param DalInterface $dal
     * @return null
     */
    abstract protected function execute(DalInterface $dal);

    /**
     * @constructor
     */
    protected function __construct()
    {
        $this->queryString = "";
        $this->row = 0;
    }

    /**
     * @param string $name const name
     * @return string static const
     */
    protected final function constant($name): string
    {
        $const = "static::" . $name;
        return defined($const) ? constant($const) : $name;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\DaoInterface::query()
     */
    public function query(
        TableInterface $table,
        DalInterface $dal): DaoInterface
    {
        $this->queryString = $this->getSyntax($table);
        $this->execute($dal, $table);
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\DaoInterface::close()
     */
    public function close()
    {
        $this->queryString = "";
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\DaoInterface::clone()
     */
    public final function clone(): DaoInterface
    {
        return clone $this;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\DaoInterface::__toString()
     */
    public final function __toString(): string
    {
        return $this->queryString;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\DaoInterface::__get()
     */
    public final function __get($name)
    {
        return isset($this->{$name}) ? $this->{$name} : null;
    }

}
