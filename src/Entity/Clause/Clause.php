<?php

namespace Seeren\Database\Entity\Clause;

/**
 * Class to represent a entity clause
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Clause
 */
class Clause implements ClauseInterface
{

    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $columnName;

    /**
     * @var string
     */
    private string $operator;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @param string $type
     * @param string $columnName
     * @param string $operator
     * @param mixed $value
     */
    public function __construct(
        string $type,
        string $columnName = '',
        string $operator = '',
        $value = null)
    {
        $this->columnName = $columnName;
        $this->type = $type;
        $this->operator = $operator;
        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     * @see ClauseInterface::getType()
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     * @see ClauseInterface::getSubject()
     */
    public function getColumnName(): string
    {
        return $this->columnName;
    }

    /**
     * {@inheritDoc}
     * @see ClauseInterface::getOperator()
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * {@inheritDoc}
     * @see ClauseInterface::getValue()
     */
    public function getValue()
    {
        return $this->value;
    }

}
