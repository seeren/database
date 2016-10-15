<?php

/**
 * This file contain Seeren\Database\Table\Column\IntegerColumn class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Database\Table\Column;

use PDO;

/**
 * Class for represent a table integer column
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table\Column
 */
class IntegerColumn extends AbstractColumn implements IntegerColumnInterface
{

    /**
     * Construct IntegerColumn
     * 
     * @param string $name name
     * @param string $type type
     * @param int $size size
     * @param array $option option collection
     * @return null
     */
    public function __construct(
        string $name,
        string $type,
        int $size,
        array $option = [])
    {
        parent::__construct($name, $type, $size, $option);
        if (null === $this->type) {
            $this->type = self::INT;
        }
    }

    /**
     * Set value
     *
     * @param mixed $value value
     * @return null
     */
    public final function setValue($value)
    {
        $this->value = (int) $value;
    }

    /**
     * Get PDO param
     *
     * @return int const value
     */
    public final function getParam(): int
    {
        return PDO::PARAM_INT;
    }

}
