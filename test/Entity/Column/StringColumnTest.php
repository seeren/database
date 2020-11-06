<?php

namespace Seeren\Database\Test\Entity\Column;

use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\Column\AbstractColumn;
use Seeren\Database\Entity\Column\ColumnInterface;
use Seeren\Database\Entity\Column\StringColumn;

class StringColumnTest extends TestCase
{

    /**
     * @return ColumnInterface
     */
    public function getMock(): ColumnInterface
    {
        return new StringColumn('name', 'char', 64);
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\StringColumn::castValue
     * @covers \Seeren\Database\Entity\Column\StringColumn::get
     * @covers \Seeren\Database\Entity\Column\StringColumn::set
     */
    public function testSet(): void
    {
        $mock = $this->getMock();
        $mock->set(10.1);
        $this->assertEquals('10.1', $mock->get());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\StringColumn::getParam
     */
    public function testGetParam(): void
    {
        $this->assertEquals(2, $this->getMock()->getParam());
    }

}
