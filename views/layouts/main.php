<?php
use app\core\Application;
//navbar(home, new article, legal notice, left side login/logout) + logo(link auf overwiev), blogname near logo
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="/"><img class="img-thumbnail" alt="Blogimage" src="/Client/public/Blog_pic.png" width="100" height="50"></a>
    <a class="navbar-brand" href="/">Blog Name</a>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/articles">Übersicht<span class="sr-only">(current)</span></a>
            </li>
            <?php if (!Application::isGuest()):?>
            <li class="nav-item active">
                <a class="nav-link" href="create-new-article">Neuer Eintrag<span class="sr-only">(current)</span></a>
            </li>
            <?php endif; ?>
            <li class="nav-item active">
                <a class="nav-link" href="/legal-notice">Impressum<span class="sr-only">(current)</span></a>
            </li>
        </ul>
            <?php if (Application::isGuest()):?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/login">Login<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/logout">Logout<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            <?php endif; ?>
    </div>
</nav>
<div class="container">
    <?php if(Application::$app->session->getFlash('success')): ?>
        <div class="alert alert-success">
            <?php echo Application::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    {{content}}
</div>
</body>
</html>
