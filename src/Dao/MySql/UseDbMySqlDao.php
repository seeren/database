<?php

/**
 * This file contain Seeren\Database\Dao\MySql\UseDbMySqlDao class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */

namespace Seeren\Database\Dao\MySql;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dao\AbstractDao;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\User\UserInterface;
use InvalidArgumentException;

/**
 * Class for provide use db MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 */
class UseDbMySqlDao extends AbstractDao implements MySqlDaoInterface
{

    /**
     * Construct UseDbMySqlDao
     *
     * @return null
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Template method Get MSql syntaxe
     *
     * @param TableInterface $table table
     * @return string Myql operation for table
     */
    protected function getSyntax(TableInterface $table): string
    {
        return "use " . $table->{UserInterface::COL_DB} . ";";
    }

    /**
     * Template method Execute operation
     *
     * @param DalInterface $dal access layer
     * @return null
     */
    protected function execute(DalInterface $dal)
    {
        $dal->getLayer()->query($this->queryString);
        $this->row++;
    }

    /**
     * Query table for dal
     *
     * @param TableInterface $table table
     * @param DalInterface $dal access layer
     * @return DaoInterface self
     * 
     * @throws InvalidArgumentException
     */
    public function query(
        TableInterface $table,
        DalInterface $dal): DaoInterface
    {
        if (!$table instanceof UserInterface) {
            throw new InvalidArgumentException(
                "Can't query table: must implement UserInterface");
        } else if (!$table->{UserInterface::COL_DB}) {
            throw new InvalidArgumentException(
                "Can't query table: no database specified");
        }
        return parent::query($table, $dal);
    }

}
