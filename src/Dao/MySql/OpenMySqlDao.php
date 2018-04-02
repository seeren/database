<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author (c) Cyril Ichti <consultant@seeren.fr>
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
     * @constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\AbstractDao::getSyntax()
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
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\AbstractDao::execute()
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
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\AbstractDao::query()
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
