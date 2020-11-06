<?php

namespace Seeren\Database\Test\Entity\Clause;

use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\Clause\Clause;
use Seeren\Database\Entity\Clause\ClauseInterface;

class ClauseTest extends TestCase
{

    /**
     * @return ClauseInterface
     */
    public function getMock(): ClauseInterface
    {
        return new Clause(Clause::ORDER_BY, 'id');
    }

    /**
     * @covers       \Seeren\Database\Entity\Clause\Clause::__construct
     * @covers       \Seeren\Database\Entity\Clause\Clause::getType
     */
    public function testGetType(): void
    {
        $this->assertEquals(Clause::ORDER_BY, $this->getMock()->getType());
    }

    /**
     * @covers       \Seeren\Database\Entity\Clause\Clause::__construct
     * @covers       \Seeren\Database\Entity\Clause\Clause::getColumnName
     */
    public function testGetColumnName(): void
    {
        $this->assertEquals('id', $this->getMock()->getColumnName());
    }

    /**
     * @covers       \Seeren\Database\Entity\Clause\Clause::__construct
     * @covers       \Seeren\Database\Entity\Clause\Clause::getOperator
     */
    public function testGetOperator(): void
    {
        $this->assertEquals('', $this->getMock()->getOperator());
    }

    /**
     * @covers       \Seeren\Database\Entity\Clause\Clause::__construct
     * @covers       \Seeren\Database\Entity\Clause\Clause::getValue
     */
    public function testGetValue(): void
    {
        $this->assertNull($this->getMock()->getValue());
    }

}

