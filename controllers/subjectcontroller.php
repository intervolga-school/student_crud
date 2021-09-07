<?php


namespace controllers;

use models\subjects\subject;

class subjectcontroller extends maincontroller
{
    public $templateDir = "subject";
    public $class = \models\subjects\subject::class;
    public $fieldsToCheck = ["setSubjectName"];




}