<?php

/**
 * This file contain InsertMySqlDao class
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
 * Class for provide insert MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 * @author Cyril
 * @copyright 2016
 * @version 1.0.1
 * @final
 */
final class InsertMySqlDao extends AbstractMySqlDao implements MySqlDaoInterface
{

    private
        /**
         * @var PDOStatement statement in process
         */
        $sth;

    /**
     * Construct InsertMySqlDao
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
        if (!$this->sth || $this->queryString !== $this->sth->queryString) {
            $this->sth = $dal->getLayer()->prepare($this->queryString);
            $this->bindParam($this->sth);
        }
        $this->sth->execute();
        $this->row = $this->row + $this->sth->rowCount();
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
        $insertColumn = "";
        $insertBind = "";
        foreach ($table->get(TableInterface::ATTR_COLUMN) as $key => &$value) {
            if (null !== $value->getValue()) {
                $bind = ":" . $key;
                $insertColumn .= "`" . $key . "`, ";
                $insertBind .= $bind . ", ";
                $this->setParam($bind, $value->getValue(), $value->getParam());
            }
        }
        return "INSERT INTO " . "`" . $table::NAME . "`"
             . "(" . substr($insertColumn, 0, -2) . ") "
             . "VALUES " . "(" . substr($insertBind, 0, -2) . ")";
    }

}
