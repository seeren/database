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
 * @version 1.0.2
 */

namespace Seeren\Database\Dao;

use Seeren\Database\Table\TableInterface;
use Seeren\Database\Dal\DalInterface;

/**
 * Interface for provide data access object
 *
 * @category Seeren
 * @package Database
 * @subpackage Dao
 */
interface DaoInterface
{

    const

    /**
     * @var string
     */
    ATTR_ROW = "row",
    
    /**
     * @var string
     */
    ATTR_PARAM = "param",
    
    /**
     * @var string
     */
    ATTR_RESULT = "result";

    /**
     * Query table for dal
     *
     * @param TableInterface $table
     * @param DalInterface $dal
     * 
     * @return DaoInterface self
     */
    public function query(TableInterface $table, DalInterface $dal): self;

    /**
     * Get an instance
     *
     * @return DaoInterface instance
     *        
     */
    public function clone(): self;

    /**
     * Get string representation
     *
     * @return string representation
     */
    public function __toString(): string;

    /**
     * Get attribut
     *
     * @param string $name
     * 
     * @return null
     */
    public function __get($name);

}
