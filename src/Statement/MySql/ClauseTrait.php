<?php

namespace Seeren\Database\Statement\MySql;

use PDO;
use Seeren\Database\Entity\Clause\Clause;
use Seeren\Database\Entity\EntityInterface;

/**
 * Class to represent a  statement clause trait
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Statement\MySql
 */
trait ClauseTrait
{

    /**
     * @param EntityInterface $entity
     */
    public function buildColumnsClause(EntityInterface $entity): void
    {
        $i = 0;
        foreach ($entity->getColumns() as $column) {
            if ($column->get()) {
                $entity->addClause(new Clause(
                    !$i ? Clause::WHERE : Clause:: AND,
                    $column->getName(),
                    Clause::OP_EQUAL,
                    $column->get()
                ));
                $i++;
            }
        }
    }

    /**
     * @param EntityInterface $entity
     * @param array $params
     * @return string
     */
    private function getClause(EntityInterface $entity, array &$params): string
    {
        $sql = '';
        foreach ($entity->getClauses() as $key => $clause) {
            $sql .= ' '
                . $clause->getType()
                . ' '
                . $clause->getColumnName();
            if ($clause->getOperator()) {
                $columnName = $clause->getColumnName();
                $operator = $clause->getOperator();
                $value = $clause->getValue();
                if ($value instanceof EntityInterface) {
                    $value = $value->id;
                }
                if (null === $value) {
                    $sql .= ' ' . Clause::OP_IS_NULL;
                    continue;
                }
                $param = array_key_exists($columnName, $entity->getColumns())
                    ? $entity->getColumns()[$columnName]->getParam()
                    : (is_int($value) ? PDO::PARAM_INT : (is_string($value) ? PDO::PARAM_STR : PDO::PARAM_NULL));
                $id = ":c_" . $key . "_" . $columnName;
                $params[$id] = ['value' => $value, 'param' => $param];
                $sql .= ' '
                    . $operator
                    . ' '
                    . $id;
            }
        }
        return $sql;
    }

}
