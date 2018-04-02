<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */
namespace Seeren\Database\Table\Column;

use PDO;

/**
 * Class for represent a table string column
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table\Column
 */
class StringColumn extends AbstractColumn implements StringColumnInterface
{

    /**
     * @param string $name name
     * @param string $type type
     * @param int $size size
     * @param array $option option collection
     */
    public function __construct(
        string $name,
        string $type,
        int $size,
        array $option = [])
    {
        parent::__construct($name,  $type, $size, $option);
        if (null === $this->type) {
            $this->type = self::CHAR;
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Column\ColumnInterface::setValue()
     */
    public final function setValue($value)
    {
        $this->value = (string) $value;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Column\ColumnInterface::getParam()
     */
    public final function getParam(): int
    {
        return PDO::PARAM_STR;
    }

}
