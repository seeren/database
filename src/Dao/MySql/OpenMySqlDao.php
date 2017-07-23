<?php

/**
 * This file contain Seeren\Database\Dao\MySql\OpenMySqlDao class
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

use PDO;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dao\AbstractDao;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\User\UserInterface;
use InvalidArgumentException;

/**
 * Class for provide open MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 */
class OpenMySqlDao extends AbstractDao implements MySqlDaoInterface
{

    /**
     * Construct OpenMySqlDao
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
        return "mysql:host=" . $table->{UserInterface::COL_HOST} . "; "
             . ($table->{UserInterface::COL_DB}
             ? "dbname=" . $table->{UserInterface::COL_DB} . "; "
             : "")
             . "charset=utf8";
    }

    /**
     * Template method Execute operation
     *
     * @param DalInterface $dal access layer
     * @param TableInterface $table table
     * @return null
     */
    protected function execute(DalInterface $dal, TableInterface $table = null)
    {
        $dal->setLayer(new PDO(
            $this->__toString(),
            $table->{UserInterface::COL_USER},
            $table->{UserInterface::COL_PSWD},
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]));
        $this->row = 1;
    }

    /**
     * Query table for dal
     *
     * @param TableInterface $table table
     * @param DalInterface $dal access layer
     * @return DaoInterface self
     * 
     * @throws InvalidArgumentException for no user interface
     */
    public function query(
        TableInterface $table,
        DalInterface $dal): DaoInterface
    {
        if (!$table instanceof UserInterface) {
            throw new InvalidArgumentException(
                "Can't query table: must implement UserInterface");
        }
        return parent::query($table, $dal);
    }

}
