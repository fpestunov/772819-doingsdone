<h2 class="content__main-heading">Список задач</h2>

<form class="search-form" action="index.php" method="post">
    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

    <input class="search-form__submit" type="submit" name="" value="Искать">
</form>

<div class="tasks-controls">
    <nav class="tasks-switch">
        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
        <a href="/" class="tasks-switch__item">Повестка дня</a>
        <a href="/" class="tasks-switch__item">Завтра</a>
        <a href="/" class="tasks-switch__item">Просроченные</a>
    </nav>

    <label class="checkbox">
        <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
        <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?= ($show_complete_tasks === 1) ? 'checked': ''; ?>>
        <span class="checkbox__text">Показывать выполненные</span>
    </label>
</div>

<table class="tasks">
    <!--показывать следующий тег <tr/>, если переменная $show_complete_tasks равна единице-->
    <?php foreach ($tasks as $task): ?>
        <?php if ($show_complete_tasks === 1 || ($show_complete_tasks === 0 && intval($task['status']) === 0)): ?>
            <tr class="tasks__item task <?= (intval($task['status']) === 1) ? 'task--completed': ''; ?> <?= isImportantTask($task['deadline_at']) ? 'task--important': ''; ?>">
                <td class="task__select">
                    <label class="checkbox task__checkbox">
                        <input class="checkbox__input visually-hidden" type="checkbox" checked>
                        <span class="checkbox__text"><?= $task['name']; ?></span>
                    </label>
                </td>
                <td class="task__date"><?= $task['deadline_at']; ?></td>

                <td class="task__controls">
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>
