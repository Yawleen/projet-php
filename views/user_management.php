<?php $titre = 'Gestion des utilisateurs'; ?>
<?php $css_file = 'books_management.css'; ?>
<?php $js_file = 'script.js'; ?>

<?php ob_start(); ?>
<h2>Gestion des utilisateurs</h2>
<div class="form-container">
    <?php
    switch ($form) {
        case "1":
            echo '
            <h4>Ajout d\'un utilisateur</h4>
            <form action="index.php?page=user_management" class="addition-form" method="post">
                <div class="input-container">
                    <label for="last_name">Nom :</label>
                    <input type="text" name="last_name" id="last_name" required>
                </div>
                <div class="input-container">
                    <label for="first_name">Prénom :</label>
                    <input type="text" name="first_name" id="first_name" required>
                </div>
                <div class="input-container">
                    <label for="birthdate">Date de d\'anniversaire:</label>
                    <input type="date" id="birthdate" name="birthdate" required>
                </div>
                <div class="input-container">
                    <label for="email">Adresse mail :</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="input-container">
                    <label for="address">Adresse :</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="input-container">
                    <label for="zip_code">Code Postale :</label>
                    <input type="text" name="zip_code" id="zip_code" required>
                </div>
                <div class="input-container">
                    <label for="city">Ville :</label>
                    <input type="text" name="city" id="city" required>
                </div>
                <div class="input-container">
                    <label for="country">Pays :</label>
                    <input type="text" name="country" id="country" required>
                </div>
                <div class="input-container">
                    <label for="password">Mot de passe :</label>
                    <input type="text" name="password" id="password" required>
                </div>
                <div class="input-container">
                    <label for="role"> Rôle: </label>
                    <select id="id_role" name="role">
                        <option value="0">-- Sélectionner une option --</option>
                        <option value="1">Administrateur </option>
                        <option value="2">Utilisateur </option>
                    </select>
                </div>
                <button type="submit" name="addition-button">Valider</button>
            </form>';
            break;
        case "2":
            echo '
            <h4>Suppression d\'un utilisateur</h4>
            <form action="index.php?page=user_management" class="deletion-form" method="post">
            <div class="input-container">
            <label for="user">Utilisateur :</label>
            <select name="user" id="user">
            <option value="">-- Sélectionner un utilisateur -- </option>';
            foreach ($users as $user) {
                echo "<option value=\"$user->id_user\"> $user->last_name  $user->first_name  </option>";
            }
            echo '</select>
             </div>
             <button type="submit" name="deletion-button">Valider</button>
             </form>';
            break;
       
        default:
            echo '<form action="index.php?page=user_management" class="management-form" method="post">
                    <select name="management-user-options">
                        <option value="">-- Sélectionner une action -- </option>
                        <option value="1">Ajouter un utilisateur</option>
                        <option value="2">Supprimer un utilisateur</option>
                    </select>
                    <button type="submit" name="continue-button">Continuer</button>
                </form>';
            }
    ?>
</div>

<?php $contenu = ob_get_clean(); ?>



<?php require './views/templates/main_layout.php'; ?>