<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css" />
    <title>Accueil</title>
</head>
<body>
<header>
    <nav class="nav">

        <!--Nav PHP-->
        <a href='index.php'>Accueil</a>
        <a href='pages/livre-or.php'>Livre d'or</a>
        <?php if (isset($_SESSION['id'])) { ?>
            <a href="pages/profil.php?id=" <?php $_SESSION['id'] ?>>Profil</a>
            <a href="pages/commentaire.php?id=" <?php $_SESSION['id'] ?>>Commentaires</a>
            <?php
        } else { ?><a href="pages/inscription.php">Inscription</a><?php } ?>

        <?php if (isset($_SESSION['id'])) { ?>
            <a href="pages/deconnexion.php">Deconnexion</a>
        <?php } else { ?>
            <a href="pages/connexion.php">Connexion</a>
        <?php } ?>
        <!--Nav PHP-->

    </nav>
</header>
<main>
    <article>
        <h1><span>Barber Shop</span> <br>Chez Kotoko</h1>
        <section class="flex-container">

            <article class="flexrow-container">
                <div>
                <img src="images/baraccuda.jpg" alt="kirikou" class="image1">
                    <h3>Coiffure 1</h3>
                </div>
                <div>
                <img src="images/bazoka.jpg" alt="kirikou" class="image2">
                <h3>Coiffure 2</h3>
                </div>
                <div>

                <img src="images/boing.jpg" alt="kirikou" class="image3">
                <h3>Coiffure 3</h3>
                </div>
                <div>

                <img src="images/kirikou.jpg" alt="kirikou" class="image4">
                <h3>Coiffure 4</h3>
                </div>
            </article>
            <article class="txtderoulant">
                <h2>Connectez-vous ou inscrivez-vous pour nous laisser des commentaires !</h2>
            </article>
            <article class="flexrow-container">
                <div>
                    <img src="images/lumunba.jpg" alt="kirikou" class="image1">
                    <h3>Coiffure 5</h3>
                </div>
                <div>
                    <img src="images/minidread.jpg" alt="kirikou" class="image2">
                <h3>Coiffure 6</h3>
                </div>
                <div>

                    <img src="images/yorobo.jpg" alt="kirikou" class="image3">
                <h3>Coiffure 7</h3>
                </div>
                <div>

                    <img src="images/playboy.jpg" alt="kirikou" class="image4">
                <h3>Coiffure 8</h3>
                </div>
            </article>


        </section>
    </article>

</main>
<footer></footer>
</body>
</html>