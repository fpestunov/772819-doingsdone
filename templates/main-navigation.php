<nav class="main-navigation">
    <ul class="main-navigation__list">
        <?php
        foreach ($projects as $project):
            $params['pid'] = $project['id'];

            $scriptname = "index.php";
            $query = http_build_query($params);
            $url = "/{$scriptname}?{$query}";

            $item_active = ($project['id'] === $query_pid) ? ' main-navigation__list-item--active' : '';
        ?>
            <li class="main-navigation__list-item<?=$item_active;?>">
                <a class="main-navigation__list-item-link" href="<?=$url;?>"><?=htmlspecialchars($project['name']);?></a>
                <span class="main-navigation__list-item-count"><?=getNumberOfTasks($tasks, $project['id']);?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
