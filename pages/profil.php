<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/profil.css" />
    <title>Profil</title>
</head>
<body>
<header>
    <nav>
        <img src="../images/prof.png" alt="kirikou" class="img">
    </nav>
</header>
<main>
    <article>
        <!--Debut form -->
        <form method="post" action="">
            <h1>Modifie ton profil et/ou dirige toi vers notre livre d'or !</h1>
            <div class="formflex">
                <div>
                    <!-- <label for="login">Login</label>-->
                    <input type="text" name="login" id="login" placeholder="votre login" required>
                </div>

                <div>
                    <!--<label for="password">Mot de passe</label>-->
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe " required>
                </div>

                <input type="submit" name="submit" value="Modifie">
            </div>
        </form>
        <!--End form -->
    </article>
</main>
<footer>
    <nav class="nav">
        <a href="../">Accueil</a>
        <a href="livre-or.php">Livre d'or</a>
    </nav>
</footer>
</body>
</html>
