<?php

namespace Seeren\Database\Statement\MySql;

use PDO;
use Seeren\Database\Entity\Column\RelationColumnInterface;
use Seeren\Database\Manager\ManagerInterface;
use Seeren\Database\Entity\EntityInterface;
use Seeren\Database\Statement\StatementInterface;
use stdClass;

/**
 * Class to represent a select statement
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Statement\MySql
 */
class SelectMySqlStatement implements StatementInterface
{

    use ClauseTrait;

    /**
     * @var array
     */
    private array $fetched = [];

    /**
     * @param ManagerInterface $manager
     * @param EntityInterface $entity
     * @return array|EntityInterface|null
     */
    public function execute(ManagerInterface $manager, EntityInterface $entity)
    {
        $params = [];
        $this->buildColumnsClause($entity);
        $sql = 'SELECT * FROM `'
            . $entity->getName()
            . '`'
            . $this->getClause($entity, $params)
            . ";";
        $entity->clearClauses();
        $sth = $manager->getLayer()->prepare($sql);
        foreach ($params as $key => $param) {
            $sth->bindValue($key, $param['value'], $param['param']);
        }
        $sth->execute();
        $fetchAll = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = count($fetchAll);
        if (1 === $row) {
            $this->buildEntity($manager, $entity, $fetchAll[0]);
            $this->fetched = [];
            return $entity;
        }
        $entities = [];
        foreach ($fetchAll as $fetch) {
            $className = get_class($entity);
            $entity = new $className($manager);
            $entities[] = $this->buildEntity($manager, $entity, $fetch);
        }
        $this->fetched = [];
        return $entities ? $entities : null;
    }

    /**
     * @param ManagerInterface $manager
     * @param EntityInterface $entity
     * @param stdClass $fetch
     * @return EntityInterface
     */
    public function buildEntity(
        ManagerInterface $manager,
        EntityInterface $entity,
        stdClass $fetch): EntityInterface
    {
        $columns = $entity->getColumns();
        foreach ($fetch as $key => $value) {
            if ($columns[$key] instanceof RelationColumnInterface) {
                $className = $columns[$key]->getClassName();
                $fetchedKey = $className . '_' . $value;
                if (array_key_exists($fetchedKey, $this->fetched)) {
                    $columns[$key]->set($this->fetched[$fetchedKey]);
                    continue;
                }
                $columns[$key]->set(new $className($manager));
                $columns[$key]->get()->id = $value;
                $this->execute($manager, $columns[$key]->get());
                $this->fetched[$fetchedKey] = $columns[$key]->get();
                continue;
            }
            $entity->{$key} = $value;
        }
        return $entity;
    }

}
