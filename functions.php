<?php
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

function getNumberOfTasks(array $tasks, string $category): int
{
    $numberOfTasks = 0;
    foreach ($tasks as $task) {
        if ($task['category'] === $category) {
            $numberOfTasks += 1;
        }
    }
    return $numberOfTasks;
}
