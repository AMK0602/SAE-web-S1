<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Association Fatigue Chronique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="<?php echo"./assets/css/" .  basename($_SERVER['PHP_SELF'], '.php') ?>.css">
</head>
<body>
<!-- HEADER -->
<header class="main-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img src="./assets/images/asfc_logo.png" alt="Logo" class="logo-img navbar-brand">
            <button class="navbar-toggler col-sm-12" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mb-lg-0 mb-3">
                    <li class="nav-item"><a class="nav-link text-light text-center" href="./index.php">Association</a></li>
                    <li class="nav-item"><a class="nav-link text-light text-center" href="./about-us.php">S'informer</a></li>
                    <li class="nav-item"><a class="nav-link text-light text-center" href="#">Nos actions</a></li>
                    <li class="nav-item"><a class="nav-link text-light text-center" href="#">Contact</a></li>
                    <li><a href="./donate.php" class="btn bg-light rounded-pill" id="btn-don">Faire un Don</a></li>
                </ul>

                <form class="d-flex mb-3 mb-lg-0">
                    <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">🔍</button>
                </form>
            </div>
        </div>
    </nav>
</header>