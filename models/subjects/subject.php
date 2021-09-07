<?php


namespace models\subjects;


use models\entity;

class subject extends entity
{
    public $id;
    public $name;

    public function setSubjectName(string $subjectName)
    {
        $this->name = $subjectName;
    }

    public function getSubjectName() :string
    {
        return $this->name;
    }

    static function getTableName () :string
    {
        return "subjects";
    }

}