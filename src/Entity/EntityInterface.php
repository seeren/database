<?php

namespace Seeren\Database\Entity;

use JsonSerializable;
use Seeren\Database\Entity\Clause\ClauseInterface;

/**
 * Interface to represent a entity
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Key
 */
interface EntityInterface extends JsonSerializable
{

    /**
     * @var string
     */
    const ATTR_NAME = 'NAME';

    /**
     * @var string
     */
    const ATTR_COLUMN = 'COLUMN';

    /**
     * @var string
     */
    const ATTR_KEY = 'KEY';

    /**
     * @var string
     */
    const ATTR_CLAUSE = 'CLAUSE';

    /**
     * @param string $name
     * @return mixed
     */
    public function getAttribute(string $name);

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name);

    /**
     * @param string $name
     * @param $value
     * @return mixed
     */
    public function __set(string $name, $value);

    /**
     * @param ClauseInterface $clause
     * @return $this
     */
    public function addClause(ClauseInterface $clause): self;

    /**
     * @return $this
     */
    public function clearClauses(): self;

    /**
     * @return int
     */
    public function count(): int;

    /**
     * @return $this
     */
    public function create(): self;

    /**
     * @return $this
     */
    public function delete(): self;

    /**
     * @return $this
     */
    public function drop(): self;

    /**
     * @return $this
     */
    public function insert(): self;

    /**
     * @return mixed
     */
    public function select();

    /**
     * @return $this
     */
    public function update(): self;

}
