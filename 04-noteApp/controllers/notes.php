<?php

$config = require('config.php');
$db = new Database($config['database'], 'root', 'newpassword');

$page = 'My Notes';

$notes = $db->query("select * from notes")->fetchAll();

require('./views/notes.view.php');
