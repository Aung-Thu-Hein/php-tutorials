<?php

require('functions.php');
require('Database.php');

$config = require('config.php');
$db = new Database($config['database'], 'root', 'newpassword');

//no prevention of SQL injection
// $posts = $db->query("SELECT * FROM posts")->fetchAll();

// foreach ($posts as $post) {
//     echo '<li>' . $post['title'] . '</li>';
// }

//prevention of SQL injection
$id = $_GET['id'];
$sql_statement = "SELECT * FROM posts where id = :id";
$post = $db->query($sql_statement, [':id' => $id])->fetchAll();

dd($post);
