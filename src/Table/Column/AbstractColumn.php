<?php

/**
 * This file contain Seeren\Database\Table\Column\AbstractColumn class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */

namespace Seeren\Database\Table\Column;

/**
 * Class for represent a column
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table\Column
 */
abstract class AbstractColumn
{

    protected
        /**
         * @var string name
         */
        $name,
        /**
         * @var string type
         */
        $type,
        /**
         * @var int size
         */
        $size,
        /**
         * @var array option collection
         */
        $option,
        /**
         * @var mixed value
         */
        $value;

    /**
     * Construct AbstractColumn
     * 
     * @param string $name name
     * @param string $type type
     * @param int $size size
     * @param array $option option collection
     * @return null
     */
    protected function __construct(
        string $name,
        string $type,
        int $size,
        array $option)
    {
        $this->name = $name;
        $this->type = defined("static::" . $type) ? $type : "";
        $this->size = $size;
        $this->option = [];
        foreach ($option as $value) {
            if (defined("static::OPT_" . $value)) {
                $this->option[] = $value;
            }
        }
    }

    /**
     * Get name
     *
     * @return string name
     */
    public final function getName(): string
    {
        return $this->name;
    }

    /**
     * Get value
     *
     * @return mixed value
     */
    public final function getValue()
    {
        return $this->value;
    }

    /**
     * Get type
     *
     * @return string type
     */
    public final function getType(): string
    {
        return $this->type;
    }

    /**
     * Get size
     *
     * @return int size
     */
    public final function getSize(): int
    {
        return $this->size;
    }

    /**
     * Get option
     *
     * @return array option
     */
    public final function getOption(): array
    {
        return $this->option;
    }

}
