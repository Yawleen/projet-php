<?php
session_start();


// models
require_once('models/Table.php');
require_once('models/Book.php');
require_once('models/Genre.php');
require_once('models/Author.php');
require_once('models/Editor.php');
require_once('models/User.php');
require_once('models/Role.php');


// routing
if (!isset($_SESSION['id_user'])) {
    $page = 'login';
} else {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'home';
    }
}


// controller
if ($page == 'home') {
    $role = Role::getOne($_SESSION['id_role']);

    include('views/home.php');
} else if ($page == 'borrowings') {

    include('views/borrowings.php');
} else if ($page == 'books') {
    if (isset($_GET['book_id'])) {
        $book_id = $_GET['book_id'];
        $book = Book::getOne($book_id);
        if (isset($book->title)) {
            $book_genre = Genre::getOne($book->id_genre);
            $book_author = Author::getOne($book->id_author);
            $book_editor = Editor::getOne($book->id_editor);
            include('views/book.php');
            return;
        }

        include('views/error.php');
        return;
    }

    $books = Book::getAll();

    if (isset($_POST['search-button'])) {
        if (!empty($_POST['search-bar-input'])) {
            $filteredBooks = Book::searchBook(strtolower(ltrim($_POST['search-bar-input'])));
            if (isset($filteredBooks)) {
                $books = $filteredBooks;
            } else {
                $noResultMessage = "Il n'y a pas de résultat pour votre recherche. 😞 <br> Vous trouverez sûrement votre bonheur parmi tous nos livres :";
            }
        }
    }

    include('views/books.php');
} elseif ($page == 'management') {
    $books = Book::getAll();

    include('views/books_management.php');
} elseif ($page == 'login') {
    include('views/login.php');
} else {
    include('views/error.php');
}
