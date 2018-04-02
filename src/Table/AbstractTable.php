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
 * @version 1.1.4
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
         * @var array DaoInterface
         */
        $object,

       /**
         * @var array ColumnInterface
         */
        $column,

       /**
         * @var array KeyInterface
         */
        $key,

       /**
        * @var array ClauseInterface
        */
        $clause;

    /**
     * @constructor
     */
    protected function __construct()
    {
        $this->column = $this->key = $this->clause = [];
    }

    /**
     * @param ColumnInterface $column
     */
    protected final function addColumn(ColumnInterface $column)
    {
        $this->column[$column->getName()] = $column;
    }

    /**
     * @param KeyInterface $key
     */
    protected final function addKey(KeyInterface $key)
    {
        $this->key[] = $key;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\TableInterface::__call()
     */
    public function __call(string $name, array $args): TableInterface
    {
        if (!array_key_exists(0, $args)) {
            throw new InvalidArgumentException(
               "Can't call "
             . static::class
             . "::" . $name
             . ": missing DalInterface"
            );
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
     * @param string $name
     * @return NULL
     */
    public function __get(string $name)
    {
        return array_key_exists($name, $this->column)
             ? $this->column[$name]->getValue()
             : null;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, $value)
    {
        if (array_key_exists($name, $this->column)) {
            $this->column[$name]->setValue($value);
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\TableInterface::get()
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
     * {@inheritDoc}
     * @see \Seeren\Database\Table\TableInterface::set()
     */
    public function set(DaoInterface $object)
    {
        $object->close();
        $this->object = $object;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\TableInterface::addClause()
     */
    public function addClause(ClauseInterface $clause)
    {
        $this->clause[] = $clause;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\TableInterface::clear()
     */
    public function clear()
    {
        $this->object = null;
        $this->clause   = [];
    }

    /**
     * {@inheritDoc}
     * @see \JsonSerializable::jsonSerialize()
     */
    public function jsonSerialize()
    {
        return $this->get(TableInterface::ATTR_COLUMN);
    }

}
