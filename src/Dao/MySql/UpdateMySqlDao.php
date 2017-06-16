<?php

/**
 * This file contain Seeren\Database\Dao\MySql\UpdateMySqlDao class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.4
 */

namespace Seeren\Database\Dao\MySql;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;
use InvalidArgumentException;

/**
 * Class for provide update MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 */
class UpdateMySqlDao extends AbstractMySqlDao implements MySqlDaoInterface
{

    /**
     * Construct UpdateMySqlDao
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
            if ($value->getValue()) {
                $id = ":" . $key;
                $mySql .= "`" . $key . "`=" . $id . ", ";
                $this->setParam($id, $value->getValue(), $value->getParam());
            }
        }
        return "UPDATE `". $table::NAME. "` " . "SET " . substr($mySql, 0, -2)
             . (($clause = $this->getClause($table)) ? " " . $clause : "")
             . ";";
    }

    /**
     * Template method Execute operation
     *
     * @param TableInterface $table table
     * @param DalInterface $dal access layer
     * @return DaoInterface self
     */
    protected function execute(TableInterface $table, DalInterface $dal)
    {
        if (!$this->sth || $this->queryString !== $this->sth->queryString) {
            $this->sth = $dal->getLayer()->prepare($this->queryString);
            $this->bindParam($this->sth);
        }
        $this->sth->execute();
        $this->row = $this->sth->rowCount();
    }

    /**
     * Query table for dal
     *
     * @param TableInterface $table table
     * @param DalInterface $dal access layer
     * @return DaoInterface self
     * 
     * @throws InvalidArgumentException if no clause
     */
    public function query(
        TableInterface $table,
        DalInterface $dal): DaoInterface
    {
        if ([] === $table->get($table::ATTR_CLAUSE)) {
            throw new InvalidArgumentException(
                "Can't query table: must provide clause");
        }
        return parent::query($table, $dal);
    }

}
