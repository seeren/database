<?php

namespace Seeren\Database\Manager;

use PDO;
use Seeren\Database\Statement\StatementInterface;
use Seeren\Database\Entity\EntityInterface;

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
    public function getLayer(): PDO
    {
        return $this->layer;
    }

    /**
     * {@inheritDoc}
     * @see ManagerInterface::prepare()
     */
    public function prepare(string $operation): StatementInterface
    {
        if (is_object($this->statements[$operation])) {
            return clone $this->statements[$operation];
        }
        $this->statements[$operation] = new $this->statements[$operation];
        return $this->prepare($operation);
    }

    /**
     * {@inheritDoc}
     * @see ManagerInterface::execute()
     */
    public function execute(string $operation, EntityInterface $table)
    {
        return $this->prepare($operation)->execute($this, $table);
    }

}
