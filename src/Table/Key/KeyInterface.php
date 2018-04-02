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
         * @var string
         */
        PRIMARY = "PRIMARY",
        
        /**
         * @var string
         */
        KEY = "KEY",
        
        /**
         * @var string
         */
        INDEX = "INDEX",
        
        /**
         * @var string
         */
        UNIQUE = "UNIQUE",
        
        /**
         * @var string
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
