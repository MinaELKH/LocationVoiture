<?php

class Categorie
{
    private DatabaseManager $dbManager;
    private ?int $id_categorie;
    private ?string $nom;
    private ?string $archive;

    public function __construct(
        DatabaseManager $dbManager,
        ?int $id_categorie = null,
        ?string $nom = null,
        ?string $archive = '0'
    ) {
        $this->dbManager = $dbManager;
        $this->id_categorie = $id_categorie;
        $this->nom = $nom;
        $this->archive = $archive;
    }

    public function getAll(): array
    {
        $params = ['archive' => '0'];
        return $this->dbManager->selectAll('categorie', $params);
    }


    public function getById($id): ?stdClass
    {
        $params = ['id_categorie' => $id];
        return $this->dbManager->selectById('categorie', $params);
    }

    public function ajouterCategorie(): bool
    {
        $data = [
            'id_categorie' => $this->id_categorie,
            'nom' => $this->nom,
            'archive' => $this->archive
        ];
        return $this->dbManager->insert('categorie', $data);
    }


    public function EditerCategorie(): bool
    {
        $data = [
            'nom' => $this->nom,
            'archive' => $this->archive
        ];
        $condition = ['id_categorie' => $this->id_categorie];
        return $this->dbManager->Update('categorie', $data, $condition);
    }

    // Supprimer une catégorie (soft delete via l'archivage)
    public function supprimerCategorie(): bool
    {
        $data = ['archive' => '1'];
        $condition = ['id_categorie' => $this->id_categorie];
        return $this->dbManager->Update('categorie', $data, $condition);
    }
}
