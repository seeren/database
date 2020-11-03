<?php

namespace Seeren\Database\Entity\Column;

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
interface ColumnInterface
{

    /**
     * @var string
     */
    const OPT_NULL = 'NULL';

    /**
     * @var string
     */
    const OPT_NOT_NULL = 'NOT_NULL';

    /**
     * @var string
     */
    const OPT_DEFAULT_NULL = 'DEFAULT_NULL';

    /**
     * @var string
     */
    const OPT_DEFAULT_STRING = 'DEFAULT_STRING';

    /**
     * @var string
     */
    const OPT_DEFAULT_TIMESTAMP = 'DEFAULT_TIMESTAMP';

    /**
     * @var string
     */
    const OPT_BINARY = 'BINARY';

    /**
     * @var string
     */
    const OPT_UNSIGNED = 'UNSIGNED';

    /**
     * @var string
     */
    const OPT_AUTO_INCREMENT = 'AUTO_INCREMENT';


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
