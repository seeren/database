<?php

/**
 * This file contain DropMySqlDao class
 *
 * @package Database
 */

namespace Seeren\Database\Dao\MySql;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dao\MySql\AbstractMySqlDao;
use Seeren\Database\Dao\MySql\MySqlDaoInterface;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;

/**
 * Class for provide drop MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 * @author Cyril
 * @copyright 2016
 * @version 1.0.1
 * @final
 */
final class DropMySqlDao extends AbstractMySqlDao implements MySqlDaoInterface
{

    /**
     * Construct DropMySqlDao
     *
     * @return null
     */
    final public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute operation
     *
     * @param TableInterface $table table
     * @param DalInterface $dal access layer
     * @return DaoInterface self
     */
    final protected function execute(
        TableInterface $table,
        DalInterface $dal): DaoInterface
    {
        $dal->getLayer()->query($this->queryString);
        $this->row++;
        return $this;
    }

    /**
     * Query table for dal
     *
     * @param TableInterface $table table
     * @param DalInterface $dal access layer
     * @return DaoInterface self
     */
    final public function query(
        TableInterface $table,
        DalInterface $dal): DaoInterface
    {
        return parent::query($table, $dal)->execute($table, $dal);
    }

    /**
     * Get MySql syntaxe
     *
     * @param TableInterface $table table
     * @return string MySql operation for table
     */
    final public function mySql(TableInterface $table): string
    {
        return "DROP TABLE " . $table::NAME . ";";
    }

}
