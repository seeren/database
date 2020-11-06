<?php

namespace Seeren\Database\Test\Entity\Column;

use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\Column\AbstractColumn;
use Seeren\Database\Entity\Column\ColumnInterface;
use Seeren\Database\Entity\Column\IntegerColumn;

class IntegerColumnTest extends TestCase
{

    /**
     * @return ColumnInterface
     */
    public function getMock(): ColumnInterface
    {
        return new IntegerColumn('price', 'int', 11);
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\IntegerColumn::castValue
     * @covers \Seeren\Database\Entity\Column\IntegerColumn::get
     * @covers \Seeren\Database\Entity\Column\IntegerColumn::set
     */
    public function testSet(): void
    {
        $mock = $this->getMock();
        $mock->set('10.1');
        $this->assertEquals(10, $mock->get());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\IntegerColumn::getParam
     */
    public function testGetParam(): void
    {
        $this->assertEquals(1, $this->getMock()->getParam());
    }

}
