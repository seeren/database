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
         * @var string
         */
        $type,
        
        /**
         * @var string
         */
        $subject,
        
        /**
         * @var string
         */
        $operator,
        
        /**
         * @var string
         */
        $value;

    /**
     * @param string $type type
     * @param string $subject subject
     * @param string $operator operator
     * @param mixed $value value
     */
    public function __construct(
        string $type,
        string $subject = null,
        string $operator = null,
        $value = null)
    {
        $this->type = defined("static::" . $type) ? $type : "";
        $this->subject = (string) $subject;
        $this->operator = defined("static::OPE_" . $operator) ? $operator : "";
        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Clause\ClauseInterface::getType()
     */
    public final function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Clause\ClauseInterface::getSubject()
     */
    public final function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Clause\ClauseInterface::getOperator()
     */
    public final function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Clause\ClauseInterface::getValue()
     */
    public final function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Clause\ClauseInterface::setValue()
     */
    public final function setValue($value)
    {
        $this->value = $value;
    }

}
