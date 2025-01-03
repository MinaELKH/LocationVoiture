<?php
ob_start();
//session_start() ;
// if ($_SESSION['id_role'] != 2 ) { // client ou visiteur
//     header("location: erreur.php");
//     exit;
// } else if ( $_SESSION['id_role'] == 2) { // admin ou superAdmin
//     $id_user = $_SESSION['id'];
// }
SESSION['id_user']=15;
$title = "Gestion des réservations";
require __DIR__ . "/../backend/classe_AfficheReservation.php";

require_once __DIR__ . '/../../includ/DB.php';
require_once __DIR__ . '/../../includ/DatabaseManager.php';

$dbManager = new DatabaseManager(Database::getInstance()->getConnection());

if (isset($_POST["archive"])) {
    $id_reservation = intval($_POST["archive"]);
    $reservation = new Reservation($dbManager , $id_reservation);
    $reservation->archiveReservation();
}

if (isset($_POST["changeStatut"])) {
    $id_reservation = intval($_POST["id_reservation"]);
    $newStatut = $_POST["changeStatut"];
    $reservation = new Reservation($dbManager ,$id_reservation );
    $result = $reservation->changeStatut( $newStatut);
}

if (isset($_POST["changeVehicule"])) {
    $id_reservation = intval($_POST["id_reservation"]);
    $newIdVehicule = $_POST["changeVehicule"];
    $reservation = new Reservation($dbManager);
    $result = $reservation->changeVehicule($id_reservation, $newIdVehicule);
}

//afficher($dbManager);
// function afficher($dbManager)
// {$reservations = (new Reservation($dbManager))->getAll();
//     if (!empty($reservations)) {
//         echo "<div class='listeTable'><table border='1'><thead>";
//         echo "<tr>
//                     <th>Réference</th>
//                     <th>Véhicule</th>
//                     <th>Date de réservation</th>
//                     <th>Date début</th>
//                     <th>Date fin</th>
//                     <th>Statut</th>
//                     <th>Action</th>
//                </tr></thead><tbody>";

//         foreach ($reservations as $objet) {
//             $id = $objet->id_reservation;
//             $veh = (new vehicule($dbManager ,$objet->id_vehicule))-> getAttributById(['nom' , 'marque' , 'model']);
//             $client = (new client($dbManager ,$objet->id_user))-> getAttributById(['nom']);
//             echo "<tr>
//                 <td>{$objet->id_reservation}</td>  
//                 <td> $veh->nom <br/> marq:$veh->marque   model:$veh->model </td>
//                  <td>{$client->nom}</td>
//                 <td>{$objet->date_reservation}</td>
//                 <td>{$objet->date_debut}</td>
//                 <td>{$objet->date_fin}</td>

//              <td>
//             <form action='' method='post'>
//                 <input type='hidden' name='id_reservation' value='{$objet->id_reservation}'>
//                 <select name='changeStatut' onchange='this.form.submit()' class='w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm'>
//                     <option value='en attente'" . ($objet->statut === 'en attente' ? ' selected' : '') . ">En attente</option>
//                     <option value='confirmée'" . ($objet->statut === 'confirmée' ? ' selected' : '') . ">Confirmée</option>
//                     <option value='annulée'" . ($objet->statut === 'annulée' ? ' selected' : '') . ">Annulée</option>
//                 </select>
//             </form>
//            </td>
           
//                 <td class='flex align-center justify-center'>
//                     <form action='' method='post'>
//                         <input type='hidden' name='id_reservation' value='{$objet->id_reservation}'>
//                         <button type='submit' name='archive' value='$id'>
//                             <span class='text-red-400 cursor-pointer material-symbols-outlined'>archive</span>
//                         </button>
//                     </form>
//                 </td>
//             </tr>";
//         }
//         echo "</tbody></table></div>";
//     } else {
//         echo "<p>Aucune réservation trouvée.</p>";
//     }
// }
?>



<?php
// Instancier l'objet AfficheReservation correctement
$dbManager = new DatabaseManager();
$afficheReservation = new AfficheReservation($dbManager);
$result = $afficheReservation->getAll_Of_User($id_user);

// Parcourir les résultats
foreach ($result as $objet) :
    echo '<div class="space-y-6">
    <!-- Card -->
    <div class="grid grid-cols-5 items-center bg-white shadow-lg rounded-lg overflow-hidden p-4">
      <!-- Image -->
      <div class="col-span-1">
        <img 
          src="https://via.placeholder.com/150" 
          alt="Voiture réservée" 
          class="w-full h-32 object-cover rounded-lg"
        />
      </div>

      <!-- Details -->
      <div class="col-span-4 px-4">
        <!-- Titre et sous-titre -->
        <div class="flex justify-between items-center">
          <h4 class="text-lg font-bold text-gray-800">Nom du Véhicule</h4>
          <p class="text-indigo-500 font-medium">Prix : $120/jour</p>
        </div>
        <p class="text-sm text-gray-600 mb-3">
          Date de réservation : 01 Jan 2025 | Date de début : 03 Jan 2025 | Date de fin : 07 Jan 2025
        </p>

        <!-- Détails supplémentaires -->
        <p class="text-sm text-gray-700">
          <span class="font-semibold">Statut :</span> En cours de validation
        </p>
        <textarea 
          class="w-full mt-2 p-2 text-sm text-gray-500 bg-gray-100 rounded-md resize-none" 
          placeholder="Laisser un commentaire..." 
          rows="2"
          readonly
        ></textarea>
        <div class="flex gap-3 mt-3">
          <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Modifier
          </button>
          <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
            Annuler
          </button>
          <button class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
            Archiver
          </button>
        </div>
      </div>
    </div>
    <!-- Fin de la Card -->
  </div>';
endforeach;
?>















<?php
$content = ob_get_clean();
include 'layout.php';
?>
