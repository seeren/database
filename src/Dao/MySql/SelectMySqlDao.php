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
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\AbstractDao::execute()
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
