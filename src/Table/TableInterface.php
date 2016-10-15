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
 * @version 1.0.1
 */

namespace Seeren\Database\Table;

use Seeren\Database\Table\Clause\ClauseInterface;

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
        ATTR_NAME = "NAME",
        /**
         * @var string const name
         */
        ATTR_ENGINE = "ENGINE",
        /**
         * @var string attribut name
         */
        ATTR_COLUMN = "column",
        /**
         * @var string attribut name
         */
        ATTR_KEY = "key",
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
     * Clear clauses and results
     *
     * @return null
     */
    public function clear();

    /**
     * Get attribute
     *
     * @param string $name attribute name
     * @return mixed attribute value
     */
    public function get(string $name);

    /**
     * Add clause
     *
     * @param ClauseInterface $clause table clause
     * @return null
     */
    public function addClause(ClauseInterface $clause);

}
