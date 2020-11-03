<?php

namespace Seeren\Database\Entity\Column;

use PDO;

/**
 * Class to represent a entity string column
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Column
 */
class StringColumn extends AbstractColumn implements StringColumnInterface
{

    /**
     * {@inheritDoc}
     * @see AbstractColumn::castValue()
     */
    protected function castValue($value)
    {
        return (string)$value;
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
