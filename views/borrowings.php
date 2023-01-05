<?php $titre = 'Tous nos livres'; ?>
<?php $css_file = 'books.css'; ?>

<?php ob_start(); ?>
<h1>Vos emprunts en cours 📖</h1>
<div class="books-gallery">
    <?php $noBooks = true; ?>
    <?php foreach ($books as $book): ?>
        <?php
        $authorId = $book->id_author;
        $genreId = $book->id_genre;
        $bookId = $book->id_book;
        ?>
        <?php if ($borrowTab[$bookId][1] == ($_SESSION['id_user']) && $borrowTab[$bookId][0] == 0) {
            $noBooks = false;
            $var = ' <div class="book-container">
             <div class="book-illustration">
                 <a href= "index.php?page=books&book_id=' . $book->id_book . ' " >';
            if ($book->isbn == 9999999999999) {
                $var .= "Pas d'illustration disponible 😞";
            } else {
                $var .= "<img src=\"$book->media\" alt=\"illustration of the book $book->title\">";
            }
            $var .=
                '</a>
                 </div>
                 <div class="book-information">
                     <h3 id="book-title"> ' . $book->title . '</h3>
                     <div class="book-details">
                         Auteur :   ' . $authorsTab[$authorId] . ' • Genre :  ' . $genresTab[$genreId] . ' •
                     </div>
                 </div>
             </div>';
            echo $var;
        }
        ?>

    <?php endforeach; ?>
    <?php if ($noBooks === true)
        echo "<div class='no-result'>Vous n'avez aucun emprunt pour le moment.</div>"; ?>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require './views/templates/main_layout.php'; ?>