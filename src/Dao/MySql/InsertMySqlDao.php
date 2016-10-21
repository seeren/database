<?php

/**
 * This file contain Seeren\Database\Dao\MySql\InsertMySqlDao class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
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
 */
class InsertMySqlDao extends AbstractMySqlDao implements MySqlDaoInterface
{

    /**
     * Construct InsertMySqlDao
     *
     * @return null
     */
    public function __construct()
    {
        parent::__construct();
        unset($this->result);
    }

    /**
     * Template method Get MSql syntaxe
     *
     * @param TableInterface $table table
     * @return string Myql operation for table
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
             . "VALUES " . "(" . substr($insertBind, 0, -2) . ")";
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
        $this->row++;
    }

}
