<?php $titre = 'Tous nos livres'; ?>
<?php $css_file = 'books.css'; ?>

<?php ob_start(); ?>
<h1>Vos emprunts en cours 📖</h1>
<div class="books-gallery">
<?php $noBooks = true; ?>
    <?php foreach ($books as $book) : ?>
        <?php
         
        $borrow = Borrowing::get_one_by_bookid($book->id_book);
        $book_genre = Genre::getOne($book->id_genre);
        $book_author = Author::getOne($book->id_author);
        ?>
         <?php if ($borrow->id_user == ($_SESSION['id_user']) && $borrow->availability == 0){
            $noBooks = false;
             $var = ' <div class="book-container">
             <div class="book-illustration">
                 <a href= "index.php?page=books&book_id='.$book->id_book.' " >'; 
                 if ($book->isbn == 9999999999999) {
                     $var.= "Pas d'illustration disponible 😞";
                 } else {
                     $var.=  "<img src=\"$book->media\" alt=\"illustration of the book $book->title\">";
                 } 
                 $var.= 
                 '</a>
                 </div>
                 <div class="book-information">
                     <h3 id="book-title"> '.$book->title.'</h3>
                     <div class="book-details">
                         Auteur :   '.$book_author->full_name.' • Genre :  '.$book_genre->name.' •
                     </div>
                 </div>
             </div>';
             echo $var;
         } 
         ?>

    <?php endforeach; ?>
    <?php if($noBooks === true) echo "<div class='no-result'>Vous n'avez aucun emprunt pour le moment.</div>";?>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require './views/templates/main_layout.php'; ?>