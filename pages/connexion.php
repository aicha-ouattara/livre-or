<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/connexion.css" />
    <title>connexion</title>
</head>
<body>
<header>
    <nav>
        <img src="../images/connex.png" alt="kirikou" class="img">
    </nav>
</header>
<main>
    <article>
        <!--Debut form -->
        <form method="post" action="">
            <h1>Connecte-toi !</h1>
            <div class="formflex">
                <div>
                    <!-- <label for="login">Login</label>-->
                    <input type="text" name="login" id="login" placeholder="votre login" required>
                </div>

                <div>
                    <!--<label for="password">Mot de passe</label>-->
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe " required>
                </div>

                <input type="submit" name="submit" value="Connexion">
            </div>
        </form>
        <!--End form -->
    </article>
</main>
<footer>
    <nav class="nav">
        <a href="../index.php">Accueil</a>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
    </nav>
</footer>
</body>
</html>
