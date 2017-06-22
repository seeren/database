<?php

/**
 * This file contain Seeren\Database\Table\TableInterface interface
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */

namespace Seeren\Database\Table;

use Seeren\Database\Table\Clause\ClauseInterface;
use Seeren\Database\Dao\DaoInterface;

/**
 * Interface for map table in object
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table
 */
interface TableInterface
{

    const
        /**
         * @var string const name
         */
        ATTR_NAME   = "NAME",
        /**
         * @var string const name
         */
        ATTR_OBJECT = "object",
        /**
         * @var string attribut name
         */
        ATTR_COLUMN = "column",
        /**
         * @var string attribut name
         */
        ATTR_KEY    = "key",
        /**
         * @var string attribut name
         */
        ATTR_CLAUSE = "clause";

    /**
     * Call
     *
     * @param $name methode name
     * @param array methode arguments
     * @return TableInterface self
     *
     * @throws RuntimeException on faillure
     */
    public function __call(string $name, array $args): TableInterface;

    /**
     * Get attribute
     *
     * @param string $name attribute name
     * @return mixed attribute value
     */
    public function get(string $name);

    /**
     * Set results
     *
     * @param DaoInterface $object access object
     * @return null
     */
    public function set(DaoInterface $object);

    /**
     * Add clause
     *
     * @param ClauseInterface $clause table clause
     * @return null
     */
    public function addClause(ClauseInterface $clause);

    /**
     * Clear clauses and results
     *
     * @return null
     */
    public function clear();

}
