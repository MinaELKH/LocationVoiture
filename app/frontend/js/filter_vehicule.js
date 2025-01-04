document.getElementById('filterForm').addEventListener('submit', function (e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    fetch('filter_vehicules.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById('vehiculesContainer');
        container.innerHTML = ''; // Vider le conteneur avant d'afficher les nouveaux résultats

        if (data.length === 0) {
            container.innerHTML = '<p>Aucun véhicule trouvé.</p>';
            return;
        }

        data.forEach(objet => {
            const vehiculeCard = `
            <div class="p-3 w-full md:grid-cols-2 lg:w-full">
                <div class="bg-white border shadow-md text-gray-500">
                    <a href="#" class="block w-full h-[450px] bg-gray-300">
                        <img src="${objet.photo}" class="hover:opacity-90 w-full h-full object-cover" alt="${objet.nom}" />
                    </a>
        
                    <div class="p-4">
                        <h4 class="font-bold mb-2 text-gray-900 text-xl">
                            <a href="#" class="hover:text-gray-500">${objet.nom} ${objet.model} ${objet.marque}</a>
                        </h4>
                        <h4 class="font-bold mb-2 text-gray-900 text-xl">
                            <a href="#" class="hover:text-gray-500">${objet.nom_categorie}</a>
                        </h4>
                       
                        <hr class="border-gray-200 my-4">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-col justify-between">
                                <p class="font-bold text-gray-900">${objet.prix}/day</p>
                                <div class="inline-flex items-center py-1 space-x-1">
                                    <span>4.7</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-primary-500">
                                        <path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z"></path>
                                    </svg>
                                    <span>(245 reviews)</span>
                                </div>
                            </div>
                            <div>
                                <button 
                                    class="btn_louer bg-gray-300 hover:bg-primary-600 inline-block px-6 py-2 text-gray-700" 
                                    value="${objet.prix}"  
                                    onclick="openModal('modalReservation', ${objet.id_vehicule})">
                                    Louer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
            container.insertAdjacentHTML('beforeend', vehiculeCard); // Corrigé : Insérer dans la boucle
        });
    })
    .catch(error => console.error('Erreur:', error));
});
