<?php

namespace Seeren\Database\Manager;

use Seeren\Database\Statement\MySql\CountMySqlStatement;
use Seeren\Database\Statement\MySql\CreateMySqlStatement;
use Seeren\Database\Statement\MySql\DeleteMySqlStatement;
use Seeren\Database\Statement\MySql\DropMySqlStatement;
use Seeren\Database\Statement\MySql\InsertMySqlStatement;
use Seeren\Database\Statement\MySql\SelectMySqlStatement;
use Seeren\Database\Statement\MySql\UpdateMySqlStatement;

/**
 * Class to represent a mysql manager
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Manager
 */
class MySqlManager extends Manager
{

    /**
     * @param string $dsn
     * @param string $user
     * @param string $password
     */
    public function __construct(string $dsn, string $user, string $password)
    {
        parent::__construct($dsn, $user, $password, [
            self::COUNT => CountMySqlStatement::class,
            self::CREATE => CreateMySqlStatement::class,
            self::DELETE => DeleteMySqlStatement::class,
            self::DROP => DropMySqlStatement::class,
            self::INSERT => InsertMySqlStatement::class,
            self::SELECT => SelectMySqlStatement::class,
            self::UPDATE => UpdateMySqlStatement::class,
        ]);
    }

}
