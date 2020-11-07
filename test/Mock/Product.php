<?php

namespace Seeren\Database\Test\Mock;

use Seeren\Database\Entity\AbstractEntity;
use Seeren\Database\Entity\Column\RelationColumn;
use Seeren\Database\Entity\Column\StringColumn;
use Seeren\Database\Entity\Key\Key;
use Seeren\Database\Manager\MySqlManager;

/**
 * @property string name
 * @property string description
 * @property Color secondary
 * @property Color accent
 */
class Product extends AbstractEntity
{

    public function __construct(MySqlManager $manager)
    {
        parent::__construct(
            $manager,
            [
                new StringColumn('name', StringColumn::CHAR, 255, [
                    StringColumn::OPT_NOT_NULL
                ]),
                new StringColumn('description', StringColumn::VARCHAR, 255, [
                    StringColumn::OPT_NOT_NULL
                ]),
                new RelationColumn('secondary', Color::class),
                new RelationColumn('accent', Color::class)
            ],
            [
                new Key(Key::UNIQUE, ['name'])
            ]
        );
    }

}
