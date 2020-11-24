<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', '');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/livre-or.css" />
    <title>Livre-or</title>
</head>
<body>
<header>
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
</header>
<main>
    <article>
        <?php
        $req = $bdd->prepare("SELECT commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs WHERE commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.id DESC");
        $req-> execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        ?>
    </article>

    <article>
        <?php
        foreach  ($resultat as $row)
        {
            $date=date('d/m/Y', strtotime($row["date"]));
            echo '<div class="commentaire"><p class="date">Posté le :  '.$date.'</p>'.' <p>par : '.$row['login']  . '</p>'    . '<p class="com">'. $row['commentaire']  .'</p></div>';
        }
        ?>
    </article>

    <article class="a">
        <?php
        if (isset($_SESSION['id'])) {

            echo "<a href=commentaire.php><p> Commenter votre Coiffure !</p> </a>";
            echo "<a href=deconnexion.php><p> Deconnexion</p> </a>";
        } else {
            echo "<a href=connexion.php><p>Connection </p></a>";
        }
        ?>
    </article>

</main>
<footer></footer>
</body>
</html>

