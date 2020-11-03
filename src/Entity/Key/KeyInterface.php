<?php

namespace Seeren\Database\Entity\Key;

/**
 * Interface to represent a entity key
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Key
 */
interface KeyInterface
{

    /**
     * @var string
     */
    const PRIMARY = 'PRIMARY';

    /**
     * @var string
     */
    const KEY = 'KEY';

    /**
     * @var string
     */
    const INDEX = 'INDEX';

    /**
     * @var string
     */
    const UNIQUE = 'UNIQUE';

    /**
     * @var string
     */
    const FOREIGN = 'FOREIGN';

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return array
     */
    public function getColumnsName(): array;

    /**
     * @return string|null
     */
    public function getForeignerName(): ?string;

}
