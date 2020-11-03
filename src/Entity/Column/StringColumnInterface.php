<?php

namespace Seeren\Database\Entity\Column;

/**
 * Interface to represent a entity string column
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Column
 */
interface StringColumnInterface extends ColumnInterface
{

    /**
     * @var string
     */
    const TINYTEXT = 'TINYTEXT';

    /**
     * @var string
     */
    const TEXT = 'TEXT';

    /**
     * @var string
     */
    const  MEDIUMTEXT = 'MEDIUMTEXT';

    /**
     * @var string
     */
    const LONGTEXT = 'LONGTEXT';

    /**
     * @var string
     */
    const CHAR = 'CHAR';

    /**
     * @var string
     */
    const VARCHAR = 'VARCHAR';

}
