<?php

require_once('functions.php');
require_once('data.php');
require_once('init.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
$projects = [];
$tasks = [];
$errors = [];

if (!$link) {
    $errors[] = mysqli_connect_error();
    $page_content = include_template('error.php', ['errors' => [$errors]]);
} else {
    $sql = 'SELECT `id`, `name` FROM projects WHERE user_id=1';
    $result_projects = mysqli_query($link, $sql);

    $sql = 'SELECT * FROM `doingsdone`.`tasks` WHERE user_id=1';
    $result_tasks = mysqli_query($link, $sql);

    if ($result_projects) {
        $projects = mysqli_fetch_all($result_projects, MYSQLI_ASSOC);
    } else {
        $errors[] = mysqli_error($link);
    }

    if ($result_tasks) {
        $tasks = mysqli_fetch_all($result_tasks, MYSQLI_ASSOC);
    } else {
        $errors[] = mysqli_error($link);
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
    'user' => $user,
    'title' => 'Дела в порядке',
]);

print($layout_content);
