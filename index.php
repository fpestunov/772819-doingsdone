<?php

require_once('functions.php');
require_once('data.php');

//echo var_dump(strtotime('now'));
//
//var_dump(isImportantTask('нет'));

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

$page_content = include_template('index.php', [
    'show_complete_tasks' => $show_complete_tasks,
    'tasks' => $tasks,
]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'projects' => $projects,
    'tasks' => $tasks,
    'user' => $user,
    'title' => 'Дела в порядке',
]);

print($layout_content);
