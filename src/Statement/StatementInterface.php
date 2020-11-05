<?php

namespace Seeren\Database\Statement;

use Seeren\Database\Entity\EntityInterface;
use Seeren\Database\Manager\ManagerInterface;

/**
 * Interface to represent a statement
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Statement
 */
interface StatementInterface
{

    /**
     * @param ManagerInterface $manager
     * @param EntityInterface $table
     * @return mixed
     */
    public function execute(ManagerInterface $manager, EntityInterface $table);

}
