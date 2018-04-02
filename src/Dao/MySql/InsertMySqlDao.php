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
 * @version 1.0.4
 */

namespace Seeren\Database\Dao\MySql;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;

/**
 * Class for provide insert MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 */
class InsertMySqlDao extends AbstractMySqlDao implements MySqlDaoInterface
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
        $insertColumn = "";
        $insertBind = "";
        foreach ($table->get(TableInterface::ATTR_COLUMN) as $key => $value) {
            if (null !== $value->getValue()) {
                $id = ":" . $key;
                $insertColumn .= "`" . $key . "`, ";
                $insertBind .= $id . ", ";
                $this->setParam($id, $value->getValue(), $value->getParam());
            }
        }
        return "INSERT INTO "
             . "`" . $table->get(TableInterface::ATTR_NAME) . "`"
             . "(" . substr($insertColumn, 0, -2) . ") "
             . "VALUES " . "(" . substr($insertBind, 0, -2) . ")"
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
        $this->row = $this->sth->rowCount();
    }

}
