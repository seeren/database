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

namespace Seeren\Database\Dal;

use PDO;
use Seeren\Database\Dao\DaoInterface;
use Seeren\Database\Table\TableInterface;
use RuntimeException;
use Throwable;

/**
 * Class for provide data access layer
 * 
 * @category Seeren
 * @package Database
 * @subpackage Dal
 */
class Dal implements DalInterface
{

    private

        /**
         * @var PDO
         */
        $layer,

        /**
         * @var array
         */
        $object;

    /**
     * @param array $strategy
     */
    public function __construct(array $object = [])
    {
        $this->object = [];
        foreach ($object as $key => $value) {
            if (defined("static::" . strtoupper($key)) && is_string($value)) {
                $this->object[$key] = $value;
            }
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dal\DalInterface::getLayer()
     */
    public final function getLayer(): PDO
    {
        if (!$this->layer) {
            throw new RuntimeException("Can't get layer: not set");
        }
        return $this->layer;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dal\DalInterface::setLayer()
     */
    public final function setLayer(PDO $dbh)
    {
        $this->layer = $dbh;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dal\DalInterface::query()
     */
    public function query(
        TableInterface $table,
        string $operation): DalInterface
    {
        try {
            $table->set($this->getObject($operation)->query($table, $this));
            return $this;
        } catch (Throwable $e) {
            throw new RuntimeException("Can't query: " . $e->getMessage());
        }
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Dal\DalInterface::getObject()
     */
    public function getObject(string $operation): DaoInterface
    {
        try {
            if (is_object($this->object[$operation])) {
                return $this->object[$operation]->clone();
            }
            $this->object[$operation] = new $this->object[$operation];
            return $this->getObject($operation);
        } catch (Throwable $e) {
            throw new RuntimeException(
                "Can't get object: operation unreachable"
            );
        }
    }

}
