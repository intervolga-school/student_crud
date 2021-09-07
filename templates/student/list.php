<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
    <h1>Список студентов</h1>
    <table class="table table-hover table-responsive">
        <thead>
        <tr>
            <th>id</th>
            <th>Имя студента</th>
            <th>Группа </th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($items)): ?>
            <?php foreach ($items as $student): ?>
                <tr>
                    <th><?= intval($student->id) ?></th>
                    <td><?= htmlspecialchars($student->getStudentName()) ?></td>
                    <td><?= htmlspecialchars($student->getGroupName()) ?></td>
                    <td><a class="btn btn-primary" type="button" id="edit" href="/crud/student/<?= intval($student->id) ?>/edit">Редактировать</a>
                    </td>
                    <td><a class="btn btn-danger delete"
                           data-itemId="<?= intval($student->id)?>" data-EntityName="student">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <a class="btn btn-primary" type="button"  href="/crud/student/add">Добавить</a></div>
</div>

