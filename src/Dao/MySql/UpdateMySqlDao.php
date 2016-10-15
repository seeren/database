<?php

/**
 * This file contain UpdateMySqlDao class
 *
 * @package Database
 */

namespace Seeren\Database\Dao\MySql;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dao\MySql\AbstractMySqlDao;
use Seeren\Database\Dao\MySql\MySqlDaoInterface;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;
use RuntimeException;

/**
 * Class for provide update MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 * @author Cyril
 * @copyright 2016
 * @version 1.0.1
 * @final
 */
final class UpdateMySqlDao extends AbstractMySqlDao implements MySqlDaoInterface
{

    private
        /**
         * @var PDOStatement statement in process
         */
        $sth;

    /**
     * Construct UpdateMySqlDao
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
     * 
     * @throws RuntimeException if no clause
     */
    final public function query(
        TableInterface $table,
        DalInterface $dal): DaoInterface
    {
        if ([] !== $table->get($table::ATTR_CLAUSE)) {
            return parent::query($table, $dal)->execute($table, $dal);
        }
        throw new RuntimeException("Can't query table: must provide clause");
    }

    /**
     * Get MySql syntaxe
     *
     * @param TableInterface $table table
     * @return string MySql operation for table
     */
    final public function mySql(TableInterface $table): string
    {
        $mySql = "";
        foreach ($table->get($table::ATTR_COLUMN) as $key => &$value) {
            if (null !== $value->getValue()) {
                $bind = ":" . $key;
                $mySql .= "`" . $key . "`=" . $bind . ", ";
                $this->setParam($bind, $value->getValue(), $value->getParam());
            }
        }
        return "UPDATE `". $table::NAME. "` " . "SET " . substr($mySql, 0, -2)
             . (($clause = $this->getClause($table)) ? " " . $clause : "")
             . ";";
    }

}
