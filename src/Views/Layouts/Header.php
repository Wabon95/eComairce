<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Assets/css/style.css">
    <title><?= $page_title ?></title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">eComairce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">

            <!-- Left Menu -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/products">Catalogue</a>
                </li>
                <?php if ($connectedUser && $connectedUser->getType() === 1): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-danger" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administration</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/products/add">Ajouter un produit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
                <?php endif; ?>
            </ul>

            <!-- Right Menu -->
            <ul class="navbar-nav d-flex">
                <?php if ($connectedUser): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Bonjour <?= $connectedUser->getNickname() ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Panier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Se déconnecter</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Connexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

<?php
    if (isset($flashMessages)) {
        foreach ($flashMessages as $value) {
            echo '<div class="alert alert-' .$value['type']. ' alert-dismissible fade show" role="alert">' .$value['message']. '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
?>