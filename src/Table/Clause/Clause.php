<?php

/**
 * This file contain Seeren\Database\Table\Clause\Clause class
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

use Seeren\Database\Table\Clause\Clause;

/**
 * Class for represent a table clause
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table\Clause
 */
class Clause implements ClauseInterface
{

    protected
        /**
         * @var string type
         */
        $type,
        /**
         * @var string subject
         */
        $subject,
        /**
         * @var string operator
         */
        $operator,
        /**
         * @var mixed value
         */
        $value;

    /**
     * Construct Clause
     * 
     * @param string $type type
     * @param string $subject subject
     * @param string $operator operator
     * @param mixed $value value
     * @return null
     */
    public function __construct(
        string $type,
        string $subject = null,
        string $operator = null,
        $value = null)
    {
        $this->type = (defined("static::" . $type) ? $type : null);
        $this->subject = (string) $subject;
        $this->operator = (defined("static::OPE_" . $operator)
                        ? $operator
                        : "");
        $this->value = $value;
    }

    /**
     * Get type
     *
     * @return string type
     */
    public final function getType(): string
    {
        return $this->type;
    }

    /**
     * Get subject
     *
     * @return string subject
     */
    public final function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Get operator
     *
     * @return string operator
     */
    public final function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * Get value
     *
     * @return mixed value
     */
    public final function getValue()
    {
        return $this->value;
    }

}
