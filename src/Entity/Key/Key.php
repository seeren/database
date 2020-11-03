<?php

namespace Seeren\Database\Entity\Key;

/**
 * Class to represent a entity key
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Key
 */
class Key implements KeyInterface
{

    /**
     * @var string
     */
    private string $type;

    /**
     * @var array
     */
    private array $columnsName;

    /**
     * @var string|null
     */
    private ?string $foreignerName;

    /**
     * @param string $type
     * @param array $columnsName
     * @param string|null $foreignerName
     */
    public function __construct(
        string $type,
        array $columnsName,
        string $foreignerName = null)
    {
        $this->type = $type;
        $this->columnsName = $columnsName;
        $this->foreignerName = $foreignerName;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Entity\Key\KeyInterface::getType()
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     * @see KeyInterface::getForeignerName()
     */
    public function getColumnsName(): array
    {
        return $this->columnsName;
    }

    /**
     * {@inheritDoc}
     * @see KeyInterface::getForeignerName()
     */
    public function getForeignerName(): ?string
    {
        return $this->foreignerName;
    }

}
