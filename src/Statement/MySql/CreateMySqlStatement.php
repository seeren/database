<?php

namespace Seeren\Database\Statement\MySql;

use Seeren\Database\Entity\Column\ColumnInterface;
use Seeren\Database\Entity\Column\RelationColumnInterface;
use Seeren\Database\Manager\ManagerInterface;
use Seeren\Database\Entity\EntityInterface;
use Seeren\Database\Statement\StatementInterface;

/**
 * Class to represent a create statement
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Statement
 */
class CreateMySqlStatement implements StatementInterface
{

    /**
     * {@inheritDoc}
     * @see StatementInterface::execute()
     */
    public function execute(ManagerInterface $manager, EntityInterface $entity)
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'
            . $entity->getName()
            . '` ('
            . "\n";
        foreach ($entity->getColumns() as $column) {
            $sql .= $this->getColumnList($column) . ",\n";
        }
        $sql = substr($sql, 0, -2)
            . "\n"
            . ') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;'
            . "\n"
            . $this->getAlteration($entity)
            . $this->getConstraint($manager, $entity);
        $sql = substr($sql, 0, -2) . ';';
        echo($sql);
        $manager->getLayer()->query($sql);
        return $entity;
    }

    /**
     * @param ColumnInterface $column
     * @return string
     */
    private function getColumnList(ColumnInterface $column): string
    {
        $sql = '`'
            . $column->getName()
            . '` '
            . $column->getType()
            . '(' .
            $column->getSize()
            . ')';
        foreach ($column->getOptions() as $option) {
            $sql .= ' ' . $option;
        }
        return $sql;
    }

    /**
     * @param EntityInterface $entity
     * @return string
     */
    private function getAlteration(EntityInterface $entity): string
    {
        $sql = 'ALTER TABLE `'
            . $entity->getName()
            . '`'
            . "\n";
        foreach ($entity->getKeys() as $key) {
            $sql .= 'ADD '
                . $key->getType()
                . ' `'
                . $entity->getName()
                . '_'
                . implode('_', explode(' ', strtolower($key->getType())))
                . '_'
                . implode('_', $key->getColumnsName())
                . '`'
                . ' (`'
                . implode('`, `', $key->getColumnsName()) . '`),'
                . "\n";
            if ($key::PRIMARY === $key->getType()) {
                foreach ($key->getColumnsName() as $columnName) {
                    $sql .= 'MODIFY '
                        . $this->getColumnList($entity->getColumns()[$columnName])
                        . ' AUTO_INCREMENT,'
                        . "\n";
                }
            }
        }
        return $sql;
    }

    /**
     * @param ManagerInterface $manager
     * @param EntityInterface $entity
     * @return string
     */
    private function getConstraint(ManagerInterface $manager, EntityInterface $entity): string
    {
        $sql = '';
        foreach ($entity->getColumns() as $column) {
            if (!$column instanceof RelationColumnInterface) {
                continue;
            } elseif (!$column->get()) {
                $className = $column->getClassName();
                $column->set(new $className($manager));
            }
            $this->execute($manager, $column->get());
            $sql .= 'ADD CONSTRAINT'
                . ' `'
                . $entity->getName()
                . '_foreign_key_'
                . $column->getName()
                . '` '
                . 'FOREIGN KEY'
                . ' (`'
                . $column->getName()
                . '`) '
                . 'REFERENCES `'
                . $column->get()->getName()
                . '`(`id`),'
                . "\n";
        }
        return $sql;
    }

}
