<?php
enum Statut: string
{
    case enAttente = 'en attente';
    case confirmee = 'confirmée';
    case annulee = 'annulée';
}

class Reservation
{
    private DatabaseManager $dbManager;
    private ?int $id_reservation;
    private ?int $id_vehicule;
    private ?int $id_user;
    private ?int $id_agence;
    private ?string $date_reservation;
    private ?string $date_debut;
    private ?string $date_fin;
    private ?Statut $statut;

    public function __construct(
        DatabaseManager $dbManager,
        ?int $id_reservation = null,
        ?int $id_vehicule = null,
        ?int $id_user = null,
        ?int $id_agence = null,
        ?string $date_reservation = null,
        ?string $date_debut = null,
        ?string $date_fin = null,
        ?Statut $statut = null 
    ) {
        $this->dbManager = $dbManager;
        $this->id_reservation = $id_reservation;
        $this->id_vehicule = $id_vehicule;
        $this->id_user = $id_user;
        $this->id_agence = $id_agence;
        $this->date_reservation = $date_reservation;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->statut = $statut;
    }

    // Récupérer toutes les réservations
    public function getAll(): array
    {
        $params = ['archive' => '0'];
        return $this->dbManager->selectAll('reservation', $params);
    }

    // Récupérer une réservation par ID
    public function getById($id): ?stdClass
    {
        $params = ['id_reservation' => $id];
        return $this->dbManager->selectById('reservation', $params);
    }

    // Ajouter une nouvelle réservation
    public function ajouterReservation(): bool
    {
        $data = [
            'id_vehicule' => $this->id_vehicule,
            'id_user' => $this->id_user,
            'id_agence' => $this->id_agence,
            'date_reservation' => $this->date_reservation,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'statut' => $this->statut
        ];
        return $this->dbManager->insert('reservation', $data);
    }

    // Modifier une réservation
    public function EditerReservation(): bool
    {
        $data = [
            'id_vehicule' => $this->id_vehicule,
            'id_user' => $this->id_user,
            'id_agence' => $this->id_agence,
            'date_reservation' => $this->date_reservation,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'statut' => $this->statut
        ];
        $condition = ['id_reservation' => $this->id_reservation];
        return $this->dbManager->update('reservation', $data, $condition);
    }

    // Supprimer une réservation (Soft Delete : changer le statut à 'annulée')
    public function archiveReservation(): bool
    {
        $data = ['archive' => '1'];
        $condition = ['id_reservation' => $this->id_reservation];
        return $this->dbManager->update('reservation', $data, $condition);
    }

    public function changeStatut($newStatut): bool
    {
        $data = ['statut' => $newStatut];
        $condition = ['id_reservation' => $this->id_reservation];
        return $this->dbManager->update('reservation', $data, $condition);
    }


    public function getAttributById(array $attributs = []): bool // il prend en param un array des colonne a affichées
    {
        $params = ['id_reservation' => $id];
        return $this->dbManager->selectAttributById('reservation',$attributs , $params );
    }
}
