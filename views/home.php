<?php $titre = 'Page d\'accueil'; ?>

<?php ob_start(); ?>
<h2><?= 'Bienvenue sur votre espace '. $role->name . ' ' . $_SESSION['first_name'] . ' ! 😊' ?></h2>
<?php $contenu = ob_get_clean(); ?>

<?php require './views/templates/main_layout.php'; ?>