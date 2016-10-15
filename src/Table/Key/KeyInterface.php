<?php

/**
 * This file contain Seeren\Database\Table\Key\KeyInterface interface
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

namespace Seeren\Database\Table\Key;

/**
 * Interface for represent a table key
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table\Key
 */
interface KeyInterface
{

    const
        /**
         * @var string type
         */
        PRIMARY = "PRIMARY",
        /**
         * @var string type
         */
        KEY = "KEY",
        /**
         * @var string type
         */
        INDEX = "INDEX",
        /**
         * @var string type
         */
        UNIQUE = "UNIQUE",
        /**
         * @var string type
         */
        FOREIGN = "FOREIGN";

    /**
     * Get type
     *
     * @return string type
     */
    public function getType(): string;

    /**
     * Get subject name collection
     *
     * @return array subject
     */
    public function getSubject(): array;

    /**
     * Get foreigner
     *
     * @return string foreigner name
     */
    public function getForeigner(): string;

    /**
     * Get foreigner subject name collection
     *
     * @return array foreigner subject name collection
     */
    public function getForeignerSubject(): array;

}
