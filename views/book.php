<?php $titre = $book->title; ?>
<?php $css_file = 'book.css'; ?>

<?php ob_start(); ?>
<h1><?= $book->title ?></h1>
<h3><?= '<u>Genre principal :</u> ' . $book_genre->name ?> </h3>
<div class="book-container">
    <div class="book-illustration">
        <?php if ($book->isbn == 9999999999999) {
            echo "Pas d'illustration disponible 😞";
        } else {
            echo "<img src=\"$book->media\" alt=\"illustration of the book $book->title\">";
        } ?>
    </div>
    <div class="book-information">
        <div class="book-details">
            <?= 'Écrit par <strong>' . $book_author->full_name . '</strong>' ?> • <?= 'Publié le <strong>' . $book->release_date . '</strong> et édité par <strong>' . $book_editor->name . '</strong>' ?> <br> <?= $book->pages . ' pages' ?> • <?= 'ISBN : <strong>' . $book->isbn . '</strong>' ?>
        </div>
        <p class="book-resume">
            <span>Résumé :</span>
            <?= strtoupper($book->resume[0]) . substr(strtolower($book->resume), 1) ?>
        </p>
        <?php if(isset($_SESSION['id_role']) && $_SESSION['id_role'] == 2) echo '<form method="post"><button type="submit" name="borrowing-button">Emprunter</button></form>' ?>
        <!-- si le livre a déjà été emprunté, ne pas afficher le bouton 'emprunter' et faire apparaître un message indiquant que le livre est indisponible -->
        <!-- si l'utilisateur est un admin, afficher ici qui a emprunté le livre -->
    </div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php 
    if (isset($_POST['borrowing-button'])) {
      // appel au modèle pour faire un update dans la table 'borrowings'
    }
?>
<?php require './views/templates/main_layout.php'; ?>