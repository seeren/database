<?php

namespace Seeren\Database\Entity;

use Seeren\Database\Entity\Column\IntegerColumn;
use Seeren\Database\Entity\Key\Key;
use Seeren\Database\Manager\ManagerInterface;
use Seeren\Database\Entity\Clause\ClauseInterface;
use Seeren\Database\Entity\Column\ColumnInterface;
use Seeren\Database\Entity\Key\KeyInterface;

/**
 * Class to represent a entity
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity
 *
 * @property int id
 */
class AbstractEntity implements EntityInterface
{

    /**
     * @var ManagerInterface
     */
    private ManagerInterface $manager;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var ColumnInterface[]
     */
    private array $columns;

    /**
     * @var KeyInterface[]
     */
    private array $keys;

    /**
     * @var ClauseInterface[]
     */
    private array $clauses = [];

    /**
     * @param ManagerInterface $manager
     * @param array $columns
     * @param array $keys
     */
    public function __construct(
        ManagerInterface $manager,
        array $columns,
        array $keys = []
    )
    {
        $this->manager = $manager;
        $this->name = trim(strtolower(preg_replace('/[A-Z]/', '_$0', substr(
            static::class,
            strrpos(static::class, '\\') + 1
        ))), '_');
        $this->columns = ['id' => new IntegerColumn('id', IntegerColumn::INT, 11, [
            IntegerColumn::OPT_UNSIGNED,
            IntegerColumn::OPT_NOT_NULL
        ])];
        foreach ($columns as $column) {
            $this->columns[$column->getName()] = $column;
        }
        $this->keys = $keys;
        array_unshift($this->keys, new Key(Key::PRIMARY, ['id']));
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function __get(string $name)
    {
        return array_key_exists($name, $this->columns) ? $this->columns[$name]->get() : null;
    }

    /**
     * @param string $name
     * @param $value
     */
    public function __set(string $name, $value)
    {
        if (array_key_exists($name, $this->columns)) {
            $this->columns[$name]->set($value);
        }
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::getName
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::getColumns
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::getKeys
     */
    public function getKeys(): array
    {
        return $this->keys;
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::getClauses
     */
    public function getClauses(): array
    {
        return $this->clauses;
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::addClause()
     */
    public function addClause(ClauseInterface $clause): void
    {
        $this->clauses[] = $clause;
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::clear()
     */
    public function clearClauses(): void
    {
        $this->clauses = [];
    }

    /**
     * {@inheritDoc}
     * @see JsonSerializable::jsonSerialize()
     */
    public function jsonSerialize()
    {
        return $this->columns;
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::count()
     */
    public function count(): int
    {
        return $this->manager->execute(ManagerInterface::COUNT, $this);
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::create()
     */
    public function create(): EntityInterface
    {
        return $this->manager->execute(ManagerInterface::CREATE, $this);
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::delete()
     */
    public function delete(): EntityInterface
    {
        return $this->manager->execute(ManagerInterface::DELETE, $this);
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::drop()
     */
    public function drop(): EntityInterface
    {
        return $this->manager->execute(ManagerInterface::DROP, $this);
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::insert()
     */
    public function insert(): EntityInterface
    {
        return $this->manager->execute(ManagerInterface::INSERT, $this);
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::insert()
     */
    public function select()
    {
        return $this->manager->execute(ManagerInterface::SELECT, $this);
    }

    /**
     * {@inheritDoc}
     * @see EntityInterface::update()
     */
    public function update(): EntityInterface
    {
        return $this->manager->execute(ManagerInterface::UPDATE, $this);
    }

}
