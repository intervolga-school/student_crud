<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/crud/templates/inc/header.php" ?>
<h1>Рейтинг группы</h1>
<? if (isset($allGroups)): ?>
    <form class="row row-cols-lg-auto g-3 align-items-center " name="ratingShow" method="post" action="/crud/">

        <div class="col-12">
            <div class="input-group">
                <select class="form-select co" aria-label="Группа" name="groupId" title="Группа">
                    <? foreach ($allGroups as $group): ?>
                        <option value="<?= intval($group->id) ?>"><?= htmlspecialchars($group->getGroupName()) ?></option>
                    <? endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-12"><button  class="btn btn-primary" type="submit">Отправить</button>	</div>


    </form>
<? endif; ?>
<table class="table table-hover table-responsive">
    <thead>
    <tr>
        <?if (isset($subjectList)):?>
        <th>Студенты</th>
        <? foreach ($subjectList as $subjectId => $subjectName): ?>
            <th><?=htmlspecialchars($subjectName) ?></th>
        <?endforeach;?>
        <?endif;?>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($students)): ?>
        <?php foreach ($students as $studentId => $studentName): ?>
            <tr>
                <th><?= htmlspecialchars($studentName) ?></th>
                <?php foreach ($rating[$studentId] as $subjectId => $mark): ?>
                <td> <?=floatval($mark)?></td>
                <?endforeach;?>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
</div>

