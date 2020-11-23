<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', '');

    $req = $bdd->prepare("SELECT commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs WHERE commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.id DESC");
    $req-> execute();
    $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

foreach  ($resultat as $row)
{
    echo $row['date'] . ' '.$row['commentaire'] . ' ' .$row['login'] ."<br>";

}

if (isset($_SESSION['id'])) {

    echo "<a href=commentaire.php><p> Commenter votre Coiffure !</p> </a>";
} else {
    echo "<a href=connexion.php><p>Connection </p></a>";
}


?>