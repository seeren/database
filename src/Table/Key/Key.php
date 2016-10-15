<?php

/**
 * This file contain Seeren\Database\Table\Key\Key class
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
         * @var string type
         */
        $type,
        /**
         * @var array subject name collection
         */
        $subject,
        /**
         * @var string foreigner name
         */
        $foreigner,
        /**
         * @var array foreigner subject name collection
         */
        $foreignerSubject;

    /**
     * Construct Key
     * 
     * @param string $type type
     * @param array $subject subject name collection
     * @param string $foreigner foreigner name
     * @param array $foreignerSubject foreigner subject name collection
     * @return null
     */
    public function __construct(
        string $type,
        array $subject,
        string $foreigner = null,
        array $foreignerSubject = null)
    {

        $this->type = (defined("static::" . $type) ? $type : "");
        $this->subject = $subject;
        $this->foreigner = $foreigner;
        $this->foreignerSubject = $foreignerSubject;
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
     * Get subject name collection
     *
     * @return array subject
     */
    public final function getSubject(): array
    {
        return $this->subject;
    }

    /**
     * Get foreigner
     *
     * @return string foreigner name
     */
    public final function getForeigner(): string
    {
        return (string) $this->foreigner;
    }

    /**
     * Get foreigner subject name collection
     *
     * @return array foreigner subject name collection
     */
    public final function getForeignerSubject(): array
    {
        return $this->foreignerSubject ? $this->foreignerSubject : [];
    }

}
