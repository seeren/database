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
 * @version 1.0.2
 */

namespace Seeren\Database\Dao\MySql;

use Seeren\Database\Dao\AbstractDao;
use Seeren\Database\Dal\DalInterface;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\Key\KeyInterface;
use Seeren\Database\Table\Column\ColumnInterface;

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
    private final function constraint(TableInterface $table): string
    {
        $mySql = $selfKey = $foreignKey = "";
        $name = $table->get($table::ATTR_NAME);
        foreach ($table->get($table::ATTR_KEY) as $key => $value) {
            if (KeyInterface::FOREIGN !== $value->getType()) {
                $selfKey .= $this->addKey($value, $name . "_" . $key);
                if (KeyInterface::PRIMARY === $value->getType()) {
                    foreach ($value->getSubject() as $key) {
                        $selfKey .= $this->addAutoIncrement(
                            $key,
                            $table->get($table::ATTR_COLUMN));
                    }
                }
                continue;
            }
            $foreignKey .= $this->addForeign($value, $name . "_" . $key);
        }
        foreach ([$selfKey, $foreignKey] as $value) {
            $mySql .= $value ? "ALTER TABLE `" . $name . "`\n"
                             . substr($value, 0, -2) . ";\n"
                             : $value;
        }
        return substr($mySql, 0, -1);
    }

    /**
     * Add auto increment
     * 
     * @param string $key
     * @param array $column
     * @return string modify auto increment syntax
     */
    private final function addAutoIncrement(string $key, array $column): string
    {
        $autoIncrement = "";
        if (array_key_exists($key, $column) && in_array(
                ColumnInterface::OPT_AUTO_INCREMENT,
                $column[$key]->getOption())) {
            $autoIncrement .= "MODIFY "
                 . substr($this->getColumnSyntaxe($column[$key]), 0, -2)
                 . " AUTO_INCREMENT;\n";
        }
        return $autoIncrement;
    }

    /**
     * Get add key syntaxe
     *
     * @param KeyInterface $key key
     * @param string $name name
     * @return string add key syntaxe
     */
    private final function addKey(KeyInterface $key, string $name): string
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
    private final function addForeign(KeyInterface $key, string $name): string
    {
        return "ADD CONSTRAINT" . " `fk_" . $name . "`"
             . " " . $this->constant($key->getType())
             . " (`" . implode("`, `", ($key->getSubject())) . "`) "
             . " REFERENCES `" . $key->getForeigner() . "`"
             . " (`" . implode("`, `", ($key->getForeignerSubject())) . "`),\n";
    }

    /**
     * Get column syntax
     * 
     * @param ColumnInterface $column
     * @return string column syntax line
     */
    private final function getColumnSyntaxe(ColumnInterface $column)
    {
        $mySql = "`" . $column->getName() . "` "
               . $this->constant($column->getType())
               . "(" . $column->getSize() . ")";
        foreach ($column->getOption() as $option) {
            $const = $this->constant($option);
            $mySql .= $const ? " " . $const : "";
        }
        return $mySql . ",\n";
    }

    /**
     * Template method Get MSql syntaxe
     *
     * @param TableInterface $table table
     * @return string Myql operation for table
     */
    protected function getSyntax(TableInterface $table): string
    {
        $mySql = "CREATE TABLE IF NOT EXISTS `" . $table->get($table::ATTR_NAME)
               . "` (\n";
        foreach ($table->get($table::ATTR_COLUMN) as $value) {
            $mySql .= $this->getColumnSyntaxe($value);
        }
        return substr($mySql, 0, -2) . "\n)" . " ENGINE=innoDB CHARSET=utf8;\n"
             . $this->constraint($table);
    }

    /**
     * Template method Execute operation
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
