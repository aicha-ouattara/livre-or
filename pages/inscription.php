<?php
$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', ''); //Database connexion

if(isset($_POST["submit"]))
{
    if(!empty($_POST["login"]) AND !empty($_POST["password"]) AND !empty($_POST["password2"])) //Verification if the form is not empty
    {
        $login = htmlspecialchars($_POST["login"]);
        $password = ($_POST["password"]);
        $password2 = ($_POST["password2"]);

        if(isset($_POST['login'])) //If login ...
        {
            $req = $bdd ->prepare('SELECT id FROM utilisateurs WHERE login = ?');  //Request for the verification of login
            $req->execute(array($login));
            $user = $req->rowCount();

            if($user==0) //If no similar login
            {
                if($password == $password2) //If same password
                {
                    $password3 = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10)); //Password security
                    $req = $bdd->prepare("INSERT INTO utilisateurs(login, password) VALUES(?, ?)"); //Insert to the database
                    $req->execute(array($login, $password3));
                    header('Location:connexion.php');
                }
                else
                {
                    $error = "Les mots de passe sont identiques !";
                }
            }
            else
            {
                $error = "Votre login existe deja !";
            }
        }
    }
    else
    {
        $error = "Tous les champs ne sont vides !";
    }
}
$bdd = null;
?>

<!--Debut Display-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/inscription.css" />
    <title>Inscription</title>
</head>
<body>
<header>
<nav>
    <img src="../images/kiri.png" alt="kirikou" class="img">
</nav>
</header>
<main>
    <article>
        <!--Debut form -->

        <form method="post" action="inscription.php">
            <h1>Inscris-toi !</h1>
                <div class="formflex">
                    <div>
                        <!--<label for="login">Login</label>-->
                        <input type="text" name="login" id="login" placeholder="votre login" required  minlength="3" maxlength="255" >
                    </div>

                    <div>
                        <!--<label for="password">Mot de passe</label>-->
                        <input type="password" name="password" id="password" placeholder="Votre mot de passe " required  minlength="3" maxlength="255" >
                    </div>
                    <div>
                        <!--<label for="password2">Confirmation du mot de passe</label>-->
                        <input type="password" name="password2" id="password2" placeholder="Confirmation du mot de passe " required  minlength="3" maxlength="255" >
                    </div>
                    <input type="submit" name="submit" value="Inscription">
                </div>
            <div class="php">
            <?php
            if(isset($error))
            {
                echo $error;
            }
            ?>
            </div>
        </form>

        <!--End form -->
    </article>
</main>
<footer>
    <nav class="nav">

        <!--Nav PHP-->
        <a href='../index.php'>Accueil</a>
        <a href='livre-or.php'>Livre d'or</a>
        <?php if (isset($_SESSION['id'])) { ?>
            <a href="profil.php?id=" <?php $_SESSION['id'] ?>>Profil</a>
            <a href="commentaire.php?id=" <?php $_SESSION['id'] ?>>Commentaires</a>
            <?php
        } else { ?><a href="inscription.php">Inscription</a><?php } ?>

        <?php if (isset($_SESSION['id'])) { ?>
            <a href="deconnexion.php">Deconnexion</a>
        <?php } else { ?>
            <a href="connexion.php">Connexion</a>
        <?php } ?>
        <!--Nav PHP-->

    </nav>
</footer>
</body>
</html>

<!--End Display-->
