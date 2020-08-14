<?php

use app\core\Application;

require_once __DIR__.'/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'modelClasses' => [
        'userClass' => \App\Entity\User::class,
        'authorClass' => \app\models\Author::class,
        'adminClass' => \app\models\Admin::class,
        'commentClass' => \app\models\Comment::class
    ],
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();
