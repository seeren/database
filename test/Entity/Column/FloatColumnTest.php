<?php

namespace Seeren\Database\Test\Entity\Column;

use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\Column\AbstractColumn;
use Seeren\Database\Entity\Column\ColumnInterface;
use Seeren\Database\Entity\Column\FloatColumn;

class FloatColumnTest extends TestCase
{

    /**
     * @return ColumnInterface
     */
    public function getMock(): ColumnInterface
    {
        return new FloatColumn('price', 'float', 11);
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\FloatColumn::castValue
     * @covers \Seeren\Database\Entity\Column\FloatColumn::get
     * @covers \Seeren\Database\Entity\Column\FloatColumn::set
     */
    public function testSet(): void
    {
        $mock = $this->getMock();
        $mock->set('10.1');
        $this->assertEquals(10.1, $mock->get());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\FloatColumn::getParam
     */
    public function testGetParam(): void
    {
        $this->assertEquals(2, $this->getMock()->getParam());
    }

}
