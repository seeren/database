<?php

namespace Seeren\Database\Entity\Column;

use JsonSerializable;

/**
 * Interface to represent a entity column
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Database\Entity\Column
 */
interface ColumnInterface extends JsonSerializable
{

    /**
     * @var string
     */
    const OPT_NULL = 'NULL';

    /**
     * @var string
     */
    const OPT_NOT_NULL = 'NOT NULL';

    /**
     * @var string
     */
    const OPT_DEFAULT_NULL = 'DEFAULT NULL';

    /**
     * @var string
     */
    const OPT_DEFAULT_STRING = "DEFAULT ''";

    /**
     * @var string
     */
    const OPT_DEFAULT_TIMESTAMP = 'DEFAULT CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    const OPT_BINARY = 'BINARY';

    /**
     * @var string
     */
    const OPT_UNSIGNED = 'UNSIGNED';

    /**
     * @return mixed
     */
    public function get();

    /**
     * @param $value mixed
     */
    public function set($value): void;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return int
     */
    public function getParam(): int;

    /**
     * @return int
     */
    public function getSize(): int;

    /**
     * @return array
     */
    public function getOptions(): array;

}
