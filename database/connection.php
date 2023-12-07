<?php


require __DIR__ . '/../vendor/autoload.php'; 

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();



  $conn = mysqli_connect($_ENV['hostname'], $_ENV['username'], $_ENV['password'], $_ENV['database']);