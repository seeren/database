<?php

namespace Seeren\Database\Manager;

use Seeren\Database\Statement\MySql\CountMySqlDao;
use Seeren\Database\Statement\MySql\CreateMySqlDao;
use Seeren\Database\Statement\MySql\DeleteMySqlDao;
use Seeren\Database\Statement\MySql\DropMySqlDao;
use Seeren\Database\Statement\MySql\InsertMySqlDao;
use Seeren\Database\Statement\MySql\SelectMySqlDao;
use Seeren\Database\Statement\MySql\UpdateMySqlDao;

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
            self::COUNT => CountMySqlDao::class,
            self::CREATE => CreateMySqlDao::class,
            self::DELETE => DeleteMySqlDao::class,
            self::DROP => DropMySqlDao::class,
            self::INSERT => InsertMySqlDao::class,
            self::SELECT => SelectMySqlDao::class,
            self::UPDATE => UpdateMySqlDao::class,
        ]);
    }

}
