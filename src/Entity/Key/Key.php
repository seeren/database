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
     * @param string $type
     * @param array $columnsName
     */
    public function __construct(string $type, array $columnsName)
    {
        $this->type = $type;
        $this->columnsName = $columnsName;
    }

    /**
     * {@inheritDoc}
     * @see KeyInterface::getType()
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     * @see KeyInterface::getColumnsName()
     */
    public function getColumnsName(): array
    {
        return $this->columnsName;
    }

}
