<?php

namespace Seeren\Database\Manager;

use InvalidArgumentException;
use PDO;
use Seeren\Database\Statement\StatementInterface;
use Seeren\Database\Entity\TableInterface;

/**
 * Class to represent a manager
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Manager
 */
class Manager implements ManagerInterface
{

    /**
     * @var PDO
     */
    private PDO $layer;

    /**
     * @var array
     */
    private array $statements = [];

    /**
     * @param string $dsn
     * @param string $user
     * @param string $password
     * @param array $statements
     */
    public function __construct(
        string $dsn,
        string $user,
        string $password,
        array $statements = [])
    {
        $this->layer = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        foreach ($statements as $key => $value) {
            if (defined("self::" . strtoupper($key)) && is_string($value)) {
                $this->statements[$key] = $value;
            }
        }
    }

    /**
     * {@inheritDoc}
     * @see ManagerInterface::getLayer()
     */
    public final function getLayer(): PDO
    {
        return $this->layer;
    }

    /**
     * {@inheritDoc}
     * @see ManagerInterface::prepare()
     */
    public final function prepare(string $operation): StatementInterface
    {
        if (!array_key_exists($operation, $this->statements)) {
            throw new InvalidArgumentException('Operation "' . $operation . '" unreachable');
        } else if (is_object($this->statements[$operation])) {
            return clone $this->statements[$operation];
        }
        $this->statements[$operation] = new $this->statements[$operation];
        return $this->prepare($operation);
    }

    /**
     * {@inheritDoc}
     * @see ManagerInterface::execute()
     */
    public final function execute(string $operation, TableInterface $table): void
    {
        $table->set($this->prepare($operation)->query($table, $this));
    }

}
