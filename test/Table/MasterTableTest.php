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
 * @version 1.0.1
 */

namespace Seeren\Database\Test\Table;

use Seeren\Database\Table\TableInterface;

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
