<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="inscription.css" />
    <title>Inscription</title>
</head>
<body>
<header>
<nav>
    <img src="images/kiri.png" alt="kirikou" class="img">
</nav>
</header>
<main>
    <article>
        <!--Debut form -->
        <form method="post" action="">
            <h1>Inscris-toi !</h1>
                <div class="formflex">
                    <div>
<!--                        <label for="login">Login</label>-->
                        <input type="text" name="login" id="login" placeholder="votre login" required>
                    </div>

                    <div>
<!--                        <label for="password">Mot de passe</label>-->
                        <input type="password" name="password" id="password" placeholder="Votre mot de passe " required>
                    </div>
                    <div>
<!--                        <label for="password">Confirmation du mot de passe</label>-->
                        <input type="password" name="password" id="password" placeholder="Confirmation du mot de passe " required>
                    </div>
                    <input type="submit" name="submit" value="Inscription">
                </div>
        </form>
        <!--End form -->
    </article>
</main>
<footer> <nav class="nav">
        <a href="/">Accueil</a>
        <a href="/">Inscription</a>
        <a href="/">Connexion</a>
    </nav>
</footer>
</body>
</html>