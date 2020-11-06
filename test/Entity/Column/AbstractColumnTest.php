<?php

namespace Seeren\Database\Test\Entity\Column;

use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\Column\AbstractColumn;
use Seeren\Database\Entity\Column\ColumnInterface;

class AbstractColumnTest extends TestCase
{

    /**
     * @return ColumnInterface
     */
    public function getMock(): ColumnInterface
    {
        return new DummyColumn('id', 'int', 11, ['NOT NULL']);
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     */
    public function testGetName(): void
    {
        $this->assertEquals('id', $this->getMock()->getName());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     */
    public function testGet(): void
    {
        $this->assertEquals(null, $this->getMock()->get());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::set
     */
    public function testSet(): void
    {
        $mock = $this->getMock();
        $mock->set(1);
        $this->assertEquals(1, $mock->get());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::get
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::set
     */
    public function testSetNull(): void
    {
        $mock = $this->getMock();
        $mock->set(null);
        $this->assertEquals(null, $mock->get());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getType
     */
    public function testGetType(): void
    {
        $this->assertEquals('int', $this->getMock()->getType());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getSize
     */
    public function testGetSize(): void
    {
        $this->assertEquals(11, $this->getMock()->getSize());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getOptions
     */
    public function testGetOptions(): void
    {
        $this->assertEquals(['NOT NULL'], $this->getMock()->getOptions());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::set
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::jsonSerialize
     */
    public function testJsonSerialize(): void
    {
        $mock = $this->getMock();
        $mock->set(1);
        $this->assertEquals(1, $mock->jsonSerialize());
    }

}

class DummyColumn extends AbstractColumn
{

    /**
     * @param $value
     * @return int|mixed
     */
    protected function castValue($value)
    {
        return (int)$value;
    }

    /**
     * @return int
     */
    public function getParam(): int
    {
        return 0;
    }

}
