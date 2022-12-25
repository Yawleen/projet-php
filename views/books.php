<?php $titre = 'Tous nos livres'; ?>
<?php $css_file = 'books.css'; ?>

<?php ob_start(); ?>
<h1>Tous nos livres 📖</h1>
<?php if(isset($noResultMessage)) echo "<div class='no-result'>$noResultMessage</div>"; ?>
<div class="books-gallery">
    <?php foreach ($books as $book) : ?>
        <?php
        $book_author = Author::getOne($book->id_author);
        $book_genre = Genre::getOne($book->id_genre);
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
                    <?= 'Auteur : ' .  $book_author->full_name ?> • <?= 'Genre : ' . $book_genre->name ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require './views/templates/main_layout.php'; ?>