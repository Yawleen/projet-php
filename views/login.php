<?php $titre = 'Page de connexion'; ?>
<?php $css_file = 'login.css'; ?>

<?php
if (isset($_SESSION['id_user'])) {
    header('Location: index.php');
}

if (isset($_POST['login-button'])) {
    $user = new User();
    $user->authentication($_POST['email'], $_POST['password']);

    if (isset($user->id_user)) {
        $_SESSION['id_user'] = $user->id_user;
        $_SESSION['id_role'] = $user->id_role;
        $_SESSION['first_name'] = $user->first_name;
        if(isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
        
        header("location: index.php");
    } else {
        $_SESSION['error'] = true;
    }
}
?>


<?php ob_start(); ?>
<h2>Connexion</h2>
<div class="login-form-container">
    <form class="login-form" method="post">
        <div class="input-container">
            <label for="email">Adresse mail :</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="input-container">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password">
        </div>
        <?php if(isset($_SESSION['error'])) echo '<small>Identifiants incorrects.</small>'; ?>
        <button type="submit" name="login-button">Se connecter</button>
    </form>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require './views/templates/main_layout.php'; ?>