<?php include('partials/service_bdd.php') ?>
<?php include('partials/functions.php') ?>

<?php 



if(isset($_GET['id'])) {
    $urlId = (int) $_GET['id'];
    $requestSingleLogement = "SELECT * FROM logement INNER JOIN type_logement ON logement.type_id = type_logement.id WHERE logement.id_logement = :id";
    $sendRequestSingleLogement = $bdd->prepare($requestSingleLogement);
    $sendRequestSingleLogement->execute(['id' => $urlId]);
    
    $logement = $sendRequestSingleLogement->fetch(PDO::FETCH_ASSOC);

} else {
    header("Location: error.php");
}

?>


<!-- page html -->

<?php include('partials/head.php') ?>

<body>
    <figure><img src="./assets/<?= $logement['photo'] ?>" alt="photo"></figure>
    <header>
        <h2><?= $logement['titre'] ?></h2>
        <p><?= $logement['type'] ?></p>
        <p><?= $logement['adresse'] ?>, <?= $logement['cp'] ?>, <?= $logement['ville'] ?></p>
    </header>

    <hr>

    <p><?= $logement['surface'] ?> m2</p>
    <p><?= $logement['prix'] ?> €</p>

    <hr>
    
    <h3>Description</h3>
    <p><?= $logement['description'] ?></p>

    <button><a href="index.php">Retour au catalogue</a></button>
</body>
</html>