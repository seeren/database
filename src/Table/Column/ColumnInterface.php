<?php

/**
 * This file contain Seeren\Database\Table\Column\ColumnInterface interface
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

namespace Seeren\Database\Table\Column;

/**
 * Interface for represent a table column
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table\Column
 */
interface ColumnInterface
{

    const
        /**
         * @var string option name
         */
        OPT_NULL = "NULL",
        /**
         * @var string option name
         */
        OPT_NOT_NULL = "NOT_NULL",
        /**
         * @var string option name
         */
        OPT_DEFAULT_NULL = "DEFAULT_NULL",
        /**
         * @var string option name
         */
        OPT_DEFAULT_STRING = "DEFAULT_STRING",
        /**
         * @var string option name
         */
        OPT_DEFAULT_TIMESTAMP = "DEFAULT_TIMESTAMP",
        /**
         * @var string option name
         */
        OPT_BINARY = "BINARY",
        /**
         * @var string option name
         */
        OPT_UNSIGNED = "UNSIGNED",
        /**
         * @var string option name
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
     * @param mixed $value value
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
