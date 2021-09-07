<?php


namespace controllers;


use models\marks\mark;
use models\students\student;
use models\subjects\subject;

class markcontroller extends maincontroller
{
   public $templateDir = "mark";
   public $class = \models\marks\mark::class;
   public $entitiesToGet = ["allStudents"=>student::class,"allSubjects"=>subject::class];
   public $fieldsToCheck = ["setMark"];

}