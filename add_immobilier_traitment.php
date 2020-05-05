<?php include('partials/service_bdd.php') ?>
<?php include('partials/functions.php') ?>

<?php 


// traitement photo


$imageName = "empty";

if (isFilled($_FILES['img'])) {
    $image = $_FILES['img'];
    $checkSize = checkSize($image['size'], 250);

    // Access files's detail (extension, name, type,...)
    $pathinfoData = pathinfo($image['name']);

    // Rename file 
    $fileName = $pathinfoData['filename'];
    $fileExtension = $pathinfoData['extension'];

    if (checkExtension($fileExtension) == true) {
        $newFileName = $fileName . '-' . uniqid() . '.' . $fileExtension;
        move_uploaded_file($image['tmp_name'], __DIR__ . './assets/' . $newFileName);

        $imageName = $newFileName;

    } else {
        header("Location: error.php");
    }
    
} 

$requestInsert = "INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type_id, description) VALUES(:titre, :adresse, :ville, :cp, :surface, :prix, :photo, :type_id, :description)";
$sendRequestInsert = $bdd->prepare($requestInsert);

$sendRequestInsert->execute([
    "titre" => $_POST['titre'],
    "adresse" => $_POST['adresse'],
    "ville" => $_POST['ville'],
    "cp" => intval($_POST['cp']),
    "surface" => intval($_POST['surface']),
    "prix" => $_POST['prix'],
    "photo" => $imageName,
    "type_id" => intval($_POST['type_logement']),
    "description" => $_POST['description']
]);

var_dump($requestInsert);


header("Location: index.php");


?>