<?php


namespace models\marks;


use models\entity;
use models\students\student;
use models\subjects\subject;

class mark extends entity
{
    public $id;
    public $studentId;
    public $subjectId;
    public $mark;

    public function setStudentId(int $studentId)
    {
        $this->studentId = $studentId;
    }
    public function setSubjectId (int $subjectId)
    {
        $this->subjectId = $subjectId;
    }
    public function setMark(int $mark)
    {
        $this->mark = $mark;
    }
    public function getStudentId()
    {
        return $this->studentId;
    }
    public function getSubjectId()
    {
        return $this->subjectId;
    }
    public function getMark()
    {
        return $this->mark;
    }
    public function getSubjectName ()
    {
        $subject = subject::getById($this->subjectId);
        if ($subject!=null)
        {
            return $subject->getSubjectName();
        }
        else return null;

    }
   public function getStudentName()
    {
        $student = student::getById($this->studentId);
        if ($student!=null)
        {
            return $student->getStudentName();
        }
       else return null;
    }
    static function getTableName()
    {
        return "marks";
    }
}