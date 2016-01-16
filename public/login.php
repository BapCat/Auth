<?php

use BapCat\Values\Email;
use BapCat\Values\Password;

require __DIR__ . '/init.php';

$email = new Email('butts@butts.butts');
$pass  = new Password('buttsbutts');

$auth->login($email, $pass);
