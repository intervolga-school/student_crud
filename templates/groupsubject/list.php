<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<h1>Список связей группа-предмет</h1>
<table class="table table-hover table-responsive">
    <thead>
    <tr>
        <th>id</th>
        <th>Название группы</th>
        <th>Название предмета</th>
        <th colspan="2"></th>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($items)): ?>
        <?php foreach ($items as $link): ?>
            <tr>
                <th><?= intval($link->id) ?></th>
                <td><?= htmlspecialchars($link->getGroupName()) ?></td>
                <td><?= htmlspecialchars($link->getSubjectName()) ?></td>
                <td><a class="btn btn-primary" type="button" id="edit" href="/crud/groupsubject/<?= intval($link->id) ?>/edit">Редактировать</a>
                </td>
                <td><a class="btn btn-danger delete"
                       data-itemId="<?= intval($link->id)?>" data-EntityName="groupsubject">Удалить</a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
<a class="btn btn-primary" type="button"  href="/crud/groupsubject/add">Добавить</a></div>
</div>

