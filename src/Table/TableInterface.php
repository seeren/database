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
 * @version 2.0.2
 */
namespace Seeren\Database\Table;

use Seeren\Database\Table\Clause\ClauseInterface;
use Seeren\Database\Dao\DaoInterface;
use JsonSerializable;

/**
 * Interface for map table in object
 *
 * @category Seeren
 * @package Database
 * @subpackage Table
 */
interface TableInterface extends JsonSerializable
{

    const

        /**
         * @var string const name
         */

        ATTR_NAME = "NAME",

        /**
         * @var string const name
         */
        ATTR_OBJECT = "object",

        /**
         * @var string const name
         */
        ATTR_COLUMN = "column",

        /**
         * @var string const name
         */
        ATTR_KEY = "key",

        /**
         * @var string const name
         */
        ATTR_CLAUSE = "clause";

    /**
     * Call
     *
     * @param string $name
     * @param array $args
     * @return TableInterface self
     *        
     * @throws \RuntimeException on faillure
     */
    public function __call(string $name, array $args): TableInterface;

    /**
     * Get attribute
     *
     * @param string $name
     * @return mixed attribute value
     */
    public function get(string $name);

    /**
     * Set results
     *
     * @param DaoInterface $object
     * @return null
     */
    public function set(DaoInterface $object);

    /**
     * Add clause
     *
     * @param ClauseInterface $clause
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
