<?php

require_once('functions.php');
require_once('data.php');
require_once('init.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
$projects = [];
$tasks = [];
$errors = [];

// идентификатор проекта
$project_id = null;

if (isset($_GET['pid'])) {
    $project_id = $_GET['pid'];
}

if ($project_id === '') {
    http_response_code(404);
    $errors[] = 'Страница не найдена';
}

if (!$db_link) {
    $errors[] = mysqli_connect_error();
    $page_content = include_template('error.php', ['errors' => [$errors]]);
} else {
    // все проекты пользователя (для меню)
    $sql = 'SELECT `id`, `name` FROM projects WHERE user_id=1';
    $result_projects = mysqli_query($db_link, $sql);

    if ($result_projects) {
        $projects = mysqli_fetch_all($result_projects, MYSQLI_ASSOC);
    } else {
        $errors[] = mysqli_error($db_link);
    }

    // все задачи пользователя (для меню)
    $sql = 'SELECT * FROM `doingsdone`.`tasks` WHERE user_id=1';
    $result_tasks = mysqli_query($db_link, $sql);
    if ($result_tasks) {
        $all_tasks = mysqli_fetch_all($result_tasks, MYSQLI_ASSOC);
    } else {
        $errors[] = mysqli_error($db_link);
    }

    // задачи пользователя
    if ($project_id !== '' && $project_id !== null) {
        $sql = 'SELECT * FROM `doingsdone`.`tasks` WHERE user_id=1 AND project_id='.$project_id;
    } else {
        $sql = 'SELECT * FROM `doingsdone`.`tasks` WHERE user_id=1';
    }
    $result_tasks = mysqli_query($db_link, $sql);

    if ($result_tasks) {
        $tasks = mysqli_fetch_all($result_tasks, MYSQLI_ASSOC);
    } else {
        $errors[] = mysqli_error($db_link);
    }

    $tasks_dont_exist = $project_id !== null && $project_id !== '' && count($tasks) === 0;
    if ($tasks_dont_exist) {
        http_response_code(404);
        $errors[] = 'По этому id проекта не нашлось ни одной записи';
    }

    if (count($errors) > 0) {
        $page_content = include_template('error.php', ['errors' => $errors]);
    } else {
        $page_content = include_template('index.php', [
            'show_complete_tasks' => $show_complete_tasks,
            'tasks' => $tasks,
        ]);
    }

}

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'projects' => $projects,
    'tasks' => $tasks,
    'all_tasks' => $all_tasks,
    'project_id' => $project_id,
    'user' => $user,
    'title' => 'Дела в порядке',
]);

print($layout_content);
