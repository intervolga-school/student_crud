<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/mark">Оценки</a></li>
        <li class="breadcrumb-item active" aria-current="page">Новая оценка</li>
    </ol>
</nav>
    <h1>Добавить оценку</h1>
<? if(isset($data[2]["errors"])): ?>
    <div class="alert alert-danger" role="alert" >
        <ul>
            <? foreach ($data[2]["errors"] as $error): ?>
                <li><?=$error?></li>
            <?endforeach;?>
        </ul>
    </div>
<?endif?>
    <form class="row row-cols-lg-auto g-3 align-items-center "   name="addMark" method="post" action="/crud/mark/add" >
        <div class="col-4">
            <div class="input-group">
            <select class="form-select" aria-label="Студенты" name="setStudentId" title="Имя студента">
            <? if(isset($data[0]["allStudents"])): ?>
                <?foreach ($data[0]["allStudents"] as $student): ?>
                    <option value="<?= intval($student->id) ?>"><?=htmlspecialchars($student->getStudentName())?></option>
                <? endforeach;?>
            <? endif;?>
            </select>
            </div>
        </div>
            <div class="col-4">
            <div class="input-group">
                <select class="form-select" aria-label="Предмет" name="setSubjectId" title="Предмет">
                    <? if(isset($data[1]["allSubjects"])): ?>
                    <?foreach ($data[1]["allSubjects"] as $subject): ?>
                    <option value="<?= intval($subject->id) ?>>"><?=htmlspecialchars($subject->getSubjectName())?></option>
                    <? endforeach;?>
                    <? endif;?>
                </select>
            </div>
            </div>
        <div class="col-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Оценка" name ="setMark"  maxlength="3" title="Оценка">
            </div>
        </div>
        <div class="col-4"><button  class="btn btn-primary" type="submit">Отправить</button>	</div>

    </form>
</div>