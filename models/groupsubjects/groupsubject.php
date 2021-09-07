<?php


namespace models\groupsubjects;


use models\entity;
use models\groups\group;
use models\subjects\subject;

class groupsubject extends entity
{
    public $id;
    public $groupId;
    public $subjectId;


    public function getGroupId()
    {
        return $this->groupId;
    }

    public function getSubjectId()
    {
        return $this->subjectId;
    }

    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    public function setSubjectId($subjectId)
    {
        $this->subjectId = $subjectId;
    }
    public function getGroupName ()
    {
        $group = group::getById($this->groupId);
        if ($group!=null)
        {
            return $group->getGroupName();
        }
        else return NULL;
    }
    public function getSubjectName()
    {
        $subject = subject::getById($this->subjectId);
        if ($subject!=null)
        {
            return $subject->getSubjectName();
        }
        else return NULL;
    }
    static function getTableName() :string
    {
        return "gslink";
    }


}