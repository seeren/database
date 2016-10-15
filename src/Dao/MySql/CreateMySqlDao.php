<?php

/**
 * This file contain Seeren\Database\Dao\MySql\CreateMySqlDao class
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

use Seeren\Database\Dao\AbstractDao;
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
 */
class CreateMySqlDao extends AbstractDao implements MySqlDaoInterface
{

    /**
     * Construct OpenMySqlDao
     *
     * @return null
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get constraint syntaxe
     *
     * @param TableInterface $table table
     * @return string constraint syntaxe
     */
    private function constraint(TableInterface $table): string
    {
        $mySql = $sk = $fk = "";
        foreach ($table->get($table::ATTR_KEY) as $key => $value) {
            if (KeyInterface::FOREIGN !== $value->getType()) {
                $sk .= $this->addKey($value, $key);
            } else {
                $fk .= $this->addForeign($value, $key);
            }
        }
        foreach ([$sk, $fk] as $value) {
            $mySql .= "" !== $value
                    ? "ALTER TABLE `" . $table->get($table::ATTR_NAME) . "`\n"
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
    private function addKey(KeyInterface $key, string $name): string
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
    private function addForeign(KeyInterface $key, string $name): string
    {
        return "ADD CONSTRAINT" . " `fk_" . $name . "`"
             . " " . $this->constant($key->getType())
             . " (`" . implode("`, `", ($key->getSubject())) . "`) "
             . " REFERENCES `" . $key->getForeigner() . "`"
             . " (`" . implode("`, `", ($key->getForeignerSubject())) . "`),\n";
    }

    /**
     * Template method Get MSql syntaxe
     *
     * @param TableInterface $table table
     * @return string Myql operation for table
     */
    protected function getSyntax(TableInterface $table): string
    {
        $mySql = "CREATE TABLE IF NOT EXISTS `"
                . $table->get($table::ATTR_NAME) . "` (\n";
        foreach ($table->get($table::ATTR_COLUMN) as $column) {
            $mySql .= "`" . $column->getName() . "` "
                   . $this->constant($column->getType())
                   . "(" . $column->getSize() . ")";
            foreach ($column->getOption() as $option) {
                $mySql .= " " . $this->constant($option);
            }
            $mySql .= ",\n";
        }
        return substr($mySql, 0, -2) . "\n)"
             . " ENGINE=innoDB CHARSET=utf8;\n"
             . $this->constraint($table);
    }

    /**
     * Execute operation
     *
     * @param TableInterface $table table
     * @param DalInterface $dal access layer
     * @return null
     */
    protected function execute(TableInterface $table, DalInterface $dal)
    {
        $dal->getLayer()->query($this->queryString);
        $this->row++;
    }

}
