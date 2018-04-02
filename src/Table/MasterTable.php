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
 * @version 1.3.4
 */

namespace Seeren\Database\Table;

use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\Clause\ClauseInterface;
use InvalidArgumentException;
use RuntimeException;
use Throwable;

/**
 * Class for map master table in object
 * 
 * @category Seeren
 * @package Database
 * @abstract
 */
abstract class MasterTable extends AbstractTable
{

    private

        /**
         * @var array TableInterface
         */
        $table;

    /**
     * @param array $table agregate table
     */
    protected function __construct(array $table)
    {
        parent::__construct();
        $this->table = [];
        foreach ($table as $table) {
            if ($table instanceof TableInterface) {
                $this->table[$table->get(TableInterface::ATTR_NAME)] = $table;
            }
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\AbstractTable::__call()
     */
    public final function __call(string $name, array $args): TableInterface
    {
        if (array_key_exists(0, $args)) {
            $args[0]->getLayer()->beginTransaction();
        }
        try {
            parent::__call($name, $args);
            foreach ($this->table as $table) {
                $table->__call($name, $args);
            }
            $args[0]->getLayer()->commit();
            return $this;
        } catch (InvalidArgumentException $e) {
            throw $e;
        } catch (Throwable $e) {
            if (array_key_exists(0, $args)) {
                $args[0]->getLayer()->rollBack();
            }
            throw new RuntimeException(
                "Can't call " . static::class . "::" . $name
              . ": " . $e->getMessage());
        }
    }

    /**
     * @param DalInterface $dal
     * @throws RuntimeException
     * @return \Seeren\Database\Table\MasterTable
     */
    public function select(DalInterface $dal)
    {
        try {
            foreach ($this->table as $table) {
                $dal->query($table, __FUNCTION__);
            }
            $dal->query($this, __FUNCTION__);
            return $this;
        } catch (RuntimeException $e) {
            throw $e;
        }
    }

    /**
     * @param DalInterface $dal
     * @throws RuntimeException
     * @return \Seeren\Database\Table\MasterTable
     */
    public function delete(DalInterface $dal)
    {
        $dal->getLayer()->beginTransaction();
        try {
            foreach ($this->table as $table) {
                $dal->query($table, __FUNCTION__);
            }
            $dal->query($this, __FUNCTION__);
            $dal->getLayer()->commit();
            return $this;
        } catch (RuntimeException $e) {
            $dal->getLayer()->rollBack();
            throw $e;
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\AbstractTable::__get()
     */
    public final function __get(string $name)
    {
        if (($value = parent::__get($name))) {
            return $value;
        }
        foreach ($this->table as $table) {
            if (($value = $table->__get($name))) {
                return $value;
            }
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\AbstractTable::__set()
     */
    public final function __set(string $name, $value)
    {
        parent::__set($name, $value);
        foreach ($this->table as $table) {
            $table->__set($name, $value);
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\AbstractTable::get()
     */
    public final function get(string $name = TableInterface::ATTR_OBJECT)
    {
        return ($value = parent::get($name)) || null !== $value
             ? $value
             : (array_key_exists($name, $this->table)
             ? $this->table[$name]
             : null);
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\AbstractTable::addClause()
     */
    public final function addClause(ClauseInterface $clause)
    {
        parent::addClause($clause);
        foreach ($this->table as $table) {
            $table->addClause($clause);
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\AbstractTable::clear()
     */
    public final function clear()
    {
        parent::clear();
        foreach ($this->table as $table) {
            $table->clear();
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\AbstractTable::jsonSerialize()
     */
    public final function jsonSerialize()
    {
        return parent::jsonSerialize() + $this->table;
    }

}
