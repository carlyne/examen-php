<?php include('partials/service_bdd.php') ?>
<?php include('partials/functions.php') ?>

<?php 


//Verification image
$imageName = "empty";

if (isFilled($_FILES['img'])) {
    $image = $_FILES['img'];
    $checkSize = checkSize($image['size'], 1800000);
    $pathinfoData = pathinfo($image['name']);

 
    $fileName = $pathinfoData['filename'];
    $fileExtension = $pathinfoData['extension'];

    if (checkExtension($fileExtension) == true) {
        $newFileName = $fileName . '-' . $_SERVER['REQUEST_TIME'] . '.' . $fileExtension;
        move_uploaded_file($image['tmp_name'], __DIR__ . './assets/' . $newFileName);

        $imageName = $newFileName;

    } else {
        header("Location: error.php");
    }
    
} 


// Creation adresse 
$numero = $_POST['numero'];
$nomVoie = $_POST['nom-voie'];

$adresse = $numero . " " . $nomVoie;

var_dump($adresse);


// Envoie requête
$requestInsert = "INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type_id, description) VALUES(:titre, :adresse, :ville, :cp, :surface, :prix, :photo, :type_id, :description)";
$sendRequestInsert = $bdd->prepare($requestInsert);

$sendRequestInsert->execute([
    "titre" => $_POST['titre'],
    "adresse" => $adresse,
    "ville" => $_POST['ville'],
    "cp" => intval($_POST['cp']),
    "surface" => intval($_POST['surface']),
    "prix" => $_POST['prix'],
    "photo" => $imageName,
    "type_id" => intval($_POST['type_logement']),
    "description" => $_POST['description']
]);


header("Location: index.php");


?>