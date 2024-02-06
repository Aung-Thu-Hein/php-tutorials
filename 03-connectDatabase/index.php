<?php

require('functions.php');
require('Database.php');

$config = require('config.php');
$db = new Database($config['database'], 'root', 'newpassword');

$posts = $db->query("SELECT * FROM posts")->fetchAll();

foreach ($posts as $post) {
    echo '<li>' . $post['title'] . '</li>';
}
