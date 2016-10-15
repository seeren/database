<?php

/**
 * This file contain Seeren\Database\Dao\MySql\DropMySqlDao class
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

/**
 * Class for provide drop MySql operation
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 */
class DropMySqlDao extends AbstractDao implements MySqlDaoInterface
{

    /**
     * Construct DropMySqlDao
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
        return "DROP TABLE IF EXISTS " . $table->get($table::ATTR_NAME) . ";";
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
