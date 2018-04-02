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

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dao\AbstractDao;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\User\UserInterface;
use InvalidArgumentException;

/**
 * Class for provide create db MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 */
class CreateDbMySqlDao extends AbstractDao implements DaoInterface
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
       return "CREATE DATABASE IF NOT EXISTS "
            . $table->{UserInterface::COL_DB} . ";";
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\AbstractDao::execute()
     */
    protected function execute(DalInterface $dal)
    {
        $dal->getLayer()->query($this->queryString);
        $this->row++;
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
        } else if (!$table->{UserInterface::COL_DB}) {
            throw new InvalidArgumentException(
                "Can't query table: no database specified");
        }
        return parent::query($table, $dal);
    }

}
