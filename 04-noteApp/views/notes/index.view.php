<?php
 require basePath('views/partial/header.php');
 require basePath('views/partial/nav.php');
 require basePath('views/partial/banner.php');
?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note) : ?>
                <li class="list-disc text-blue-500 underline mb-3">
                    <a href="/note?id=<?= $note['id'] ?>">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <p class="text-blue-500 underline mt-6">
            <a href="/note-create">Create Note</a>
        </p>
    </div>
</main>

<?php  require basePath('views/partial/footer.php'); ?>
