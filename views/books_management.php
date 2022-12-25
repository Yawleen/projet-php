<?php $titre = 'Gestion des livres'; ?>
<?php $css_file = 'books_management.css'; ?>

<?php

$form = "";

if (isset($_POST['continue-button'])) {
    $form = $_POST['management-options'];
}

if (isset($_POST['addition-button'])) {
    // appel au modèle pour faire un ajout dans la table 'books'
}

if (isset($_POST['modification-button'])) {
    // appel au modèle pour faire un update dans la table 'books'
}

if (isset($_POST['deletion-button'])) {
    // appel au modèle pour faire un delete dans la table 'books'
}

if (isset($_POST['availability-button'])) {
    // appel au modèle pour faire un update dans la table 'borrowings'
}


?>
<?php ob_start(); ?>
<h2>Gestion des livres</h2>
<div class="form-container">
    <?php
    switch ($form) {
        case "1":
            echo '
            <h4>Ajout d\'un livre</h4>
            <form class="addition-form" method="post">
            <div class="input-container">
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="input-container">
        <label for="author">Auteur :</label>
        <input type="text" name="author" id="author">
    </div>
        <div class="input-container">
        <label for="genre">Genre :</label>
        <input type="text" name="genre" id="genre">
    </div>
        <div class="input-container">
        <label for="resume">Résumé :</label>
        <input type="text" name="resume" id="resume">
    </div>
            <div class="input-container">
            <label for="release-date">Date de parution:</label>
            <input type="date" id="release-date" name="release-date">
        </div>
        <div class="input-container">
        <label for="editor">Éditeur :</label>
        <input type="text" name="editor" id="editor">
    </div>
            <div class="input-container">
            <label for="pages">Nombre de pages :</label>
            <input type="text" name="pages" id="pages">
        </div>
            <div class="input-container">
            <label for="isbn">ISBN :</label>
            <input type="text" name="isbn" id="isbn">
        </div>
            <div class="input-container">
            <label for="media">URL de la page de couverture :</label>
            <input type="text" name="media" id="media">
        </div>
            
            <button type="submit" name="addition-button">Valider</button>
        </form>';
            break;
        case "2":
            echo '
            <h4>Modification d\'un livre</h4>
            <form class="modification-form" method="post">
            <div class="input-container">
            <label for="book">Livre :</label>
            <select name="book" id="book">';
             foreach($books as $book) {
                $book_author = Author::getOne($book->id_author);
                echo "<option value=\"$book->id_book\"> $book->title de ". $book_author->full_name . " </option>";             
            }
            echo '</select>
                </div>
                <div class="input-container">
                <label for="title">Titre :</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="input-container">
            <label for="author">Auteur :</label>
            <input type="text" name="author" id="author">
        </div>
            <div class="input-container">
            <label for="genre">Genre :</label>
            <input type="text" name="genre" id="genre">
        </div>
            <div class="input-container">
            <label for="resume">Résumé :</label>
            <input type="text" name="resume" id="resume">
        </div>
                <div class="input-container">
                <label for="release-date">Date de parution:</label>
                <input type="date" id="release-date" name="release-date">
            </div>
            <div class="input-container">
            <label for="editor">Éditeur :</label>
            <input type="text" name="editor" id="editor">
        </div>
                <div class="input-container">
                <label for="pages">Nombre de pages :</label>
                <input type="text" name="pages" id="pages">
            </div>
                <div class="input-container">
                <label for="isbn">ISBN :</label>
                <input type="text" name="isbn" id="isbn">
            </div>
                <div class="input-container">
                <label for="media">URL de la page de couverture :</label>
                <input type="text" name="media" id="media">
            </div>
                
                <button type="submit" name="modification-button">Valider</button>
            </form>';

            break;
        case "3":
            echo '
            <h4>Suppression d\'un livre</h4>
            <form class="deletion-form" method="post">
            <div class="input-container">
            <label for="book">Livre :</label>
            <select name="book" id="book">';
             foreach($books as $book) {
                $book_author = Author::getOne($book->id_author);
                echo "<option value=\"$book->id_book\"> $book->title de ". $book_author->full_name . " </option>";
             }

             echo '</select>
             </div>
             <button type="submit" name="deletion-button">Valider</button>
             </form>';
            break;
        case "4":
            echo '
            <h4>Remise d\'un livre</h4>
            <form class="availability-form" method="post">
            <div class="input-container">
            <label for="book">Livre :</label>
            <select name="book" id="book">';
             foreach($books as $book) {
                $book_author = Author::getOne($book->id_author);
                echo "<option value=\"$book->id_book\"> $book->title de ". $book_author->full_name . " </option>";
             }

             echo '</select>
             </div>
             <button type="submit" name="availability-button">Valider</button>
             </form>';
            break;

        default:
            echo '<form class="management-form" method="post">
    <select name="management-options">
        <option value="1">Ajouter un livre</option>
        <option value="2">Modifier un livre</option>
        <option value="3">Supprimer un livre</option>
        <option value="4">Remettre un livre dans la bibliothèque</option>
    </select>
    <button type="submit" name="continue-button">Continuer</button>
</form>';
    }
    ?>
</div>

<?php $contenu = ob_get_clean(); ?>



<?php require './views/templates/main_layout.php'; ?>