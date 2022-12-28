<?php $titre = 'Page de connexion'; ?>
<?php $css_file = 'login.css'; ?>

<?php ob_start(); ?>
<h2>Connexion</h2>
<div class="login-form-container">
    <form action="index.php?page=login" class="login-form" method="post">
        <div class="input-container">
            <label for="email">Adresse mail :</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="input-container">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password">
        </div>
        <?php if (isset($_SESSION['error'])) echo '<small>Identifiants incorrects.</small>'; ?>
        <button type="submit" name="login-button">Se connecter</button>
    </form>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require './views/templates/main_layout.php'; ?>