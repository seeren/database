<?php

namespace Seeren\Database\Entity;

use InvalidArgumentException;
use JsonSerializable;
use Seeren\Database\Entity\Clause\ClauseInterface;
use Seeren\Database\Entity\Column\ColumnInterface;
use Seeren\Database\Entity\Key\KeyInterface;

/**
 * Interface to represent a entity
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity
 */
interface EntityInterface extends JsonSerializable
{

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return ColumnInterface[]
     */
    public function getColumns(): array;

    /**
     * @return KeyInterface[]
     */
    public function getKeys(): array;

    /**
     * @return ClauseInterface[]
     */
    public function getClauses(): array;

    /**
     * @param ClauseInterface $clause
     */
    public function addClause(ClauseInterface $clause): void;

    /**
     * @return void
     */
    public function clearClauses(): void;

    /**
     * @return int
     */
    public function count(): int;

    /**
     * Create entity with cascade
     *
     * @return $this
     */
    public function create(): self;

    /**
     * @return $this
     * @throws InvalidArgumentException
     */
    public function delete(): self;

    /**
     * Drop entity with cascade
     *
     * @return $this
     */
    public function drop(): self;

    /**
     * Insert entity with cascade when no id
     *
     * @return $this
     */
    public function insert(): self;

    /**
     * @return EntityInterface|EntityInterface[]|null
     */
    public function select();

    /**
     * Insert entity without cascade
     *
     * @return $this
     */
    public function update(): self;

}
