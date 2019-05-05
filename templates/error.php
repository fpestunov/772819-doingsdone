<main class="content__main">
    <h2 class="content__main-heading">Ошибка</h2>

    <?php foreach ($errors as $error): ?>
        <p class="error-message"><?= $error; ?></p>
    <?php endforeach; ?>
</main>
