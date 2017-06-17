<?php

/**
 * This file contain Seeren\Database\Test\Table\MasterTableTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/database
 * @version 2.0.1
 */

namespace Seeren\Database\Test\Table;

use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\Clause\Clause;
use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Dal\Dal;
use Seeren\Database\Dal\DalInterface;

/**
 * Class for test MasterTable
 * 
 * @category Seeren
 * @package Database
 * @subpackage Test\Table
 * @abstract
 */
abstract class MasterTableTest extends AbstractTableTest
{

    /**
     * Get dependencie name
     *
     * @return string dependencie name
     */
    abstract protected function getDependencieName(): string;

    /**
     * Get empty dal
     * 
     * @return DalInterface dal
     */
    private function getEmptyDal(): DalInterface
    {
        return (new \ReflectionClass(Dal::class))->newInstanceArgs([]);
    }

    /**
     * Test __call
     */
    public function test__call()
    {
        parent::test__call();
        $dal = $this->getDal();
        $dal->setLayer($this->getPdo());
        $this->assertTrue(
            $this->getTable()->select($dal) instanceof TableInterface
        );
    }

    /**
     * Test delete
     */
    public function testDelete()
    {
        $dal = $this->getDal();
        $dal->setLayer($this->getPdo());
        $table = $this->getTable();
        $table->addClause(new Clause(clause::LIMIT, 1));
        $table->delete($dal);
        $this->assertTrue($table->get() instanceof DaoInterface);
    }

    /**
     * Test delete RunTimeException
     */
    public function testDeleteRunTimeException()
    {
        $dal = $this->getEmptyDal();
        $dal->setLayer($this->getPdo());
        $this->getTable()->delete($dal);
    }


    /**
     * Test select RuntimeException
     */
    public function testSelectRuntimeException()
    {
        $this->getTable()->select($this->getDal());
    }

    /**
     * Test get dependencie
     */
    public function testGetDependencie()
    {
        $this->assertTrue($this->getTable()->get($this->getDependencieName())
               instanceof TableInterface
        );
    }

    /**
     * Test get dependencie
     */
    public function testGetDependencieColumnValue()
    {
        $table = $this->getTable();
        $column = current($table
            ->get($this->getDependencieName())
            ->get(TableInterface::ATTR_COLUMN));
        $emptyValue = $table->{$column->getName()};
        $table->{$column->getName()} = 1;
        $this->assertTrue($emptyValue !== $table->{$column->getName()});
    }

}
