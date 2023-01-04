<?php $titre = $book->title; ?>
<?php $css_file = 'book.css'; ?>


<?php ob_start(); ?>
<h1><?= $book->title ?></h1>
<h3><?= '<u>Genre principal :</u> ' . $bookGenre->name ?> </h3>

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
            <?= 'Écrit par <strong>' . $bookAuthor->full_name . '</strong>' ?> • <?= 'Publié le <strong>' . $book->release_date . '</strong> et édité par <strong>' . $bookEditor->name . '</strong>' ?> <br> <?= $book->pages . ' pages' ?> • <?= 'ISBN : <strong>' . $book->isbn . '</strong>' ?>
        </div>
        <p class="book-resume">
            <span>Résumé :</span>
            <?= strtoupper($book->resume[0]) . substr(strtolower($book->resume), 1) ?>
        </p>
        <?php if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 2) {
            if ($borrow->availability == 1) {
                echo '<form method="post"><button type="submit" name="borrowing-button">Emprunter</button></form>';
            } else if ($borrow->availability == 0 && $_SESSION['id_user'] == $borrow->id_user) {
                echo '<form method="post"><button type="submit" name="render-button">Rendre</button></form>';
            } else {
                echo '<b>Le livre a été emprunté</b>';
            }
        } else {
            if ($borrow->availability == 0) {
                echo "<b>Le livre a été emprunté par  $user->first_name  $user->last_name</b>";
            }
        }
        ?>
    </div>
</div>
<?php $contenu = ob_get_clean(); ?>



<?php require './views/templates/main_layout.php'; ?>