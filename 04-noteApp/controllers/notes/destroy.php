<?php

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database'], 'root', 'newpassword');

$current_user_id = 1;

$note = $db->query("select * from notes where id = :id", ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] == $current_user_id);

$db->query("delete from notes where id = :id", ['id' => $_POST['id']]);

header('location: /notes');
exit();
