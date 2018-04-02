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
         * @var array
         */
        $result,

        /**
         * @var PDOStatement
        */
        $sth;

    private
        /**
         * @var array
         */
        $param;

    /**
     * @constructor
     */
    protected function __construct()
    {
        parent::__construct();
        $this->param = [];
        $this->result = [];
    }

    /**
     * @param string $key
     * @param mixed $value
     * @param int $type
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
     * @param PDOStatement $sth
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
           if ($clause->getOperator()) {
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
