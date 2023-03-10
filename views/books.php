<?php $titre = 'Tous nos livres'; ?>
<?php $css_file = 'books.css'; ?>

<?php ob_start(); ?>
<?php if (isset($noResultMessage)) echo "<div class='no-result'>$noResultMessage</div>"; ?>
<?php if (!isset($filteredBooks)) echo '<h1>Tous nos livres 📖</h1>' ?>
<div class="books-gallery">
    <?php foreach ($books as $book) : ?>
        <?php
        $authorId = $book->id_author;
        $genreId = $book->id_genre;
        $bookId = $book->id_book;
        ?>

        <div class="book-container">
            <div class="book-illustration">
                <a href=<?= "index.php?page=books&book_id=$book->id_book" ?>>
                    <?php if ($book->isbn == 9999999999999) {
                        echo "Pas d'illustration disponible 😞";
                    } else {
                        echo "<img src=\"$book->media\" alt=\"illustration of the book $book->title\">";
                    } ?>
                </a>
            </div>
            <div class="book-information">
                <h3 id="book-title"><?= $book->title ?></h3>
                <div class="book-details">
                    <?= 'Auteur : ' .  $authorsTab[$authorId] ?> • <?= 'Genre : ' . $genresTab[$genreId] ?>
                </div>
            </div>
            <?php if ($borrowTab[$bookId] == 1) {
                echo '<div class="availability">  <p> Disponible ✅ </p> </div>';
            } else {
                echo '<div class="unavailability"> <p > Indisponible 😞</p> </div>';
            } ?>
        </div>
    <?php endforeach; ?>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require './views/templates/main_layout.php'; ?>