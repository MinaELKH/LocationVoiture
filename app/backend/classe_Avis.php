<?php

class Avis
{
    private DatabaseManager $dbManager;
    private ?int $id_avis;
    private ?int $id_reservation;
    private ?string $description;
    private ?int $etoiles;

    public function __construct(
        DatabaseManager $dbManager,
        ?int $id_avis = null,
        ?int $id_reservation = null,
        ?string $description = null,
        ?int $etoiles = null
    ) {
        $this->dbManager = $dbManager;
        $this->id_avis = $id_avis;
        $this->id_reservation = $id_reservation;
        $this->description = $description;
        $this->etoiles = $etoiles;
    }

    // Récupérer tous les avis
    public function getAll(): array
    {
        return $this->dbManager->selectAll('avis');
    }

    // Récupérer un avis par ID
    public function getById($id): ?stdClass
    {
        $params = ['id_avis' => $id];
        return $this->dbManager->selectById('avis', $params);
    }

    // Ajouter un nouvel avis
    public function ajouterAvis(): bool
    {
        $data = [
            'id_reservation' => $this->id_reservation,
            'description' => $this->description,
            'etoiles' => $this->etoiles
        ];
        return $this->dbManager->insert('avis', $data);
    }

    // Modifier un avis existant
    public function editerAvis(): bool
    {
        $data = [
            'description' => $this->description,
            'etoiles' => $this->etoiles
        ];
        $condition = ['id_avis' => $this->id_avis];
        return $this->dbManager->update('avis', $data, $condition);
    }

    // Supprimer un avis
    public function supprimerAvis(): bool
    {
        $condition = ['id_avis' => $this->id_avis];
        return $this->dbManager->delete('avis', $condition);
    }
}
