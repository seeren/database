<?php

namespace Seeren\Database\Test\Entity\Column;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\AbstractEntity;
use Seeren\Database\Entity\Column\AbstractColumn;
use Seeren\Database\Entity\Column\RelationColumn;

class RelationColumnTest extends TestCase
{

    /**
     * @return RelationColumn
     */
    public function getMock(): RelationColumn
    {
        return new RelationColumn('dummy', DummyEntity::class);
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\RelationColumn::__construct
     * @covers \Seeren\Database\Entity\Column\RelationColumn::castValue
     * @covers \Seeren\Database\Entity\Column\RelationColumn::get
     * @covers \Seeren\Database\Entity\Column\RelationColumn::set
     */
    public function testSet(): void
    {
        $dummy = new DummyEntity();
        $mock = $this->getMock();
        $mock->set($dummy);
        $this->assertEquals($dummy, $mock->get());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\RelationColumn::__construct
     * @covers \Seeren\Database\Entity\Column\RelationColumn::castValue
     * @covers \Seeren\Database\Entity\Column\RelationColumn::set
     */
    public function testSetException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->set(false);
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\RelationColumn::__construct
     * @covers \Seeren\Database\Entity\Column\RelationColumn::getParam
     */
    public function testGetParam(): void
    {
        $this->assertEquals(1, $this->getMock()->getParam());
    }

    /**
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\RelationColumn::__construct
     * @covers \Seeren\Database\Entity\Column\RelationColumn::getClassName
     */
    public function testGetClassName(): void
    {
        $this->assertEquals(DummyEntity::class, $this->getMock()->getClassName());
    }

}

class DummyEntity extends AbstractEntity
{

    public function __construct()
    {
    }

}
