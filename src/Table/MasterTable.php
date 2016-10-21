<?php

/**
 * This file contain Seeren\Database\Table\MasterTable class
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

namespace Seeren\Database\Table;

use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Dao\DaoInterface;
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
         * @var array TableInterface collection
         */
        $table;

    /**
     * Construct MasterTable
     * 
     * @return null
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
     * Call
     *
     * @param $name methode name
     * @param array methode arguments
     * @return TableInterface self
     *
     * @throws InvalidArgumentException for no layer
     * @throws RuntimeException on error or layer exception
     */
    public final function __call(string $name, array $args): TableInterface
    {
        try {
            parent::__call(
                $name,
                $args,
                $args[0]->getLayer()->beginTransaction());
            foreach ($this->table as $table) {
                $table->__call($name, $args);
            }
            $args[0]->getLayer()->commit();
            return $this;
        } catch (InvalidArgumentException $e) {
            throw $e;
        } catch (RuntimeException $e) {
            $args[0]->getLayer()->rollBack();
            throw $e;
        } catch (Throwable $e) {
            throw new RuntimeException(
                "Can't call " . static::class . "::" . $name
              . ": " . $e->getMessage());
        }
    }

    /**
     * Delete
     * 
     * @param DalInterface $dal
     * @return TableInterface self
     * 
     * @throws RuntimeException on layer exception
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
     * Get column value
     *
     * @param string $name column index
     * @return mixed column value
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
     * Set column value
     *
     * @param string $name column index
     * @param mixed $value column value
     * @return null
     */
    public final function __set(string $name, $value)
    {
        parent::__set($name, $value);
        foreach ($this->table as $table) {
            $table->__set($name, $value);
        }
    }

    /**
     * Get attribute
     *
     * @param string $name attribute name
     * @return mixed attribute value
     */
    public final function get(string $name = TableInterface::ATTR_OBJECT)
    {
        return ($value = parent::get($name))
             ? $value : (array_key_exists($name, $this->table)
             ? $this->table[$name] : null);
    }

    /**
     * Set access object
     *
     * @param DaoInterface $object access object
     * @return null
     */
    public final function set(DaoInterface $object)
    {
        parent::set($object);
        foreach ($this->table as $table) {
            $table->set($object);
        }
    }

    /**
     * Add clause
     *
     * @param ClauseInterface $clause table clause
     * @return null
     */
    public final function addClause(ClauseInterface $clause)
    {
        parent::addClause($clause);
        foreach ($this->table as $table) {
            $table->addClause($clause);
        }
    }

    /**
     * Clear clauses and results
     *
     * @return null
     */
    public final function clear()
    {
        parent::clear();
        foreach ($this->table as $table) {
            $table->clear();
        }
    }

}
