<?php


namespace models\students;


use models\entity;
use models\groups\group;

class student extends entity
{
    public $id;
    public $name;
    public $groupId;

    /**
     * @param mixed $groupId
     */
    public function setStudentGroup($groupId): void
    {
        $this->groupId = $groupId;
    }

    /**
     * @param mixed $studentName
     */
    public function setStudentName($studentName): void
    {
        $this->name = $studentName;
    }
    public function getStudentName ()
    {
        return $this->name;
    }
    public function getGroupName()
    {
        $group = group::getById($this->groupId);
        if ($group!=null)
        {
            return $group->getGroupName();
        }
        else return NULL;
    }
    static function getTableName() :string
    {
        return "students";
    }

}