<?php

$page = 'ERROR';
require('partial/header.php');
require('partial/nav.php');
require('partial/banner.php');

?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold">You are not authorized to view the page</h2>
        <p class="mt-4">
            <a href="/notes" class="text-blue underline">Return to notes page</a>
        </p>
    </div>
</main>

<?php require(__DIR__ . '/partial/footer.php'); ?>
