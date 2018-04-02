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
 * @version 1.0.1
 */
namespace Seeren\Database\Table\Clause;

/**
 * Interface for represent a table clause
 *
 * @category Seeren
 * @package Database
 * @subpackage Table\Clause
 */
interface ClauseInterface
{

    const

        /**
         * @var string
         */
        AND = "AND",
        
        /**
         * @var string
         */
        JOIN = "JOIN",
        
        /**
         * @var string
         */
        LIMIT = "LIMIT",
        
        /**
         * @var string
         */
        OR = "OR",
        
        /**
         * @var string
         */
        ORDER_BY = "ORDER_BY",
        
        /**
         * @var string
         */
        WHERE = "WHERE",
        
        /**
         * @var string
         */
        OP_IS_NULL = "IS_NULL",
        
        /**
         * @var string
         */
        OPE_IS_NOT_NULL = "IS_NOT_NULL",
        
        /**
         * @var string
         */
        OPE_EQUAL = "EQUAL",
        
        /**
         * @var string
         */
        OPE_INEQUAL = "INEQUAL",
        
        /**
         * @var string
         */
        OPE_SUP = "SUP",
        
        /**
         * @var string
         */
        OPE_SUP_EQUAL = "SUP_EQUAL",
        
        /**
         * @var string
         */
        OPE_INF = "INF",
        
        /**
         * @var string
         */
        OPE_INF_EQUAL = "INF_EQUAL",
        
        /**
         * @var string
         */
        OPE_ASC = "ASC",
        
        /**
         * @var string
         */
        OPE_DESC = "DESC";

    /**
     * Get type
     *
     * @return string type
     */
    public function getType(): string;

    /**
     * Get subject
     *
     * @return string subject
     */
    public function getSubject(): string;

    /**
     * Get operator
     *
     * @return string operator
     */
    public function getOperator(): string;

    /**
     * Get value
     *
     * @return mixed value
     */
    public function getValue();

    /**
     * Set value
     *
     * @return null
     */
    public function setValue($value);

}
