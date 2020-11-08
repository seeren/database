<?php

namespace Seeren\Database\Statement\MySql;

use Seeren\Database\Entity\Column\RelationColumnInterface;
use Seeren\Database\Statement\StatementInterface;
use Seeren\Database\Manager\ManagerInterface;
use Seeren\Database\Entity\EntityInterface;

/**
 * Class to represent a insert statement
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Statement\MySql
 */
class InsertMySqlStatement implements StatementInterface
{

    /**
     * @param ManagerInterface $manager
     * @param EntityInterface $entity
     * @return EntityInterface
     */
    public function execute(ManagerInterface $manager, EntityInterface $entity)
    {
        if ($entity->id) {
            return $entity;
        }
        $params = [];
        $columnList = '';
        $valueList = '';
        foreach ($entity->getColumns() as $key => $column) {
            if ($column instanceof RelationColumnInterface) {
                $className = $column->getClassName();
                $column->set($this->execute($manager, $column->get() ?? new $className($manager)));
            }
            if (null !== $column->get()) {
                $id = ':'
                    . $entity->getName()
                    . '_'
                    . $key;
                $columnList .= '`'
                    . $key
                    . '`, ';
                $valueList .= $id . ', ';
                $params[$id] = [
                    'value' => is_scalar($column->get()) ? $column->get() : $column->get()->id,
                    'param' => $column->getParam()
                ];
            }
        }
        $sql = 'INSERT INTO  `'
            . $entity->getName()
            . '` ('
            . substr($columnList, 0, -2)
            . ')  VALUES ('
            . substr($valueList, 0, -2)
            . ');';
        $sth = $manager->getLayer()->prepare($sql);
        foreach ($params as $key => $param) {
            $sth->bindValue($key, $param['value'], $param['param']);
        }
        $sth->execute();
        $entity->id = $manager->getLayer()->lastInsertId();
        return $entity;
    }

}
