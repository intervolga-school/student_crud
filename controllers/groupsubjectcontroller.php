<?php


namespace controllers;


use models\groups\group;
use models\groupsubjects\groupsubject;
use models\subjects\subject;

class groupsubjectcontroller extends maincontroller
{
    public $templateDir = "groupsubject";
    public $class = \models\groupsubjects\groupsubject::class;
    public $entitiesToGet = ["allGroups"=>group::class,"allSubjects"=>subject::class];

}