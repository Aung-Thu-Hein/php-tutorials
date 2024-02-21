<?php
require(__DIR__ . '/partial/header.php');
require(__DIR__ . '/partial/nav.php');
require(__DIR__ . '/partial/banner.php');
?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note) : ?>
                <li class="list-disc text-blue-500 underline mb-3"><a href="/04-noteApp/note?id=<?= $note['id'] ?>"><?= $note['body'] ?></li></a>
            <?php endforeach; ?>
        </ul>
    </div>
</main>

<?php require(__DIR__ . '/partial/footer.php'); ?>
