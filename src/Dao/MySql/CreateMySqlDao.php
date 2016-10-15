<?php

/**
 * This file contain CreateMySqlDao class
 *
 * @package Database
 */

namespace Seeren\Database\Dao\MySql;

use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dao\MySql\AbstractMySqlDao;
use Seeren\Database\Dao\MySql\MySqlDaoInterface;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\Key\KeyInterface;

/**
 * Class for provide create MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 * @author Cyril
 * @copyright 2016
 * @version 1.0.1
 * @final
 */
final class CreateMySqlDao extends AbstractMySqlDao implements MySqlDaoInterface
{

    /**
     * Construct OpenMySqlDao
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
        $dal->getLayer()->query($this->queryString);
        $this->row++;
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
        $mySql = "CREATE TABLE `" . $table::NAME . "` (\n";
        foreach ($table->get($table::ATTR_COLUMN) as &$column) {
            $mySql .= "`" . $column->getName() . "` "
                   . $this->constant($column->getType())
                   . "(" . $column->getSize() . ")";
            foreach ($column->getOption() as &$option) {
                $mySql .= " " . $this->constant($option);
            }
            $mySql .= ",\n";
        }
        return substr($mySql, 0, -2) . "\n)"
             . " ENGINE=" . $this->constant($table->get($table::ATTR_ENGINE))
             . " CHARSET=utf8;\n"
             . $this->constraint($table);
    }

    /**
     * Get constraint syntaxe
     *
     * @param TableInterface $table table
     * @return string constraint syntaxe
     */
    final private function constraint(TableInterface $table): string
    {
        $mySql = $sk = $fk = "";
        foreach ($table->get($table::ATTR_KEY) as $key => &$value) {
            if (KeyInterface::FOREIGN !== $value->getType()) {
                $sk .= $this->addKey($value, $key);
            } else {
                $fk .= $this->addForeign($value, $key);
            }
        }
        foreach ([$sk, $fk] as &$value) {
            $mySql .= "" !== $value
                    ? "ALTER TABLE `" . $table::NAME . "`\n"
                    . substr($value, 0, -2) . ";\n"
                    : "";
        }
        return substr($mySql, 0, -1);
    }

    /**
     * Get add key syntaxe
     *
     * @param KeyInterface $key key
     * @param string $name name
     * @return string add key syntaxe
     */
    final private function addKey(KeyInterface $key, string $name): string
    {
        return "ADD " . $this->constant($key->getType())
             . " `k_" . $name . "`"
             . " (`" . implode("`, `", ($key->getSubject())) . "`),\n";
    }

    /**
     * Get add foreign key syntaxe
     *
     * @param KeyInterface $key key
     * @param string $name name
     * @return string add foreign key syntaxe
     */
    final private function addForeign(KeyInterface $key, string $name): string
    {
        return "ADD CONSTRAINT" . " `fk_" . $name . "`"
             . " " . $this->constant($key->getType())
             . " (`" . implode("`, `", ($key->getSubject())) . "`) "
             . " REFERENCES `" . $key->getForeigner() . "`"
             . " (`" . implode("`, `", ($key->getForeignerSubject())) . "`),\n";
    }

}
