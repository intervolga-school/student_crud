<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/groupsubject">Связи</a></li>
        <li class="breadcrumb-item active" aria-current="page">Новая связь</li>
    </ol>
</nav>
    <h1>Добавить связь группа - предмет</h1>
<? if(isset($data[2])): ?>

    <div class="alert alert-danger" role="alert" >
        <ul>
        <? foreach ($data[2]["errors"] as $error): ?>
        <li><?=$error?></li>
        <?endforeach;?>
        </ul>
    </div>
<?endif?>
    <form class="row row-cols-lg-auto g-3 align-items-center "   name="addLink" method="post" action="/crud/groupsubject/add" >

        <div class="col-4">
            <div class="input-group">
            <select class="form-select" aria-label="Группа" name="setGroupId" title="Группа">
                <? if(isset($data[0])): ?>
                    <?foreach ($data[0]["allGroups"] as $group): ?>
                        <option value="<?= intval($group->id) ?>"><?=htmlspecialchars($group->getGroupName())?></option>
                    <? endforeach;?>
                <? endif;?>
            </select>
            </div>
        </div>
            <div class="col-4">
            <div class="input-group">
                <select class="form-select" aria-label="Предмет" name="setSubjectId" title="Предмет">
                    <? if(isset($data[1])): ?>
                    <?foreach ($data[1]["allSubjects"] as $subject): ?>
                    <option value="<?= intval($subject->id) ?>"><?=htmlspecialchars($subject->getSubjectName())?></option>
                    <? endforeach;?>
                    <? endif;?>
                </select>
            </div>
            </div>
        <div class="col-4"><button  class="btn btn-primary" type="submit">Отправить</button>	</div>

    </form>
</div>