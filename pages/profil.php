<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', '');

if (isset($_SESSION["id"]))
{
    if(isset($_POST['newlogin']) AND !empty($_POST['newlogin']) AND $_POST['newlogin'] != $userinfo['login']) {
        $newlogin = htmlspecialchars($_POST['newlogin']);
        $req = $bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
        $req->execute(array($newlogin, $_SESSION['id']));
    }
    if(isset($_POST['newpassword']) AND !empty($_POST['newpassword']) AND $_POST['newpassword'] != $userinfo['password']) {
        $newpassword = ($_POST['newpassword']);
        $password3 = password_hash( $newpassword, PASSWORD_BCRYPT, array('cost' => 10));
        $req = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
        $req->execute(array($password3, $_SESSION['id']));
    }

    $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ? ");
    $req->execute(array($_SESSION["id"]));
    $userinfo = $req->fetch();


    $bdd = null;
}
?>
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
            <h1><?php echo $userinfo['login']; ?>Modifie ton profil et/ou dirige toi vers notre livre d'or !</h1>
            <div class="formflex">
                <div>
                    <!-- <label for="login">Login</label>-->
                    <input type="text" name="newlogin" id="login" placeholder="votre login">
                </div>

                <div>
                    <!--<label for="password">Mot de passe</label>-->
                    <input type="password" name="newpassword" id="password" placeholder="Votre mot de passe ">
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
        <a href="commentaire.php">commentaires</a>
    </nav>
</footer>
</body>
</html>
