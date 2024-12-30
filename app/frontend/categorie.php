<?php
ob_start(); 

$title = "Gestion des Catégories";
require "../backend/classe_Categorie.php";
require_once __DIR__ . '/../../includ/DB.php';
require_once __DIR__ . '/../../includ/DatabaseManager.php';
$dbManager = new DatabaseManager();
$objCategorie = new Categorie($dbManager);
$actionEdit = false;

if (isset($_POST["edit"])) {
    $actionEdit = true;
    $id = $_POST['edit'];
    $newCategorie = new Categorie($dbManager, $id);
    $objCategorie = $newCategorie->getById($id);

    if (!$objCategorie) {
        echo "<p>Erreur : Remplissage de formulaire</p>";
    }
}
?>

<div class="relative mx-20 mb-10">
    <button onclick="openModal('modal')" class="float-right flex flex-row justify-around gap-2.5 text-indigo-900 hover:text-green-500" id="ShowForm">
        <span class="material-symbols-outlined">add_task</span>
        <span>Ajouter</span>
    </button>
</div>

<div id="modal" class="<?= $actionEdit ? '' : 'hidden' ?> fixed inset-0 flex items-center z-50 justify-center bg-white bg-opacity-50">
    <div class="relative p-6 shadow-xl rounded-lg bg-white text-gray-900 overflow-y-auto lg:w-1/3">
        <span id="closeForm" onclick="closeModal('modal')" class="absolute right-4 top-4 text-gray-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-2xl">cancel</span>
        <h2 class="text-2xl font-bold mb-6 text-center text-yellow-500"><?= $actionEdit ? 'Modifier Catégorie' : 'Ajouter Catégorie' ?></h2>
        <p id="pargErreur" class="hidden text-sm font-semibold px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-400 rounded"></p>
        <form id="formulaire" class="flex flex-col gap-4" action="Categorie.php" method="post">
            <input id="id_input" type="hidden" name="id" value="<?= $actionEdit ? $objCategorie->id_categorie : 0 ?>">
            <input id="action" type="hidden" name="action" value="<?= $actionEdit ? 'edit' : 'ajout' ?>">

            <div>
                <label for="nom" class="block font-medium mb-1">Nom</label>
                <input id="nom" name="nom" type="text" placeholder="Nom de la catégorie" value="<?= $actionEdit ? $objCategorie->nom : '' ?>" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm" required>
            </div>
            <div>
                <label for="description" class="block font-medium mb-1">Description</label>
                <textarea id="description" name="description" rows="4" cols="50">
                </textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit" name="valider" class="w-full bg-[#7F020F] hover:bg-red-700 text-white font-bold py-2 rounded-lg">Valider</button>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['valider'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    $newCategorie = new Categorie($dbManager, $id, $nom , $description);

    if ($_POST['id'] == 0 && $_POST['action'] == 'ajout') {
        $result = $newCategorie->ajouterCategorie();
    }

    if ($_POST['id'] != 0 && $_POST['action'] == 'edit') {
        $result = $newCategorie->editerCategorie();
    }

    if ($result) {
        header("Location: Categorie.php");
        exit;
    } else {
        echo "<p>Erreur : insertion</p>";
    }
}

if (isset($_POST["delete"])) {
    $id = intval($_POST["delete"]);
    $newCategorie = new Categorie($dbManager, $id);
    $result = $newCategorie->supprimerCategorie();

    if ($result) {
        header("Location: Categorie.php");
        exit;
    } else {
        echo "<p>Erreur : suppression</p>";
    }
}

affiche();
function affiche() {
    $dbManager = new DatabaseManager();
    $newCategorie = new Categorie($dbManager);
    $result = $newCategorie->getAll();

    if ($result) {
        echo "<div class='listeTable'><table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Action</th>
              </tr>";

        foreach ($result as $objet) {
            $id = $objet->id_categorie;

            echo "<tr>
                <td>{$objet->id_categorie}</td>
                <td>{$objet->nom}</td>
                <td>{$objet->description}</td>
                <td>
                    <form action='Categorie.php' method='post'>
                        <div class='flex'>
                            <button type='submit' name='edit' value='$id'>
                                  <span class='text-red-400 cursor-pointer material-symbols-outlined'>
                                edit
                            </span>
                            </button>
                            <button type='submit' name='delete' value='$id'>      <span class='text-red-400 cursor-pointer material-symbols-outlined'>
                                delete
                            </span></button>
                        </div>
                    </form>
                </td>
              </tr>";
        }

        echo "</table></div>";
    } else {
        echo "<p>Aucune catégorie trouvée.</p>";
    }
}
?>
<?php
$content = ob_get_clean(); 
include 'layout.php'; 
?>
