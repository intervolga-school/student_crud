<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
    <h1>Оценки</h1>
    <table class="table table-hover table-responsive">
        <thead>
        <tr>
            <th>id</th>
            <th>Студент</th>
            <th>Предмет</th>
            <th>Оценка</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($items)): ?>
            <?php foreach ($items as $mark): ?>
                <tr>
                    <th><?= intval($mark->id) ?></th>
                    <td><?= htmlspecialchars($mark->getStudentName()) ?></td>
                    <td><?= htmlspecialchars($mark->getSubjectName()) ?></td>
                    <td><?= intval($mark->mark) ?></td>
                    <td><a class="btn btn-primary" type="button" id="edit" href="/crud/mark/<?= intval($mark->id) ?>/edit">Редактировать</a>
                    </td>
                    <td><a class="btn btn-danger delete"
                           data-itemId="<?= intval($mark->id)?>" data-EntityName="mark">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <a class="btn btn-primary" type="button"  href="/crud/mark/add">Добавить</a></div>
</div>

