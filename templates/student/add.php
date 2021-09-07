<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/student">Студенты</a></li>
        <li class="breadcrumb-item active" aria-current="page">Новый  студент</li>
    </ol>
</nav>
    <h1>Добавить студента</h1>
<? if(isset($data[1]["errors"])): ?>
    <div class="alert alert-danger" role="alert" >
        <ul>
            <? foreach ($data[1]["errors"] as $error): ?>
                <li><?=$error?></li>
            <?endforeach;?>
        </ul>
    </div>
<?endif?>
    <form class="row row-cols-lg-auto g-3 align-items-center "   name="addStudent" method="post" action="/crud/student/add" >
        <div class="col-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Имя студента" name ="setStudentName"  maxlength="60" title="Имя студента">
            </div>
        </div>
            <div class="col-4">
            <div class="input-group">
                <select class="form-select" aria-label="Группа" name="setStudentGroup" title="Группа">
                    <? if(isset($data[0]["allGroups"])): ?>
                    <?foreach ($data[0]["allGroups"] as $group): ?>
                    <option value="<?= intval($group->id) ?>>"><?=htmlspecialchars($group->getGroupName())?></option>
                    <? endforeach;?>
                    <? endif;?>
                </select>
            </div>
            </div>
        <div class="col-4"><button  class="btn btn-primary" type="submit">Отправить</button>	</div>


    </form>
</div>