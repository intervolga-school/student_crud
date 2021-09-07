<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/group">Группы</a></li>
        <li class="breadcrumb-item active" aria-current="page">Новая группа</li>
    </ol>
</nav>
    <h1>Добавить группу</h1>
<? if(isset($data[0]['errors'])): ?>
    <div class="alert alert-danger" role="alert" >
        <ul>
            <? foreach ($data[0]['errors'] as $error): ?>
                <li><?=$error?></li>
            <?endforeach;?>
        </ul>
    </div>
<?endif?>
    <form class="row row-cols-lg-auto g-3 align-items-center "   name="addGroup" method="post" action="/crud/group/add" >
        <div class="col-12">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Имя группы" name ="setGroupName"  maxlength="60" title="Имя группы">
            </div>
        </div>
        <div class="col-12"><button  class="btn btn-primary" type="submit">Отправить</button>	</div>
    </form>
</div>