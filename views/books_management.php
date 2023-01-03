<?php $titre = 'Gestion des livres'; ?>
<?php $css_file = 'books_management.css'; ?>
<?php $js_file = 'script.js'; ?>

<?php ob_start(); ?>
<h2>Gestion des livres</h2>
<div class="form-container">
    <?php
    switch ($form) {
        case "1":
            echo '
            <h4>Ajout d\'un livre</h4>
            <form action="index.php?page=management" class="addition-form" method="post">
            <div class="input-container">
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div class="input-container">
        <label for="author">Auteur :</label>
        <select id="author-choices">
        <option value="0">-- Sélectionner une option --</option>
        <option value="1">Sélectionner parmi les auteurs existants</option>
        <option value="2">Saisir un nouvel auteur</option>
        </select>
        <div id="author-choice-display"></div>
        <select name="author" id="author_select">';
            foreach ($authors as $author) {
                echo "<option value=\"$author->id_author\"> $author->full_name</option>";
            }
            echo '</select>
        <input type="text" name="author" id="author_text" required>
    </div>
        <div class="input-container">
        <label for="genre">Genre :</label>
        <select id="genre-choices">
        <option value="0">-- Sélectionner une option --</option>
        <option value="1">Sélectionner parmi les genres existants</option>
        <option value="2">Saisir un nouveau genre</option>
        </select>
        <div id="genre-choice-display"></div>
        <select name="genre" id="genre_select">';
            foreach ($genres as $genre) {
                echo "<option value=\"$genre->id_genre\"> $genre->name</option>";
            }
            echo '</select>
        <input type="text" name="genre" id="genre_text" required>
    </div>
        <div class="input-container">
        <label for="resume">Résumé :</label>
        <textarea name="resume" id="resume" maxlength="255" required></textarea>
    </div>
            <div class="input-container">
            <label for="release-date">Date de parution:</label>
            <input type="date" id="release-date" name="release-date" required>
        </div>
        <div class="input-container">
        <label for="editor">Éditeur :</label>
        <select id="editor-choices">
        <option value="0">-- Sélectionner une option --</option>
        <option value="1">Sélectionner parmi les éditeurs existants</option>
        <option value="2">Saisir un nouvel éditeur</option>
        </select>
        <div id="editor-choice-display"></div>
        <select name="editor" id="editor_select">';
            foreach ($editors as $editor) {
                echo "<option value=\"$editor->id_editor\"> $editor->name</option>";
            }
            echo '</select>
        <input type="text" name="editor" id="editor_text" required>
    </div>
            <div class="input-container">
            <label for="pages">Nombre de pages :</label>
            <input type="number" name="pages" id="pages" required>
        </div>
            <div class="input-container">
            <label for="isbn">ISBN :</label>
            <input type="text" name="isbn" id="isbn" required>
        </div>
            <div class="input-container">
            <label for="media">URL de la page de couverture :</label>
            <input type="text" name="media" id="media" required>
        </div>
            
            <button type="submit" name="addition-button">Valider</button>
        </form>';
            break;
        case "2":
            echo '
            <h4>Modification d\'un livre</h4>
            <form action="index.php?page=management" class="modification-form" method="post">
            <div class="input-container">
            <label for="book">Livre :</label>
            <select name="book" id="book">
            <option value="">-- Sélectionner un livre -- </option>';
            foreach ($books as $book) {
                $book_author = Author::getOne($book->id_author);
                echo "<option value=\"$book->id_book\"> $book->title de " . $book_author->full_name . " </option>";
            }
            echo '</select>
                </div>
                <div class="input-container">
                <label for="title">Titre :</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="input-container">
        <label for="author">Auteur :</label>
        <select id="author-choices">
        <option value="0">-- Sélectionner une option --</option>
        <option value="1">Sélectionner parmi les auteurs existants</option>
        <option value="2">Saisir un nouvel auteur</option>
        </select>
        <div id="author-choice-display"></div>
        <select name="author" id="author_select">';
            foreach ($authors as $author) {
                echo "<option value=\"$author->id_author\"> $author->full_name</option>";
            }
            echo '</select>
        <input type="text" name="author" id="author_text" required>
    </div>
    <div class="input-container">
    <label for="genre">Genre :</label>
    <select id="genre-choices">
    <option value="0">-- Sélectionner une option --</option>
    <option value="1">Sélectionner parmi les genres existants</option>
    <option value="2">Saisir un nouveau genre</option>
    </select>
    <div id="genre-choice-display"></div>
    <select name="genre" id="genre_select">';
        foreach ($genres as $genre) {
            echo "<option value=\"$genre->id_genre\"> $genre->name</option>";
        }
        echo '</select>
    <input type="text" name="genre" id="genre_text" required>
</div>
            <div class="input-container">
            <label for="resume">Résumé :</label>
            <textarea name="resume" id="resume" maxlength="255"></textarea>
            </div>
                <div class="input-container">
                <label for="release-date">Date de parution:</label>
                <input type="date" id="release-date" name="release-date">
            </div>
            <div class="input-container">
        <label for="editor">Éditeur :</label>
        <select id="editor-choices">
        <option value="0">-- Sélectionner une option --</option>
        <option value="1">Sélectionner parmi les éditeurs existants</option>
        <option value="2">Saisir un nouvel éditeur</option>
        </select>
        <div id="editor-choice-display"></div>
        <select name="editor" id="editor_select">';
            foreach ($editors as $editor) {
                echo "<option value=\"$editor->id_editor\"> $editor->name</option>";
            }
            echo '</select>
        <input type="text" name="editor" id="editor_text" required>
    </div>
                <div class="input-container">
                <label for="pages">Nombre de pages :</label>
                <input type="number" name="pages" id="pages">
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
            <form action="index.php?page=management" class="deletion-form" method="post">
            <div class="input-container">
            <label for="book">Livre :</label>
            <select name="book" id="book">
            <option value="">-- Sélectionner un livre -- </option>';
            foreach ($books as $book) {
                $book_author = Author::getOne($book->id_author);
                echo "<option value=\"$book->id_book\"> $book->title de " . $book_author->full_name . " </option>";
            }

            echo '</select>
             </div>
             <button type="submit" name="deletion-button">Valider</button>
             </form>';
            break;
        case "4":
            echo '
            <h4>Remise d\'un livre</h4>
            <form action="index.php?page=management" class="availability-form" method="post">
            <div class="input-container">
            <label for="book">Livre :</label>
            <select name="book" id="book">
            <option value="">-- Sélectionner un livre -- </option>';
            foreach ($borrowed_books as $book) {
                $book_author = Author::getOne($book->id_author);
                echo "<option value=\"$book->id_book\"> $book->title de " . $book_author->full_name . " </option>";
            }

            echo '</select>
             </div>
             <button type="submit" name="availability-button">Valider</button>
             </form>';
            break;

        default:
            echo '<form action="index.php?page=management" class="management-form" method="post">
    <select name="management-options">
        <option value="">-- Sélectionner une action -- </option>
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