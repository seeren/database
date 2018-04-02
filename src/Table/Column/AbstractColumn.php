<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.1.2
 */

namespace Seeren\Database\Table\Column;

/**
 * Class for represent a column
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table\Column
 */
abstract class AbstractColumn implements ColumnInterface
{

    protected

        /**
         * @var string
         */
        $name,

        /**
         * @var string
         */
        $type,

        /**
         * @var int
         */
        $size,

        /**
         * @var array
         */
        $option,

        /**
         * @var mixed
         */
        $value;

    /**
     * @param string $name name
     * @param string $type type
     * @param int $size size
     * @param array $option option collection
     */
    protected function __construct(
        string $name,
        string $type,
        int $size,
        array $option)
    {
        $this->name = $name;
        $this->type = defined("static::" . $type) ? $type : null;
        $this->size = $size;
        $this->option = [];
        foreach ($option as $value) {
            if (defined("static::OPT_" . $value)) {
                $this->option[] = $value;
            }
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Column\ColumnInterface::getName()
     */
    public final function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Column\ColumnInterface::getValue()
     */
    public final function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Column\ColumnInterface::getType()
     */
    public final function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Column\ColumnInterface::getSize()
     */
    public final function getSize(): int
    {
        return $this->size;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Column\ColumnInterface::getOption()
     */
    public final function getOption(): array
    {
        return $this->option;
    }

    /**
     * {@inheritDoc}
     * @see JsonSerializable::jsonSerialize()
     */
    public final function jsonSerialize()
    {
        return $this->value;
    }

}
