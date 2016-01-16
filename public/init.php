<?php

use BapCat\Persist\Drivers\Local\LocalDriver;
use BapCat\Phi\Phi;
use BapCat\Remodel\Registry;
use BapCat\Remodel\EntityDefinition;
use BapCat\Session\DatabaseSessionServiceProvider;
use BapCat\Session\SessionManager;

use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\MySqlConnection;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/DoItUserAuthorizer.php';



$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$connection = new MySqlConnection($pdo, 'test');
$connection->setFetchMode(PDO::FETCH_ASSOC);

$ioc = Phi::instance();
$ioc->bind(ConnectionInterface::class, $connection);

// Grab filesystem directories
$persist = new LocalDriver(__DIR__ . '/..');
$cache = $persist->getDirectory('/cache');

$registry = new Registry($ioc, $cache);



$sp = new DatabaseSessionServiceProvider($ioc, $registry);
$sp->register();
$sp->boot();



$session = $ioc->make(SessionManager::class);
$session->open();

$auth = new DoItUserAuthorizer($session);
