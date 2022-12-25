<?php $titre = 'Page 404'; ?>
<?php $css_file = 'erreur.css'; ?>

<?php ob_start(); ?>
<h2>Page introuvable. 😞</h2>
<?php $contenu = ob_get_clean(); ?>

<?php require './views/templates/main_layout.php'; ?>