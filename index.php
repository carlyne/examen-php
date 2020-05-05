<?php include('partials/service_bdd.php') ?>
<?php include('partials/functions.php') ?>

<?php 

$requestLogements = "SELECT * FROM logement INNER JOIN type_logement ON logement.type_id = type_logement.id";
$logements = doRequest($bdd, $requestLogements);

?>


<!-- page html -->

<?php include('partials/head.php') ?>

<body>
    
<h1>Nos logements</h1>

<main>
    <?php foreach($logements as $logement => $details) : ?>
        <div class="card">
            <figure><img src="./assets/<?= $details['photo'] ?>" alt="photo"></figure>

            <header>
                <h2><?= $details['titre'] ?></h2>
                <p><?= $details['type'] ?></p>
                <p><?= $details['adresse'] ?>, <?= $details['cp'] ?>, <?= $details['ville'] ?></p>
            </header>

            <hr>

            <div class="content">
                <p><?= $details['surface'] ?> m2</p>
                <p><?= $details['prix'] ?> €</p>
                
                <h3>Description</h3>
                <p><?= $details['description'] ?></p>
            </div>

            <button><a href="show_logement.php?id=<?= $details['id_logement'] ?>">Voir le logement</a></button>
        </div>
    <?php endforeach; ?>
</main>

<button class="add"><a href="add_immobilier.php">Ajouter un logement</a></button>


</body>
</html>