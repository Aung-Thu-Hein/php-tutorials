<?php
require basePath('views/partial/header.php');
require basePath('views/partial/nav.php');
require basePath('views/partial/banner.php');
?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h2>Welcome <?= $_SESSION['user']['email'] ?? 'Guest'  ?></h2>
    </div>
</main>

<?php require basePath('views/partial/footer.php'); ?>
