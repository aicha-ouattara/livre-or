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
    <nav>
        <a href="../index.php">Accueil</a>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
        <a href="livre-or.php">Livre or</a>
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

    <article class="commentaire">
        <?php
        foreach  ($resultat as $row)
        {
            $date=date('d/m/Y', strtotime($row["date"]));
            echo 'posté le :' .$date.'<br />'.' par '.$row['login']  . '<br />'    . $row['commentaire']  ."<br>";
        }
        ?>
    </article>

    <article>
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

