<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/mark">Оценки</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование оценки</li>
    </ol>
</nav>
    <h1>Редактировать оценку</h1>
<? if(isset($data[3]["errors"])): ?>
    <div class="alert alert-danger" role="alert" >
        <ul>
            <? foreach ($data[3]["errors"] as $error): ?>
                <li><?=$error?></li>
            <?endforeach;?>
        </ul>
    </div>
<?endif?>
    <form class="row row-cols-lg-auto g-3 align-items-center "   name="editMark" method="post"
          action="/crud/mark/<?=intval($data[2]["currentItem"]->id)?>/edit" >
        <div class="col-4">
            <div class="input-group">
            <select class="form-select" aria-label="Студенты" name="setStudentId" title="Имя студента">
            <? if(isset($data[0]["allStudents"])): ?>
                <?foreach ($data[0]["allStudents"] as $student): ?>
                <?if ($data[2]["currentItem"]->studentId ==  intval($student->id)): ?>
                    <option value="<?= intval($student->id) ?>" selected><?=htmlspecialchars($student->getStudentName())?></option>
                    <?else:?>
                    <option value="<?= intval($student->id) ?>" ><?=htmlspecialchars($student->getStudentName())?></option>
                    <? endif;?>
                <? endforeach;?>
            <? endif;?>
            </select>
            </div>
        </div>
            <div class="col-4">
            <div class="input-group">
                <select class="form-select" aria-label="Предметы" name="setSubjectId" title="Предметы">
                    <? if(isset($data[1]["allSubjects"])): ?>
                    <?foreach ($data[1]["allSubjects"] as $subject): ?>
                    <?if ($data[2]["currentItem"]->subjectId ==  intval($subject->id)): ?>
                    <option value="<?= intval($subject->id) ?>>" selected><?=htmlspecialchars($subject->getSubjectName())?></option>
                    <?else:?>
                        <option value="<?= intval($subject->id) ?>>" ><?=htmlspecialchars($subject->getSubjectName())?></option>
                            <? endif;?>
                    <? endforeach;?>
                    <? endif;?>
                </select>
            </div>
            </div>
        <div class="col-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Оценка" name ="setMark"  maxlength="3" title="Оценка"
                       value="<?=intval($data[2]["currentItem"]->mark)?>">
            </div>
        </div>
        <div class="col-4"><button  class="btn btn-primary" type="submit">Отправить</button>	</div>

    </form>
</div>