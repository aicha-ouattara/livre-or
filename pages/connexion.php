<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', '');

if(isset($_POST['submit']))
{
    $login = htmlspecialchars($_POST['login']);
    $password = ($_POST['password']);

    if (!empty($login) AND !empty($password))
    {
        $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? ");
        $req->execute(array($login));
        $users = $req->rowCount();

        if($users == 1)
        {
            $userinfo = $req->fetch();
            $_SESSION["id"] = $userinfo["id"];
            $_SESSION["login"] = $userinfo["login"];
            $_SESSION["password"] = $userinfo["password"];

            $verify = password_verify($password, $userinfo['password']);

            if ($verify)
            {
                // Verification if user is an admin or an user
                header("Location:profil.php?id=" . $_SESSION["id"]);
            }
        }
            else
            {
            $error = "Le login ou le mot de passe est incorrect.";
            }
    }
        else
        {
            $error = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }

    }
    else
    {
        $error = "Tous les champs ne sont pas remplis !";
    }

$bdd = null;
?>
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
            <?php
            if(isset($error))
            {
                echo $error;
            }
            ?>
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
