<?php include('partials/service_bdd.php') ?>
<?php include('partials/functions.php') ?>

<?php 

$requestTypesLogements = "SELECT * FROM type_logement";
$typesLogements = doRequest($bdd, $requestTypesLogements);

?>


<!-- Formulaire -->

<?php include('partials/head.php') ?>

<body>
    <form action="add_immobilier_traitment.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="titre">Nom du logement*</label><br>
            <input type="text" name="titre" id="titre" placeholder="ex Studio" required>
        </div>

        <div>
            <label for="nom-voie">Adresse du logement*</label><br>
            <input type="number" min="0" max="1000" placeholder="ex 73" required name="numero">
            <input type="text" name="nom-voie" id="nom-voie" placeholder="ex rue des champs" required>
        </div>

        <div>
            <label for="ville">Ville*</label><br>
            <input type="text" name="ville" id="ville" placeholder="ex Lyon" required>
        </div>

        <div>
            <label for="cp">Code Posta*l</label><br>
            <input type="text" name="cp" id="cp" placeholder="ex 69000" pattern="[0-9]*" required>
        </div>

        <div>
            <label for="surface">Surface du logement*</label><br>
            <input type="number" name="surface" id="surface" min=0 max=10000 placeholder="0" required>
        </div>

        <div>
            <label for="prix">Prix du logement*</label><br>
            <input type="number" name="prix" id="prix" min=0 max=300000000 placeholder="0" required>
        </div>

        <div>
            <label for="type_logement">Type de logement*</label><br>
            <select name="type_logement" id="type_logement" required>
                <option value="">Choisir un type</option>
                <?php foreach($typesLogements as $type => $value) :?>
                    <option value=<?= $value['id'] ?>><?= $value['type'] ?></option>
                <?php endforeach;?>
            </select>
        </div>
        
        <div>
            <label for="description">Courte description</label><br>
            <textarea name="description" id="description" placeholder="250 caractères maximum" maxlength="250"></textarea>
        </div>
        
        <div>
            <label for="img">Insérez une image du logement</label><br>
            <input type="file" name="img" id="img">
        </div>
        <hr>

        <small>* : champs requis</small>
        <input type="submit">
    </form>
</body>
</html>