<?php
$paths = array(
    "module/Patrimonio/src/Entity"
);

// Tells Doctrine what mode we want
$isDevMode = true;

// Doctrine connection configuration
$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'patrimonio'
);
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
require __DIR__ . '/bootstrap.php';

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
return ConsoleRunner::createHelperSet($entityManager);