<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
    <h1>Список групп</h1>
    <table class="table table-hover table-responsive">
        <thead>
        <tr>
            <th>id</th>
            <th>Название группы</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($items)): ?>
            <?php foreach ($items as $group): ?>
                <tr>
                    <th><?= intval($group->id) ?></th>
                    <td><?= htmlspecialchars($group->getGroupName()) ?></td>
                    <td><a class="btn btn-primary" type="button" id="edit" href="/crud/group/<?= intval($group->id) ?>/edit">Редактировать</a>
                    </td>
                    <td><a class="btn btn-danger delete"
                           data-itemId="<?= intval($group->id)?>" data-EntityName="group">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <a class="btn btn-primary" type="button"  href="/crud/group/add">Добавить</a></div>
</div>

