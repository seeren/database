<?php

namespace Seeren\Database\Statement\MySql;

use Seeren\Database\Manager\ManagerInterface;
use Seeren\Database\Entity\EntityInterface;
use Seeren\Database\Statement\StatementInterface;

/**
 * Class to represent a count statement
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Statement\MySql
 */
class CountMySqlStatement implements StatementInterface
{

    use ClauseTrait;

    public function execute(ManagerInterface $manager, EntityInterface $entity)
    {
        $params = [];
        $sql = 'SELECT COUNT(*)'
            . 'FROM `'
            . $entity->getName()
            . '`'
            . $this->getClause($entity, $params)
            . ";";
        $sth = $manager->getLayer()->prepare($sql);
        foreach ($params as $key => $param) {
            $sth->bindValue($key, $param['value'], $param['param']);
        }
        $sth->execute();
        return (int)$sth->fetchColumn();
    }

}
