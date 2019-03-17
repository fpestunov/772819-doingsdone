<?php
$projects = [
    'Входящие',
    'Учеба',
    'Работа',
    'Домашние дела',
    'Авто',
];

$tasks = [
    ['title' => 'Собеседование в IT компании', 'date' => '01.12.2019', 'category' => $projects[2], 'isCompleted' => 0],
    ['title' => 'Выполнить тестовое задание', 'date' => '25.12.2019', 'category' => $projects[2], 'isCompleted' => 0],
    ['title' => 'Сделать задание первого раздела', 'date' => '21.12.2019', 'category' => $projects[1], 'isCompleted' => 1],
    ['title' => 'Встреча с другом', 'date' => '22.12.2019', 'category' => $projects[0], 'isCompleted' => 0],
    ['title' => 'Купить корм для кота', 'date' => '15.03.2019', 'category' => $projects[3], 'isCompleted' => 0],
    ['title' => 'Заказать пиццу', 'date' => '17.03.2019', 'category' => $projects[4], 'isCompleted' => 0],
];

$user = [
    'name' => 'Константин',
];
