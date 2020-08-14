<?php
declare(strict_types=1);

use app\controllers\SiteController;
use app\controllers\StaticPageController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'modelClasses' => [
      'userClass' => \app\models\User::class,
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


$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);
//$app->router->post('/', [SiteController::class, 'home']);
$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/register', [SiteController::class, 'register']);
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->post('/login', [SiteController::class, 'login']);
$app->router->get('/logout', [SiteController::class, 'logout']);
$app->router->post('/logout', [SiteController::class, 'logout']);
$app->router->get('/articles', [SiteController::class, 'articles']);
$app->router->post('/articles', [SiteController::class, 'articles']);
$app->router->get('/article-detail-page', [SiteController::class, 'article']);
$app->router->post('/article-detail-page', [SiteController::class, 'article']);
$app->router->get('/create-new-article', [SiteController::class, 'createArticle']);
$app->router->post('/create-new-article', [SiteController::class, 'createArticle']);
$app->router->get('/legal-notice', [StaticPageController::class, 'showLegalNotice']);
$app->router->post('/legal-notice', [StaticPageController::class, 'showLegalNotice']);

$app->run();


