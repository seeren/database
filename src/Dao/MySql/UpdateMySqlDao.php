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
use InvalidArgumentException;
use Seeren\Database\Table\Column\ColumnInterface;

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
            if (null !== $value->getValue()
             || in_array(
                     ColumnInterface::OPT_DEFAULT_NULL,
                     $value->getOption()
                 )) {
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

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dao\AbstractDao::query()
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
