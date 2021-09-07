<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/groupsubject">Связи</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование связи </li>
    </ol>
</nav>
    <h1>Редактировать связь группа - предмет</h1>
<? if(isset($data[3])): ?>

    <div class="alert alert-danger" role="alert" >
        <ul>
            <? foreach ($data[3]["errors"] as $error): ?>
                <li><?=$error?></li>
            <?endforeach;?>
        </ul>
    </div>
<?endif?>
    <form class="row row-cols-lg-auto g-3 align-items-center "   name="editLink" method="post"
          action="/crud/groupsubject/<?=$data[2]["currentItem"]->id?>/edit" >
        <div class="col-4">
            <div class="input-group">
            <select class="form-select" aria-label="Группа" name="setGroupId" title="Группа">
                <? if(isset($data[0]["allGroups"])): ?>
                    <?foreach ($data[0]["allGroups"] as $group): ?>
                    <? if ($data[2]["currentItem"]->groupId==$group->id):?>
                        <option value="<?= intval($group->id) ?>" selected><?=htmlspecialchars($group->getGroupName())?></option>
                    <? else: ?>
                        <option value="<?= intval($group->id) ?> "><?=htmlspecialchars($group->getGroupName())?></option>
                    <?endif;?>
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
                    <? if ($data[2]["currentItem"]->subjectId==$subject->id):?>
                    <option value="<?= intval($subject->id) ?>" selected><?=htmlspecialchars($subject->getSubjectName())?></option>
                    <? else: ?>
                        <option value="<?= intval($subject->id) ?> "><?=htmlspecialchars($subject->getSubjectName())?></option>
                    <?endif;?>
                    <? endforeach;?>
                    <? endif;?>
                </select>
            </div>
            </div>
        <div class="col-4"><button  class="btn btn-primary" type="submit">Отправить</button>	</div>

    </form>
</div>