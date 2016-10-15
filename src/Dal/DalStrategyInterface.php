<?php

/**
 * This file contain Seeren\Database\Dal\DalStrategyInterface interface
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Database\Dal;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;

/**
 * Interface for provide layer strategy
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dal
 */
interface DalStrategyInterface
{

    /**
     * Query table for dal
     *
     * @param TableInterface $table table
     * @param DalInterface $dal access layer
     * @return DaoInterface self
     */
    public function query(
            TableInterface $table,
            DalInterface $dal): DaoInterface;

}
