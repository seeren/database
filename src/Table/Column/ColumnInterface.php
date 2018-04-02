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
namespace Seeren\Database\Table\Column;

use JsonSerializable;

/**
 * Interface for represent a table column
 *
 * @category Seeren
 * @package Database
 * @subpackage Table\Column
 */
interface ColumnInterface extends JsonSerializable
{

    const
    
        /**
         * @var string
         */
        OPT_NULL = "NULL",
        
        /**
         * @var string
         */
        OPT_NOT_NULL = "NOT_NULL",
        
        /**
         * @var string
         */
        OPT_DEFAULT_NULL = "DEFAULT_NULL",
        
        /**
         * @var string
         */
        OPT_DEFAULT_STRING = "DEFAULT_STRING",
        
        /**
         * @var string
         */
        OPT_DEFAULT_TIMESTAMP = "DEFAULT_TIMESTAMP",
        
        /**
         * @var string
         */
        OPT_BINARY = "BINARY",
        
        /**
         * @var string
         */
        OPT_UNSIGNED = "UNSIGNED",
        
        /**
         * @var string
         */
        OPT_AUTO_INCREMENT = "AUTO_INCREMENT";

    /**
     * Get name
     *
     * @return string name
     */
    public function getName(): string;

    /**
     * Get value
     *
     * @return mixed value
     */
    public function getValue();

    /**
     * Set value
     *
     * @param mixed $value
     * 
     * @return null
     */
    public function setValue($value);

    /**
     * Get type
     *
     * @return string type
     */
    public function getType(): string;

    /**
     * Get PDO param
     *
     * @return int const value
     */
    public function getParam(): int;

    /**
     * Get size
     *
     * @return int size
     */
    public function getSize(): int;

    /**
     * Get option
     *
     * @return array option
     */
    public function getOption(): array;

}
