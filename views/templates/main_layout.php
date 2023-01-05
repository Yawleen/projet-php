

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/styles/global.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <?php if (isset($css_file)) echo "<link rel=\"stylesheet\" href=\"./views/styles/$css_file\">" ?>
    <title><?= $titre ?></title>
</head>

<body>
    <header>
        <div id="logo">
            <a href="index.php">
                Brand name / Logo
            </a>
        </div>
        <?php if (isset($_GET['page']) && $_GET['page'] == 'books' && !isset($_GET['book_id'])) {
            echo '<form action="index.php?page=books" method="post"> <div class="search-bar">
       <input type="text" placeholder="Rechercher un livre" name="search-bar-input">
       <button type="submit" name="search-button"><i class="bi bi-search"></i></button>
   </div></form>';
        } ?>
        <nav id="navigation-menu">
            <ul id="menu">
                <?php if (isset($_SESSION['id_user'])) echo '<li class="menu__item"><a href="index.php?page=books">Tous nos livres</a></li>' ?>
                <?php if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 1) {
                    echo '<li class="menu__item"><a href="index.php?page=management">Gestion des livres</a></li>';
                    echo '<li class="menu__item"><a href="index.php?page=user_management">Gestion des utilisateurs</a></li>';
                } else if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 2) {
                    echo '<li class="menu__item"><a href="index.php?page=borrowings">Vos emprunts</a></li>';
                } ?>
                <?php if (isset($_SESSION['id_user'])) echo '<li class="menu__item"><a href="./views/logout.php"><i class="bi bi-box-arrow-right"></a></i></li>' ?>
            </ul>
        </nav>
    </header>
    <main>
        <?= $contenu ?>
    </main>
    <footer>
        Réalisé par Yolène CONSTABLE, Coline LEFEBVRE et Réhane MIGAN
    </footer>
    <?php if (isset($js_file)) echo "<script src=\"./views/js/$js_file\"></script>" ?>
</body>

</html>


