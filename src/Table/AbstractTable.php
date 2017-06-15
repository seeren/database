<?php

/**
 * This file contain Seeren\Database\Table\AbstractTable class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.4
 */

namespace Seeren\Database\Table;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Table\Clause\ClauseInterface;
use Seeren\Database\Table\Column\ColumnInterface;
use Seeren\Database\Table\Key\KeyInterface;
use InvalidArgumentException;
use RuntimeException;
use Throwable;

/**
 * Class for map table in object
 * 
 * @category Seeren
 * @package Database
 * @abstract
 */
abstract class AbstractTable
{

    private
        /**
         * @var array DaoInterface access object
         */
        $object,
        /**
         * @var array ColumnInterface collection
         */
        $column,
        /**
         * @var array KeyInterface collection
         */
        $key,
        /**
        * @var array ClauseInterface collection
        */
        $clause;

    /**
     * Construct AbstractTable
     * 
     * @return null
     */
    protected function __construct()
    {
        $this->column = $this->key = $this->clause = [];
    }

    /**
     * Add a column
     * 
     * @param ColumnInterface $column column
     * @return null
     */
    protected final function addColumn(ColumnInterface $column)
    {
        $this->column[$column->getName()] = $column;
    }

    /**
     * Add a key
     *
     * @param KeyInterface $key key
     * @return null
     */
    protected final function addKey(KeyInterface $key)
    {
        $this->key[] = $key;
    }

    /**
     * Call
     *
     * @param string $name methode name
     * @param array $args methode arguments
     * @return TableInterface self
     * 
     * @throws InvalidArgumentException for no layer
     * @throws RuntimeException on layer exception
     */
    public function __call(string $name, array $args): TableInterface
    {
        if (!array_key_exists(0, $args)) {
            throw new InvalidArgumentException(
               "Can't call " . static::class . "::" . $name
             . ": missing DalInterface");
        }
        try {
            $args[0]->query($this, $name);
            return $this;
        } catch (Throwable $e) {
            throw new RuntimeException(
                "Can't call " . static::class . "::" . $name
              . ": " . $e->getMessage());
        } 
    }

    /**
     * Get column value
     * 
     * @param string $name column index
     * @return mixed column value
     */
    public function __get(string $name)
    {
        return array_key_exists($name, $this->column)
             ? $this->column[$name]->getValue()
             : null;
    }

    /**
     * Set column value
     * 
     * @param string $name column index
     * @param mixed $value column value
     * @return null
     */
    public function __set(string $name, $value)
    {
        if (array_key_exists($name, $this->column)) {
            $this->column[$name]->setValue($value);
        }
    }

    /**
     * Get attribute
     *
     * @param string $name attribute name
     * @return mixed attribute value
     */
    public function get(string $name = TableInterface::ATTR_OBJECT)
    {
        return property_exists($this, $name)
             ? $this->{$name}
             : (($const = "static::" . $name) && defined($const)
             ? constant($const)
             : null);
    }

    /**
     * Set access object
     *
     * @param DaoInterface $object access object
     * @return null
     */
    public function set(DaoInterface $object)
    {
        $object->close();
        $this->object = $object;
    }

    /**
     * Add clause
     *
     * @param ClauseInterface $clause table clause
     * @return null
     */
    public function addClause(ClauseInterface $clause)
    {
        $this->clause[] = $clause;
    }

    /**
     * Clear clauses and results
     *
     * @return null
     */
    public function clear()
    {
        $this->object = null;
        $this->clause   = [];
    }

}
