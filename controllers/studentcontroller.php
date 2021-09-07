<?php


namespace controllers;


use models\groups\group;
use models\students\student;

class studentcontroller extends maincontroller
{

    public $templateDir = "student";
    public $class = \models\students\student::class;
    public $entitiesToGet = ["allGroups"=>group::class];
    public $fieldsToCheck = ["setStudentName"];


}

?>