<?php
ob_start(); 
session_start() ;
    if($_SESSION['role']!="client"){ //client
      header("location: erreur.php") ;
      exit ;
    }
    else if($_SESSION['role'] =="client"){
       $id_user = $_SESSION['id'] ; 
    }
$title = "Vos réservations, votre histoire : Plongez dans vos prochaines escapades !";
require "../backend/classe_activite.php";
require "../backend/class_reservation.php";
require_once __DIR__ . '/../../includ/DB.php';
require_once __DIR__ . '/../../includ/DatabaseManager.php';



if(isset($_POST["changeStatut"])){
    $id_reservation = intval($_POST["id_reservation"]);
    $newStatut = $_POST["changeStatut"];
    $reservation = new Reservation() ; 
    $resutlt = $reservation->changeStatut($id_reservation , $newStatut);

}
if(isset($_POST["changeActivity"])){
    $id_reservation = intval($_POST["id_reservation"]);
    $newidActivite = $_POST["changeActivity"];
    $reservation = new Reservation() ; 
    $resutlt = $reservation->changeActivite($id_reservation , $newidActivite);

}

afficher();
function afficher(){
  
    $dbManager = new DatabaseManager();
    $newActivite = new Activite($dbManager , 0);
    $activites = $newActivite->getAll();

    $conn= Database :: getInstance() ; 
    $db = $conn->getConnection() ; 
    $result = Reservation::affichertt( $db);

    if ($activites) {
        echo "<div class='listeTable'><table border='1'><thead>";
        echo "<tr><th>ID</th><th>véhicule</th><th>Date de réservation</th><th>Statut</th><th>Action</th></tr></thead><tbody>";

        $reservation = Reservation::affichertt($db);

        foreach ($reservation as $objet) {
            $id = $objet->id_reservation;
            echo "<tr>
                    <td>{$objet->id_reservation}</td>
                    <td>
                       {$objet->id_vehicule}
                    </td>
                    <td>{$objet->date_reservation}</td>
                    <td>{$objet->statut}</td>
                    <td class='flex align-center justify-center'>
                        <form action='' method='post'>
                            <input type='hidden' name='id_reservation' value='{$objet->id_reservation}'>
                            <button type='submit' name='cancel' value='$id'><span class='text-red-400 cursor-pointer material-symbols-outlined'>cancel</span></button>
                        </form>
                    </td>
                </tr>";
        }
        echo "</tbody></table></div>";
    }
}
?>

<?php
$content = ob_get_clean(); 
include 'layout.php'; 
?>

