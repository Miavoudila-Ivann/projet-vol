<?php
$bdd = new PDO(
    'mysql:host=localhost;
        dbname=vol;
        charset=utf8',
    'root',
    ''
);
session_start();
// port=3307;
$films = $bdd->query("SELECT * FROM vol ORDER BY id_vol DESC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
$isConnected = isset($_SESSION['id_utilisateur']);
$isAdmin = $isConnected && $_SESSION['role'] == 'Admin'; // On vérifie si l'utilisateur est admin
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Voyage voyage</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">Voyage voyage</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="#affiche">A l'Affiche</a></li>
                <li class="nav-item"><a class="nav-link" href="vue/Catalogue.php">Catalogue</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Rejoint Nous</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="vue/Connexion.html">Connexion</a></li>
                        <li><a class="dropdown-item" href="vue/Inscription.html">Inscription</a></li>
                    </ul>
                    <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item"><a class="nav-link" href="vue/Profile.php">Profil</a></li>
                <?php endif; ?>
                </li>
                <?php if ($isAdmin): ?>
                <li class="nav-item"><a class="nav-link" href='./vue/Administration.html'">Admin Programming</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead" style="background-image: url('assets/img/voyage.jpg'); background-size: cover; background-position: center;">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">Voyage voyage</h1>
            </div>
        </div>
    </div>
</header>
<!-- About-->
<section class="about-section text-center" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-white mb-4">Voyage Voyage</h2>
                <p class="text-white-50">
                    Les meilleures Voyages
                </p>
            </div>
        </div>
        <img class="img-fluid" src="assets/img/voyage.jpg" alt="..." />
    </div>
</section>
<!-- Projects-->
<section class="projects-section bg-light" id="projects">
    <div class="container px-4 px-lg-5">
        <!-- Featured Project Row-->
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/voyage.jpg" height="600" width="900" alt="..." /></div>
            <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left">
                    <h4>Nombre de place</h4>
                    <p class="text-black-50 mb-0">Voyage voyage</p>
                </div>
            </div>
        </div>
        <!-- Project One Row-->
        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" src="assets/img/voyage.jpg" alt="..." /></div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Voyage Voyage</h4>
                            <p class="mb-0 text-white-50">Voyage Voyage propose des voyages a des prix exceptionnelle pour ceux qui souhaitrerais voyager pour pas chère. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project Two Row-->
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" src="assets/img/cinema-snack-bar-stockcake.jpg" alt="..." /></div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4 class="text-white">Pop corn</h4>
                            <p class="mb-0 text-white-50">Movie room vous propose aussi des Pop Corn, boisson et plein d'autres chose si vous souhaiter grignoter pendant le film.rr</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- A L'Affiche-->
<section class="py-1" id="affiche">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-3 gx-lg-4 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
            <?php foreach ($vols as $vols){?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Image du film -->
                        <img class="card-img-top" src="<?= htmlspecialchars($vols['image']) ?>" alt="<?= htmlspecialchars($vols['nom_film']) ?>" />
                        <!-- Détails du film -->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder"><?= htmlspecialchars($vols['nom_film']) ?></h5>
                                <div class="text-center">
                                    <?= htmlspecialchars($vols['genre']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Contact-->
<section class="contact-section bg-black">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Address</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50">5 AV du Général de Gaulle, 93440 Dugny</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Email</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50"><a href="#!">movieroom@gmail.com</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-mobile-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Phone</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50">+33 199 999 999</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social d-flex justify-content-center">
            <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5"></div></footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="assets/js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>
</html>
