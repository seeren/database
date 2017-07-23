<?php

/**
 * This file contain Seeren\Database\Dao\MySql\SelectMySqlDao class
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
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;

/**
 * Class for provide select MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 */
class SelectMySqlDao extends AbstractMySqlDao implements MySqlDaoInterface
{

    /**
     * Construct SelectMySqlDao
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
        $mySql = "";
        foreach ($table->get($table::ATTR_COLUMN) as $key => $value) {
            if (null !== $value->getValue()) {
                $mySql .= "`" . $key . "`, ";
            }
        }
        return "SELECT " . ($mySql ? substr($mySql, 0, -2) : "*")
             . " FROM `" . $table::NAME. "`"
             . (($clause = $this->getClause($table)) ? " " . $clause : "")
             . ";";
    }

    /**
     * Template method Execute operation
     *
     * @param DalInterface $dal access layer
     * @param TableInterface $table table
     * @return DaoInterface self
     */
    protected function execute(DalInterface $dal, TableInterface $table = null)
    {
        if (!$this->sth || $this->queryString !== $this->sth->queryString) {
            $this->sth = $dal->getLayer()->prepare($this->queryString);
            $this->sth->setFetchMode(\PDO::FETCH_OBJ);
            $this->bindParam($this->sth);
        }
        $this->sth->execute();
        $this->result = $this->sth->fetchAll();
        $this->row = count($this->result);
        if (1 === $this->row) {
            foreach ($this->result[0] as $key => $value) {
                $table->{$key} = $value;
            }
        }
    }

}
