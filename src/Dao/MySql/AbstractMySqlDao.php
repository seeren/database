<?php

/**
 * This file contain Seeren\Database\Dao\MySql\AbstractMySqlDao class
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

use PDO;
use PDOStatement;
use Seeren\Database\Dao\AbstractDao;
use Seeren\Database\Table\TableInterface;

/**
 * Class for provide peristent data access object
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dao\MySql
 * @abstract
 */
abstract class AbstractMySqlDao extends AbstractDao
{

    protected
        /**
         * @var array fetch result
         */
        $result,
        /**
         * @var PDOStatement statement in process
        */
        $sth;

    private
        /**
         * @var array param collection
         */
        $param;

    /**
     * Construct AbstractMySqlDao
     *
     * @return null
     */
    protected function __construct()
    {
        parent::__construct();
        $this->param = [];
        $this->result = [];
    }

    /**
     * Set queryString param
     *
     * @param string $key param key
     * @param mixed $value param value
     * @param int $type param type
     * @return null
     */
    protected final function setParam(string $key, $value, int $type)
    {
        if (!array_key_exists($key, $this->param)) {
            $this->param[$key] = [];
        }
        $this->param[$key][0] = $value;
        $this->param[$key][1] = $type;
    }

    /**
     * Bind queryString param
     *
     * @param PDOStatement $sth operation statement
     * @return null
     */
    protected final function bindParam(PDOStatement $sth)
    {
        foreach ($this->param as $key => &$value) {
            $sth->bindParam($key, $value[0], $value[1]);
        }
    }

    /**
     * Get clause to MySql syntaxe
     *
     * @param TableInterface $table table
     * @return string clause to MySql syntaxe
     */
    protected final function getClause(TableInterface $table): string
    {
       $mySql = "";
       $column = $table->get($table::ATTR_COLUMN);
       foreach ($table->get($table::ATTR_CLAUSE) as $key => $clause) {
           $mySql .= rtrim(" " . $this->constant($clause->getType()) . " "
                   . $clause->getSubject() . " "
                   . $this->constant($clause->getOperator()));
           if ($clause->getValue()) {
               $type = isset($column[$clause->getSubject()])
                     ? $column[$clause->getSubject()]->getParam()
                     : (is_int($clause->getValue())
                     ? PDO::PARAM_INT
                     : (is_string($clause->getValue())
                     ? PDO::PARAM_STR
                     : PDO::PARAM_NULL));
               $id = ":c" . $key . "_" . ($clause->getSubject()
                     ? str_replace(".", "_", $clause->getSubject())
                     : "");
               $this->setParam($id, $clause->getValue(), $type);
               $mySql .= " " . $id;
           }
       }
       return ltrim($mySql);
    }

    /**
     * Close
     *
     * @return null
     */
    public function close()
    {
        parent::close();
        $this->param = [];
        unset($this->sth);
    }

}
