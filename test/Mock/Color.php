<?php

namespace Seeren\Database\Test\Mock;

use Seeren\Database\Entity\AbstractEntity;
use Seeren\Database\Entity\Column\StringColumn;
use Seeren\Database\Entity\Key\Key;
use Seeren\Database\Manager\MySqlManager;

/**
 * @property string label
 */
class Color extends AbstractEntity
{

    public function __construct(MySqlManager $manager)
    {
        parent::__construct(
            $manager,
            [
                new StringColumn('label', StringColumn::VARCHAR, 255, [StringColumn::OPT_NOT_NULL])
            ],
            [
                new Key(Key::UNIQUE, ['label'])
            ]
        );
    }

}
