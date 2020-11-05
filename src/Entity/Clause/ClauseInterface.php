<?php

namespace Seeren\Database\Entity\Clause;

/**
 * Interface to represent a entity clause
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Clause
 */
interface ClauseInterface
{

    /**
     * @var string
     */
    const AND = 'AND';

    /**
     * @var string
     */
    const JOIN = 'JOIN';

    /**
     * @var string
     */
    const LIMIT = 'LIMIT';

    /**
     * @var string
     */
    const OR = 'OR';

    /**
     * @var string
     */
    const ORDER_BY = 'ORDER BY';

    /**
     * @var string
     */
    const WHERE = 'WHERE';

    /**
     * @var string
     */
    const OP_IS_NULL = 'IS NULL';

    /**
     * @var string
     */
    const OP_IS_NOT_NULL = 'IS NOT NULL';

    /**
     * @var string
     */
    const OP_EQUAL = '=';

    /**
     * @var string
     */
    const OP_UNEQUAL = '!=';

    /**
     * @var string
     */
    const OP_SUP = '>';

    /**
     * @var string
     */
    const OP_SUP_EQUAL = '>=';

    /**
     * @var string
     */
    const OP_INF = '<';

    /**
     * @var string
     */
    const OP_INF_EQUAL = '<=';

    /**
     * @var string
     */
    const OP_ASC = 'ASC';

    /**
     * @var string
     */
    const OP_DESC = 'DESC';

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return string
     */
    public function getColumnName(): string;

    /**
     * @return string
     */
    public function getOperator(): string;

    /**
     * @return string|int
     */
    public function getValue();

}
