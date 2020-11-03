<?php

namespace Seeren\Database\Entity\Column;

use PDO;

/**
 * Class to represent a entity float column
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Column
 */
class FloatColumn extends AbstractColumn implements IntegerColumnInterface
{

    /**
     * {@inheritDoc}
     * @see AbstractColumn::castValue()
     */
    protected function castValue($value)
    {
        return (float)$value;
    }

    /**
     * {@inheritDoc}
     * @see ColumnInterface::getParam()
     */
    public function getParam(): int
    {
        return PDO::PARAM_STR;
    }

}
