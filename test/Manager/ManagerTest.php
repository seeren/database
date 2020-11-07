<?php

namespace Seeren\Database\Test\Manager;

use PDO;
use PHPUnit\Framework\TestCase;
use Seeren\Database\Entity\EntityInterface;
use Seeren\Database\Manager\Manager;
use Seeren\Database\Manager\ManagerInterface;
use Seeren\Database\Manager\MySqlManager;
use Seeren\Database\Statement\StatementInterface;
use Seeren\Database\Test\Mock\Color;

class ManagerTest extends TestCase
{

    /**
     * @return ManagerInterface
     */
    public function getMock(): ManagerInterface
    {
        return new MySqlManager('sqlite::memory:', 'user', 'password');
    }

    /**
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::getLayer
     */
    public function testGetLayer(): void
    {
        $this->assertInstanceOf(PDO::class, $this->getMock()->getLayer());
    }

    /**
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::prepare
     */
    public function testPrepare(): void
    {
        $this->assertInstanceOf(
            StatementInterface::class,
            $this->getMock()->prepare(ManagerInterface::CREATE)
        );
    }

    /**
     * @covers \Seeren\Database\Entity\AbstractEntity::__construct
     * @covers \Seeren\Database\Entity\AbstractEntity::getColumns
     * @covers \Seeren\Database\Entity\AbstractEntity::getName
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::__construct
     * @covers \Seeren\Database\Entity\Column\AbstractColumn::getName
     * @covers \Seeren\Database\Entity\Key\Key::__construct
     * @covers \Seeren\Database\Manager\MySqlManager::__construct
     * @covers \Seeren\Database\Manager\Manager::__construct
     * @covers \Seeren\Database\Manager\Manager::execute
     * @covers \Seeren\Database\Manager\Manager::getLayer
     * @covers \Seeren\Database\Manager\Manager::prepare
     * @covers \Seeren\Database\Statement\MySql\DropMySqlStatement::execute
     */
    public function testExecute(): void
    {
        $mock = $this->getMock();
        $this->assertInstanceOf(
            EntityInterface::class,
            $mock->execute(ManagerInterface::DROP, new Color($mock))
        );
    }

}
