<?php

namespace Seeren\Database\Test\Table;

use Seeren\Database\Table\MasterTable;
use Seeren\Database\Table\TableInterface;
use Seeren\Database\Table\Column\IntegerColumn;
use Seeren\Database\Table\Column\StringColumn;
use Seeren\Database\Table\Key\Key;
use Seeren\Database\Table\User\User;

class DummyTable extends MasterTable implements TableInterface
{
    
    const NAME = "dummy";
    
    public function __construct()
    {
        parent::__construct([new User]);
        $this->addColumn(
            new IntegerColumn("id", IntegerColumn::INT, 10, [
                IntegerColumn::OPT_AUTO_INCREMENT,
                IntegerColumn::OPT_NOT_NULL])
            );
        $this->addColumn(
            new StringColumn("user", StringColumn::CHAR, 80, [
                StringColumn::OPT_NOT_NULL,
                StringColumn::OPT_DEFAULT_STRING])
            );
        $this->addKey(new Key(Key::PRIMARY, ["id"]));
        $this->addKey(new Key(
            Key::FOREIGN,
            ["user"],
            User::NAME,
            [User::COL_USER]));
    }
    
}
