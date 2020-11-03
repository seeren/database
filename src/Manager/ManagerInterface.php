<?php

namespace Seeren\Database\Manager;

use InvalidArgumentException;
use PDO;
use PDOException;
use Seeren\Database\Statement\StatementInterface;
use Seeren\Database\Table\TableInterface;

/**
 * Interface to represent a manager
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Manager
 */
interface ManagerInterface
{

    /**
     * @var string
     */
    const COUNT = 'count';

    /**
     * @var string
     */
    const CREATE = 'create';

    /**
     * @var string
     */
    const DELETE = 'delete';

    /**
     * @var string
     */
    const DROP = 'drop';

    /**
     * @var string
     */
    const INSERT = 'insert';

    /**
     * @var string
     */
    const SELECT = 'select';

    /**
     * @var string
     */
    const UPDATE = 'update';

    /**
     * @return PDO
     */
    public function getLayer(): PDO;

    /**
     * @param string $operation
     * @return StatementInterface
     * @throws InvalidArgumentException
     */
    public function prepare(string $operation): StatementInterface;

    /**
     * @param string $operation
     * @param TableInterface $table
     * @throws InvalidArgumentException
     * @throws PDOException
     */
    public function execute(string $operation, TableInterface $table): void;

}
