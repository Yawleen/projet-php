

<?php $titre = 'Tous nos livres'; ?>
<?php $css_file = 'books.css'; ?>

<?php ob_start(); ?>
<?php if(isset($noResultMessage)) echo "<div class='no-result'>$noResultMessage</div>"; ?>
<?php if (!isset($filteredBooks)) echo '<h1>Vos emprunts en cours 📖</h1>' ?>
<div class="books-gallery">

    <?php foreach ($books as $book) : ?>
        <?php
        $borrow = Borrowing::getOne($book->id_book);
        $book_genre = Genre::getOne($book->id_genre);
        $book_author = Author::getOne($book->id_author);
        ?>
         <?php if ($borrow->id_user == ($_SESSION['id_user']) && $borrow->availability = 2)
            echo
                '  <div class="book-container">
            <div class="book-illustration">
                <a href= "index.php?page=books&book_id='.$book->id_book.'" >.
                <img src='. $book->media. ' alt=\"illustration of the book '.$book->title.'\">
                </a>
              
            </div>
            <div class="book-information">
                <h3 id="book-title"> '.$book->title.'</h3>
                <div class="book-details">
                    Auteur :   '.$book_author->full_name.' • Genre :  '.$book_genre->name.' •
                </div>
            </div>
        </div>';
         ?>
    
    <?php endforeach; ?>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require './views/templates/main_layout.php'; ?>