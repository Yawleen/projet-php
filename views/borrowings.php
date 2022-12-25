<?php $titre = 'Vos emprunts'; ?>

<?php ob_start(); ?>
<!-- Code de la vue des emprunts à placer ici. Possibilité de s'inspirer du code dans 'books.php' + de reprendre le style 'book.css' pour le display des livres empruntés  -->
<?php $contenu = ob_get_clean(); ?>

<?php require './views/templates/main_layout.php'; ?>