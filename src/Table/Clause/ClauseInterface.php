<?php

/**
 * This file contain Seeren\Database\Table\Clause\ClauseInterface interface
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
         * @var string type name
         */
        AND             = "AND",
        /**
         * @var string type name
         */
        JOIN            = "JOIN",
        /**
         * @var string type name
         */
        LIMIT           = "LIMIT",
        /**
         * @var string type name
         */
        OR              = "OR",
        /**
         * @var string type name
         */
        ORDER_BY        = "ORDER_BY",
        /**
         * @var string type name
         */
        WHERE           = "WHERE",
        /**
         * @var string operator name
         */
        OP_IS_NULL      = "IS_NULL",
        /**
         * @var string operator name
         */
        OPE_IS_NOT_NULL = "IS_NOT_NULL",
        /**
         * @var string operator name
         */
        OPE_EQUAL       = "EQUAL",
        /**
         * @var string operator name
         */
        OPE_INEQUAL     = "INEQUAL",
        /**
         * @var string operator name
         */
        OPE_SUP         = "SUP",
        /**
         * @var string operator name
         */
        OPE_SUP_EQUAL   = "SUP_EQUAL",
        /**
         * @var string operator name
         */
        OPE_INF         = "INF",
        /**
         * @var string operator name
         */
        OPE_INF_EQUAL   = "INF_EQUAL",
        /**
         * @var string operator name
         */
        OPE_ASC         = "ASC",
        /**
         * @var string operator name
         */
        OPE_DESC        = "DESC";

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
