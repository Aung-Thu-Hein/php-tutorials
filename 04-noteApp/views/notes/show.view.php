<?php
require basePath('views/partial/header.php');
require basePath('views/partial/nav.php');
require basePath('views/partial/banner.php');
?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6"><?= htmlspecialchars($note['body']) ?></p>
        <a href="/notes" class="text-blue-500 underline">go back...</a>

        <form method="POST" class="mt-6">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button type="submit" class="text-red-600 border rounded-md p-1">Delete</button>
        </form>
    </div>
</main>

<?php require basePath('views/partial/footer.php'); ?>