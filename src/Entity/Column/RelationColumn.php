<?php

namespace Seeren\Database\Entity\Column;

use InvalidArgumentException;
use PDO;

/**
 * Class to represent a entity relation column
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Column
 */
class RelationColumn extends AbstractColumn implements RelationColumnInterface
{

    /**
     * @var string
     */
    private string $className;

    /**
     * @param string $name
     * @param string $type
     */
    public function __construct(string $name, string $type)
    {
        parent::__construct($name, IntegerColumnInterface::INT, 11, [
            IntegerColumn::OPT_UNSIGNED,
            IntegerColumn::OPT_NOT_NULL
        ]);
        $this->className = $type;
    }

    /**
     * {@inheritDoc}
     * @see AbstractColumn::castValue()
     */
    protected function castValue($value)
    {
        $className = $this->getType();
        if ($value instanceof $this->className) {
            return $value;
        }
        throw new InvalidArgumentException('Expect a "' . $className . '"');
    }

    /**
     * {@inheritDoc}
     * @see ColumnInterface::getParam()
     */
    public function getParam(): int
    {
        return PDO::PARAM_INT;
    }

    /**
     * {@inheritDoc}
     * @see ColumnInterface::getClassName()
     */
    public function getClassName(): string
    {
        return $this->className;
    }

}
