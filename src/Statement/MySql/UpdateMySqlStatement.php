<?php

namespace Seeren\Database\Statement\MySql;

use Seeren\Database\Statement\StatementInterface;
use Seeren\Database\Manager\ManagerInterface;
use Seeren\Database\Entity\EntityInterface;

/**
 * Class to represent a update statement
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Statement\MySql
 */
class UpdateMySqlStatement implements StatementInterface
{

    /**
     * @param ManagerInterface $manager
     * @param EntityInterface $entity
     * @return EntityInterface
     */
    public function execute(ManagerInterface $manager, EntityInterface $entity)
    {
        $sql = '';
        $params = [];
        foreach ($entity->getColumns() as $key => $column) {
            $id = ':'
                . $entity->getName()
                . '_'
                . $key;
            $sql .= '`'
                . $key
                . '`='
                . $id
                . ', ';
            $value = $column->get();
            $params[$id] = [
                'value' => $value instanceof EntityInterface ? $column->get()->id : $column->get(),
                'param' => $column->getParam()
            ];
        }
        $sql = 'UPDATE `' . $entity->getName() . '` SET ' . substr($sql, 0, -2) . ';';
        $sth = $manager->getLayer()->prepare($sql);
        foreach ($params as $key => $param) {
            $sth->bindValue($key, $param['value'], $param['param']);
        }
        $sth->execute();
        return $entity;
    }

}
