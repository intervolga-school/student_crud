<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/subject">Предметы</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование предмета <?=$data[0]["currentItem"]->getSubjectName()?></li>
    </ol>
</nav>
    <h1>Редактировать предмет</h1>
<? if($data[1]["errors"]): ?>
    <div class="alert alert-danger" role="alert" >
        <ul>
            <? foreach ($data[1]["errors"] as $error): ?>
                <li><?=$error?></li>
            <?endforeach;?>
        </ul>
    </div>
<?endif?>
    <form class="row row-cols-lg-auto g-3 align-items-center "   name="editSubject" method="post"
          action ="/crud/subject/<?= intval($data[0]["currentItem"]->id) ?>/edit" >
        <div class="col-12">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Название предмета" name ="setSubjectName"  maxlength="60"
                       value="<?=$data[0]["currentItem"]->getSubjectName()?>" title="Название предмета">
            </div>
        </div>
        <div class="col-12"><button  class="btn btn-primary" type="submit">Отправить</button>	</div>
    </form>
</div>