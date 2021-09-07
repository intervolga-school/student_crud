<?php


namespace models\groups;

use models\entity;

class group extends entity
{
    public $name;
    public $id;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function getGroupName(): string
    {
        return $this->name;
    }
    public function setGroupName(string $groupName)
    {
        $this->name = $groupName;
    }

    static function getTableName () :string
    {
        return "groups";
    }
}

?>