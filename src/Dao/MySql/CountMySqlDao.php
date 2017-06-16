<?php

/**
 * This file contain Seeren\Database\Dao\MySql\CountMySqlDao class
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
 * Class for provide count MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 */
class CountMySqlDao extends AbstractMySqlDao implements MySqlDaoInterface
{

    /**
     * Construct CountMySqlDao
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
        return "SELECT COUNT(*)"
             . "FROM `" . $table->get($table::ATTR_NAME). "`"
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
        $this->row = (int) current($this->sth->fetch());
    }

}
