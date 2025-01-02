

  <script>
   
      date_debut=document.getElementById("date_debut") ; 
      date_fin = document.getElementById("date_fin") ; 
      prix=document.getElementById("prix") ;
  </script>

 <div id="modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-40">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full relative">
      <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl" onclick="closeModal('modal')">
        &times;
      </button>

      <h2 class="text-2xl font-bold mb-6">Réservation de voiture</h2>

      <form id="reservation-form">
        <input type="hidden" id="id_ref" value="">
        <div class="mb-4">
          <label for="date_debut" class="block font-medium mb-2">Date de prise en charge :</label>
          <input type="date" id="date_debut" name="date_debut" class="border rounded-lg px-4 py-2 w-full" required>
        </div>
        <div class="mb-4">
          <label for="date_fin" class="block font-medium mb-2">Date de restitution :</label>
          <input type="date" id="date_fin" name="date_fin" class="border rounded-lg px-4 py-2 w-full" required>
        </div>
        <div class="mb-6">
          <label for="location" class="block font-medium mb-2">Lieu de prise en charge :</label>
          <input type="text" id="location" name="location" placeholder="Ville, aéroport, etc." class="border rounded-lg px-4 py-2 w-full" required>
        </div>
        <button type="submit" name="louerDisponible" class="bg-black text-white rounded-lg px-6 py-3 w-full hover:bg-gray-800">Vérifier la disponibilité</button>
      </form>

      <div id="prix" class="mt-6">
        <h3 class="text-lg font-medium mb-2">Prix total :</h3>
        <p class="text-2xl font-bold" id="total-price"></p>
      </div>

      <div id="confirmation-container" class="hidden">
        <h2 class="text-2xl font-bold mb-4">Votre réservation est confirmée !</h2>
        <p class="mb-6">Nous vous remercions pour votre réservation. Vous recevrez bientôt les détails par e-mail.</p>
        <a href="#" class="bg-black text-white rounded-lg px-6 py-3 inline-block hover:bg-gray-800" onclick="closeModal('modal')">Retour à l'accueil</a>
      </div>
    </div>
  </div>


  <?php
  if (isset($_POST["louerDisponible"]) ){
      $date_debut=$_POST['date_debut'] ;
      $date_fin=$_POST['date_fin'] ;
      $id = $_POST['ref_id'] ; 
      
      $newVehicule = new Vehicule($dbmanager  , $id) ;
      $disponiblite = $newVehicule->disponibilite( $date_debut ,   $date_fin  ) ; 






  }
  
  
  
  
  
  ?>