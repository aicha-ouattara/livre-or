<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', '');

if(isset($_SESSION["id"]))
{
    $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ? ");
    $req->execute(array($_SESSION["id"]));
    $userinfo = $req->fetch();

    if(isset($_POST["submit"]))
    {
        if(!empty($_POST["description"]) AND isset($_POST["description"]))
        {
            $id_utilisateur = $userinfo["id"];
            $description= htmlspecialchars($_POST["description"]);
            $date=date('Y-m-d h:i:s');

            $req = $bdd->prepare('INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?,?,?)');
            $req->execute(array( $description, $id_utilisateur,$date));
            $error ="Vous avez bien commenté";
        }
        else
        {
            $error ="Vous n'avez pas laissez de commentaires";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/commentaire.css" />
    <title>Commentaires</title>
</head>
<body>
<header>
    <nav>
        <img src="../images/prof.png" alt="kirikou" class="img">
        <img src="../images/connex.png" alt="kirikou" class="img1">
    </nav>
</header>
<main>
    <article>
        <!--Debut form -->
        <form method="post" action="">
            <h1><?php echo "<span>".$userinfo['login']."</span>"; ?> Vous avez aimé votre coiffure ? laissez-nous votre avis !</h1>
            <div class="formflex">
                <div>
                    <!--<label for="description">Commentaires</label>-->
                    <textarea id="description" name="description" rows="8" cols="60" placeholder="Ecris !"  minlength="3" maxlength="255" ></textarea>
                </div>

                <input type="submit" name="submit" value="Commentes !">
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
    </nav>
</footer>
</body>
</html>
