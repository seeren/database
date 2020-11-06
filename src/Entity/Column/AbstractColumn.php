<?php

namespace Seeren\Database\Entity\Column;

use InvalidArgumentException;

/**
 * Class to represent a entity generic column
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Column
 */
abstract class AbstractColumn implements ColumnInterface
{

    /**
     * @var string
     */
    private string $name;

    /**
     * @var int
     */
    private int $size;

    /**
     * @var array
     */
    private array $options;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var mixed
     */
    private $value = null;

    /**
     * @param $value
     * @return mixed
     * @throws InvalidArgumentException
     */
    abstract protected function castValue($value);

    /**
     * @param string $name
     * @param string $type
     * @param int $size
     * @param array $options
     */
    public function __construct(
        string $name,
        string $type,
        int $size,
        array $options = [])
    {
        $this->name = $name;
        $this->type = $type;
        $this->size = $size;
        $this->options = $options;
    }

    /**
     * {@inheritDoc}
     * @see ColumnInterface::getName()
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     * @see ColumnInterface::get()
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     * @see ColumnInterface::setValue()
     */
    public function set($value): void
    {
        $this->value = null !== $value ? $this->castValue($value) : null;
    }

    /**
     * {@inheritDoc}
     * @see ColumnInterface::getType()
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     * @see ColumnInterface::getSize()
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * {@inheritDoc}
     * @see ColumnInterface::getOption()
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * {@inheritDoc}
     * @see JsonSerializable::jsonSerialize()
     */
    public function jsonSerialize()
    {
        return $this->value;
    }

}
