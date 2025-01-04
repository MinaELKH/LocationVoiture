<?php

require_once __DIR__ . "/../backend/classe_AfficheVehicule.php";
require_once __DIR__ . '/../../includ/DatabaseManager.php';

$dbManager = new DatabaseManager();
$newfilterVehicule = new AfficheVehicule($dbManager);

// Vérifier les filtres envoyés via AJAX
$inputSearch = isset($_POST['search']) ? $_POST['search'] : '';

// Obtenir les résultats filtrés
$result = $newfilterVehicule ->getFiltered($dbManager , $inputSearch); // Assurez-vous que cette méthode existe dans `classe_Vehicule`.

echo json_encode($result);
