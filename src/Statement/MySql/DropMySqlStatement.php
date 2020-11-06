<?php

namespace Seeren\Database\Statement\MySql;

use Seeren\Database\Entity\Column\RelationColumnInterface;
use Seeren\Database\Manager\ManagerInterface;
use Seeren\Database\Entity\EntityInterface;
use Seeren\Database\Statement\StatementInterface;

/**
 * Class to represent a drop statement
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Statement\MySql
 */
class DropMySqlStatement implements StatementInterface
{

    /**
     * @param ManagerInterface $manager
     * @param EntityInterface $entity
     * @return mixed|EntityInterface
     */
    public function execute(ManagerInterface $manager, EntityInterface $entity)
    {
        $sql = 'DROP TABLE IF EXISTS '
            . $entity->getName()
            . ';';
        $manager->getLayer()->query($sql);
        foreach ($entity->getColumns() as $key => $column) {
            if ($column instanceof RelationColumnInterface) {
                $className = $column->getClassName();
                $this->execute($manager, $column->get() ?? new $className($manager));
            }
        }
        return $entity;
    }

}
