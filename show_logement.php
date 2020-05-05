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
    <header class="show-banner">
        <img src="./assets/<?= $logement['photo'] ?>" alt="photo"></figure>
        <h1><?= $logement['titre'] ?></h1>
    </header>

    <section class="show-presentation">
        <p><?= $logement['type'] ?></p>
        <p><?= $logement['adresse'] ?>, <?= $logement['cp'] ?>, <?= $logement['ville'] ?></p>
        <p><?= $logement['surface'] ?> m2</p>
        <p><?= $logement['prix'] ?> €</p>    
    </section>

    <section class="show-description">
        <h2>Description</h2>
        <p><?= $logement['description'] ?></p>
        <button><a href="index.php">Retour au catalogue</a></button>
    </section>

</body>
</html>