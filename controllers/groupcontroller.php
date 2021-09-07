<?php

namespace controllers;

use models\groups\group;

class groupcontroller extends maincontroller
{
    public $templateDir = "group";
    public $class = \models\groups\group::class;
    public $fieldsToCheck = ["setGroupName"];


}

?>