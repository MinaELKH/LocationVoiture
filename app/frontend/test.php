<!DOCTYPE html>
<html>
<head>
  <title>Réservation de voiture</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('form');
      const confirmationContainer = document.getElementById('confirmation-container');
      const priceContainer = document.getElementById('price-container');

      form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Récupérer les valeurs du formulaire
        const pickupDate = document.getElementById('pickup-date').value;
        const returnDate = document.getElementById('return-date').value;
        const location = document.getElementById('location').value;

        // Calculer le nombre de jours de location
        const oneDay = 24 * 60 * 60 * 1000; // Nombre de millisecondes dans une journée
        const diffDays = Math.round(Math.abs((new Date(pickupDate) - new Date(returnDate)) / oneDay));

        // Calculer le prix total (prix fictif de 50€/jour)
        const pricePerDay = 50;
        const totalPrice = pricePerDay * diffDays;

        // Afficher le prix total
        document.getElementById('total-price').textContent = `${totalPrice.toFixed(2)} €`;

        // Simuler la vérification de disponibilité
        const isAvailable = true;

        if (isAvailable) {
          form.classList.add('hidden');
          priceContainer.classList.add('hidden');
          confirmationContainer.classList.remove('hidden');
        } else {
          alert('Désolé, le véhicule n\'est pas disponible pour les dates sélectionnées.');
        }
      });
    });
  </script>
</head>
<body class="bg-gray-200 font-sans">
  <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8 mt-16">
    <h2 class="text-2xl font-bold mb-6">Réservation de voiture</h2>

    <form id="reservation-form">
      <div class="mb-4">
        <label for="pickup-date" class="block font-medium mb-2">Date de prise en charge :</label>
        <input type="date" id="pickup-date" name="pickup-date" class="border rounded-lg px-4 py-2 w-full" required>
      </div>
      <div class="mb-4">
        <label for="return-date" class="block font-medium mb-2">Date de restitution :</label>
        <input type="date" id="return-date" name="return-date" class="border rounded-lg px-4 py-2 w-full" required>
      </div>
      <div class="mb-6">
        <label for="location" class="block font-medium mb-2">Lieu de prise en charge :</label>
        <input type="text" id="location" name="location" placeholder="Ville, aéroport, etc." class="border rounded-lg px-4 py-2 w-full" required>
      </div>
      <button type="submit" class="bg-black text-white rounded-lg px-6 py-3 w-full hover:bg-gray-800">Vérifier la disponibilité</button>
    </form>

    <div id="price-container" class="mt-6">
      <h3 class="text-lg font-medium mb-2">Prix total :</h3>
      <p class="text-2xl font-bold" id="total-price"></p>
    </div>

    <div id="confirmation-container" class="hidden">
      <h2 class="text-2xl font-bold mb-4">Votre réservation est confirmée !</h2>
      <p class="mb-6">Nous vous remercions pour votre réservation. Vous recevrez bientôt les détails par e-mail.</p>
      <a href="#" class="bg-black text-white rounded-lg px-6 py-3 inline-block hover:bg-gray-800">Retour à l'accueil</a>
    </div>
  </div>
</body>
</html>