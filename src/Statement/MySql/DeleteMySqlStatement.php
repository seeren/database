<?php

namespace Seeren\Database\Statement\MySql;

use Seeren\Database\Statement\StatementInterface;
use Seeren\Database\Manager\ManagerInterface;
use Seeren\Database\Entity\EntityInterface;
use InvalidArgumentException;

/**
 * Class to represent a delete statement
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Statement\MySql
 */
class DeleteMySqlStatement implements StatementInterface
{

    use ClauseTrait;

    /**
     * @param ManagerInterface $manager
     * @param EntityInterface $entity
     * @return EntityInterface
     * @throws InvalidArgumentException
     */
    public function execute(ManagerInterface $manager, EntityInterface $entity)
    {
        $this->buildColumnsClause($entity);
        if (!$entity->getClauses()) {
            throw new InvalidArgumentException('At least one column value must be set');
        }
        $params = [];
        $sql = 'DELETE FROM `'
            . $entity->getName()
            . '`'
            . $this->getClause($entity, $params)
            . ';';
        $entity->clearClauses();
        $sth = $manager->getLayer()->prepare($sql);
        foreach ($params as $key => $param) {
            $sth->bindValue($key, $param['value']);
        }
        $sth->execute();
        return $entity;
    }

}
