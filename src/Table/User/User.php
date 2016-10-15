<?php

/**
 * This file contain Seeren\Database\Table\User\User class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Database\Table\User;

use Seeren\Database\Table\AbstractTable;
use Seeren\Database\Table\Column\StringColumn;
use Seeren\Database\Table\Key\Key;

/**
 * Class for represent a database user
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table/User
 */
class User extends AbstractTable implements UserInterface
{

    const
        /**
         * @var string table name
         */
        NAME = "user";

    /**
     * Construct UserTable
     * 
     * @return null
     */
    public function __construct()
    {
        parent::__construct();
        $this->addColumn(
            new StringColumn(self::COL_HOST, StringColumn::CHAR, 60, [
                StringColumn::OPT_NOT_NULL,
                StringColumn::OPT_DEFAULT_STRING])
        );
        $this->addColumn(
            new StringColumn(self::COL_USER, StringColumn::CHAR, 80, [
                StringColumn::OPT_NOT_NULL,
                StringColumn::OPT_DEFAULT_STRING])
        );
        $this->addColumn(
            new StringColumn(self::COL_PSWD, StringColumn::CHAR, 41, [
                StringColumn::OPT_NOT_NULL,
                StringColumn::OPT_DEFAULT_STRING])
        );
        $this->addColumn(
            new StringColumn(self::COL_DB, StringColumn::CHAR, 32, [
                StringColumn::OPT_DEFAULT_NULL])
        );
        $this->addKey(
            new Key(Key::PRIMARY, [self::COL_HOST, self::COL_USER])
        );
        $this->addKey(
            new Key(Key::INDEX, [self::COL_PSWD])
        );
    }

}
