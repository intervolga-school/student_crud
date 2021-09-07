<?php

namespace controllers;

use views\view;
use models\groups\group;
use services\db;

class maincontroller
{
    public $view;
    public $templateDir;
    public $array = [];
    public $error = [];

    public function __construct()
    {
        $this->view = new view ("/crud/templates");
        $this->shortClass = explode('\\', $this->class)[2]; //короткое название класса для редиректов
        foreach ($this->entitiesToGet as $var => $class)   // получаем сущности для страниц добавления,
                                                             //например список групп для студента
        {
            $this->array [] = ["$var" => $class::getAll()];
        }
    }

    public function showAll()
    {
        $class = $this->class;
        $allItems = $class::getAll();
        $this->view->renderPage($this->templateDir . "/list.php", ["items" => $allItems]);
    }

    public function validateObject($object)
    {
        foreach ($_POST as $method => $value)
        {
            if (in_array($method, $this->fieldsToCheck))
            {
                if (($value == "") || (ctype_space($value)))
                {
                    $this->error [] = "Поле пустое или состоит из одних пробелов";
                }
                elseif ($method=="setMark")
                {
                    if(!is_numeric($value))
                    {
                        $this->error [] = "Оценка должна быть числом";
                    }
                    else $object->$method($value);
                }
                else
                {
                    $object->$method($value);
                }
            }
            else
            {
                $object->$method($value);
            }
        }
        return $object;
    }

    public function add()
    {
        $object = new $this->class;

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $object = $this->validateObject($object);
            if (!empty($this->error))
            {
                $this->array [] = ["errors" => $this->error];
                $this->view->renderPage($this->templateDir . "/add.php", ["data" => $this->array]);
            }
            else
            {
                $object->save();
                if (!empty($object->getError())) // если при сохранении была ошибка дубликата пары  группа - предмет, то выдаем ошибку
                {
                    $this->array [] = ["errors" => $object->getError()];
                    $this->view->renderPage($this->templateDir . "/add.php", ["data" => $this->array]);
                    die();
                }

                header("location: /crud/" . $this->shortClass);
            }
        }
        else
        {
            $this->view->renderPage($this->templateDir . "/add.php", ["data" => $this->array]);
        }
    }

    public function edit(int $id)
    {
        $object = $this->class::getById($id);
        $this->array [] = ["currentItem"=>$object];
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $object = $this->validateObject($object);
            if (!empty($this->error))
            {
                $this->array [] = ["errors" => $this->error];
                $this->view->renderPage($this->templateDir . "/edit.php", ["data" => $this->array]);
            }
            else
            {
                $object->update();
                if (!empty($object->getError()))
                {
                    $this->array [] = ["errors" => $object->getError()];
                    $this->view->renderPage($this->templateDir . "/edit.php", ["data" => $this->array]);
                    die();
                }
                header("location: /crud/" . $this->shortClass);
            }
        }
        else
        {
            $this->view->renderPage($this->templateDir . "/edit.php", ["data" => $this->array]);
        }
    }

    public function delete(int $id)
    {
        $item = $this->class::getById($id);
        if ($item != null) {
            $item->delete();
        }
        header("location: /crud/" . $this->shortClass);

    }

    public function showRating()
    {
        $allGroups = group::getAll();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = db::getInstance();
            $value = [":id" => $_POST["groupId"]];

            $sql = "SELECT students.name as std_name, students.id as std_id, subjects.name as sub_name,
                subjects.id as sub_id, AVG(marks.mark) as avgMark FROM groups
                JOIN students ON groups.id = students.groupId 
                JOIN gslink ON gslink.groupId = groups.id 
                JOIN subjects ON subjects.id = gslink.subjectId 
                LEFT JOIN marks ON marks.studentId = students.id AND marks.subjectId = subjects.id 
                WHERE groups.id = :id
				GROUP BY subjects.name, students.name
                ORDER BY subjects.name";
            $statement = $db->pdo->prepare($sql);
            $statement->execute($value);

            $subjects = [];
            $students = [];
            $rating = [];
            while ($fetch = $statement->fetch()) {
                $subjects[$fetch['sub_id']] = $fetch['sub_name'];
                $students[$fetch['std_id']] = $fetch['std_name'];;
                $rating[$fetch['std_id']][$fetch['sub_id']] = $fetch['avgMark'];
            }

            $this->view->renderPage("rating/rating.php", ["allGroups" => $allGroups, "subjectList" => $subjects,
                "students" => $students, "rating" => $rating]);

        } else {
            $this->view->renderPage("rating/rating.php", ["allGroups" => $allGroups]);
        }

    }
}

?>