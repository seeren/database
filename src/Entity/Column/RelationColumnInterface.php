<?php

namespace Seeren\Database\Entity\Column;

/**
 * Interface to represent a entity relation column
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Column
 */
interface RelationColumnInterface extends ColumnInterface
{

    /**
     * @return string
     */
    public function getClassName():string;

}
