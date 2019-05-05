<?php

require_once('functions.php');
require_once('data.php');
require_once('init.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
$projects = [];

if (!$link) {
    $error = mysqli_connect_error();
    $page_content = include_template('error.php', ['error' => $error]);
} else {
    $sql = 'SELECT `id`, `name` FROM projects WHERE user_id=1';
    $result = mysqli_query($link, $sql);

    if ($result) {
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $page_content = include_template('index.php', [
            'show_complete_tasks' => $show_complete_tasks,
            'tasks' => $tasks,
        ]);
    } else {
        $error = mysqli_error($link);
        $page_content = include_template('error.php', ['error' => $error]);
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
