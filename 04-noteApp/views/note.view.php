<?php
require(__DIR__ . '/partial/header.php');
require(__DIR__ . '/partial/nav.php');
require(__DIR__ . '/partial/banner.php');
?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6"><?= $note['body'] ?></p>
        <a href="/04-noteApp/notes" class="text-blue-500 underline">go back...</a>
    </div>
</main>

<?php require(__DIR__ . '/partial/footer.php'); ?>
