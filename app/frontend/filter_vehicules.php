<?php

require_once __DIR__ . "/../backend/classe_AfficheVehicule.php";
require_once __DIR__ . '/../../includ/DatabaseManager.php';

$dbManager = new DatabaseManager();
$newfilterVehicule = new AfficheVehicule($dbManager);

// Vérifier les filtres envoyés via AJAX
$inputSearch = isset($_POST['search']) ? $_POST['search'] : '';
$inputModel = isset($_POST['model']) ? $_POST['model'] : '';
$inputMarque= isset($_POST['marque']) ? $_POST['marque'] : '';
$inputCategorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
     // Construction des filtres basés sur l'entrée utilisateur
     $filters = [
        'nom'  => $inputSearch,
        'nom_categorie' => $inputSearch,
        'model'         => $inputSearch,
        'marque'        => $inputSearch , 
        'nom_categorie' => $inputCategorie ,
        'model'         => $inputModel,
        'marque'        => $inputMarque

    ];
// Obtenir les résultats filtrés
$result = $newfilterVehicule ->getFiltered($dbManager , $filters); // Assurez-vous que cette méthode existe dans `classe_Vehicule`.

echo json_encode($result);
