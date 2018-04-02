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
 * @version 1.0.3
 */

namespace Seeren\Database\Dao\MySql;

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
        return "SELECT COUNT(*)"
             . "FROM `" . $table->get($table::ATTR_NAME). "`"
             . (($clause = $this->getClause($table)) ? " " . $clause : "")
             . ";";
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\AbstractDao::execute()
     */
    protected function execute(DalInterface $dal)
    {
        if (!$this->sth || $this->queryString !== $this->sth->queryString) {
            $this->sth = $dal->getLayer()->prepare($this->queryString);
            $this->bindParam($this->sth);
        }
        $this->sth->execute();
        $this->row = (int) current($this->sth->fetch());
    }

}
