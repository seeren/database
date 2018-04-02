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
 * @version 1.0.1
 */

namespace Seeren\Database\Table\Key;

/**
 * Class for represent a table key
 * 
 * @category Seeren
 * @package Database
 * @subpackage Table\Key
 */
class Key implements KeyInterface
{

    protected

        /**
         * @var string
         */
        $type,

        /**
         * @var array
         */
        $subject,

        /**
         * @var string
         */
        $foreigner,

        /**
         * @var array
         */
        $foreignerSubject;

    /**
     * @param string $type type
     * @param array $subject subject name collection
     * @param string $foreigner foreigner name
     * @param array $foreignerSubject foreigner subject name collection
     */
    public function __construct(
        string $type,
        array $subject,
        string $foreigner = "",
        array $foreignerSubject = [])
    {

        $this->type = defined("static::" . $type) ? $type : self::KEY;
        $this->subject = $subject;
        $this->foreigner = $foreigner;
        $this->foreignerSubject = $foreignerSubject;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Key\KeyInterface::getType()
     */
    public final function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Key\KeyInterface::getSubject()
     */
    public final function getSubject(): array
    {
        return $this->subject;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Key\KeyInterface::getForeigner()
     */
    public final function getForeigner(): string
    {
        return $this->foreigner;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Database\Table\Key\KeyInterface::getForeignerSubject()
     */
    public final function getForeignerSubject(): array
    {
        return $this->foreignerSubject;
    }

}
