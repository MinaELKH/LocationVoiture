<?php

class AfficheReservation
{
    private DatabaseManager $dbManager;
    public function __construct(
        DatabaseManager $dbManager,
    ) {
        $this->dbManager = $dbManager ; 
    }

    // Récupérer toutes les réservations
    public function getAll_Of_User($id_user): array
    {

        $params = ['archive' => '0' ,
                   'id_user' =>$id_user];
        return $this->dbManager->selectAll('listeresevation', $params);
    }

    // Récupérer une réservation par ID
    public function getById($id): ?stdClass
    {
        $params = ['id_reservation' => $id];
        return $this->dbManager->selectById('listeresevation', $params);
    }

   
      
}
