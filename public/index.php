<?php

require __DIR__ . '/init.php';

var_dump($_SESSION);

if($auth->isAuthed()) {
  echo '<a href="logout.php">Log out</a>';
} else {
  echo '<a href="login.php">Log in</a>';
}
