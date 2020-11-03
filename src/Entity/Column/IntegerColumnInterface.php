<?php

namespace Seeren\Database\Entity\Column;

/**
 * Interface to represent a entity integer column
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Column
 */
interface IntegerColumnInterface extends ColumnInterface
{

    /**
     * @var string
     */
    const TINYINT = 'TINYINT';

    /**
     * @var string
     */
    const SMALLINT = 'SMALLINT';

    /**
     * @var string
     */
    const MEDIUMINT = 'MEDIUMINT';

    /**
     * @var string
     */
    const INT = 'INT';

    /**
     * @var string
     */
    const BIGINT = 'BIGINT';

}
