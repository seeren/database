<?php

namespace Seeren\Database\Test\Entity\Key;

use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\Key\Key;
use Seeren\Database\Entity\Key\KeyInterface;

class KeyTest extends TestCase
{

    /**
     * @return KeyInterface
     */
    public function getMock(): KeyInterface
    {
        return new Key(Key::PRIMARY, ['id']);
    }

    /**
     * @covers       \Seeren\Database\Entity\Key\Key::__construct
     * @covers       \Seeren\Database\Entity\Key\Key::getType
     */
    public function testGetType(): void
    {
        $this->assertEquals(Key::PRIMARY, $this->getMock()->getType());
    }

    /**
     * @covers       \Seeren\Database\Entity\Key\Key::__construct
     * @covers       \Seeren\Database\Entity\Key\Key::getColumnsName
     */
    public function testGetColumnsName(): void
    {
        $this->assertEquals(['id'], $this->getMock()->getColumnsName());
    }

}
