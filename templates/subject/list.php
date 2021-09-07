<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
 <h1>Список предметов</h1>
    <table class="table table-hover table-responsive">
        <thead>
        <tr>
            <th>id</th>
            <th>Название предмета</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($items)): ?>
            <?php foreach ($items as $subject): ?>
                <tr>
                    <th><?= intval($subject->id) ?></th>
                    <td><?= htmlspecialchars($subject->getSubjectName()) ?></td>
                    <td><a class="btn btn-primary" type="button" id="edit" href="/crud/subject/<?= intval($subject->id) ?>/edit">Редактировать</a>
                    </td>
                    <td><a class="btn btn-danger delete"
                           data-itemId="<?= intval($subject->id)?>" data-EntityName="subject">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <a class="btn btn-primary" type="button"  href="/crud/subject/add">Добавить</a></div>
</div>

