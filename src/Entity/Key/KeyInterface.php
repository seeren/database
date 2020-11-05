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
    const PRIMARY = 'PRIMARY KEY';

    /**
     * @var string
     */
    const KEY = 'KEY';

    /**
     * @var string
     */
    const INDEX = 'KEY';

    /**
     * @var string
     */
    const UNIQUE = 'UNIQUE KEY';

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return array
     */
    public function getColumnsName(): array;

}
