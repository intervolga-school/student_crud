<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/student">Студенты</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование студента <?=htmlspecialchars($data[1]["currentItem"]->getStudentName())?> </li>
    </ol>
</nav>
    <h1>Редактировать студента</h1>
<? if(isset($data[2]["errors"])): ?>
    <div class="alert alert-danger" role="alert" >
        <ul>
            <? foreach ($data[2]["errors"] as $error): ?>
                <li><?=$error?></li>
            <?endforeach;?>
        </ul>
    </div>
<?endif?>
    <form class="row row-cols-lg-auto g-3 align-items-center "   name="editStudent" method="post" action="/crud/student/<?= intval($data[1]["currentItem"]->id) ?>/edit" >

        <div class="col-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Имя студента" name ="setStudentName"  maxlength="60"
                       value = "<?=htmlspecialchars($data[1]["currentItem"]->getStudentName())?>" title="Имя студента">
            </div>
        </div>
            <div class="col-4">
            <div class="input-group">
                <select class="form-select" aria-label="Группа" name="setStudentGroup" title="Группа">
                    <? if(isset($data[0]["allGroups"])): ?>
                    <?foreach ($data[0]["allGroups"] as $group): ?>
                        <? if ($data[1]["currentItem"]->groupId==$group->id):?>
                                <option value="<?= intval($group->id) ?>" selected><?=htmlspecialchars($group->getGroupName())?></option>
                            <?else:?>
                    <option value="<?= intval($group->id) ?>>"><?=htmlspecialchars($group->getGroupName())?></option>
                        <?endif;?>
                    <? endforeach;?>
                    <? endif;?>
                </select>
            </div>
            </div>
        <div class="col-4"><button  class="btn btn-primary" type="submit">Отправить</button>	</div>


    </form>
</div>