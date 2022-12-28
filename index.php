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
require_once('models/Borrowing.php');


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
        $bookId = $_GET['book_id'];
        $book = Book::getOne($bookId);
        if (isset($book->title)) {
            $bookGenre = Genre::getOne($book->id_genre);
            $bookAuthor = Author::getOne($book->id_author);
            $bookEditor = Editor::getOne($book->id_editor);
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
    $authors = Author::getAll();
    $genres = Genre::getAll();
    $editors = Editor::getAll();

    $form = "";

    if (isset($_POST['continue-button'])) {
        $form = $_POST['management-options'];
    }

    if (isset($_POST['addition-button'])) {
        $newBook = new Book();

        if (!empty($_POST['title'])) {
            $newBook->title = ltrim(str_replace("'", "\'", $_POST['title']));
        }

        if (!empty($_POST['author'])) {
            if (intval($_POST['author']) !== 0) {
                $newBook->id_author = $_POST['author'];
            } else {
                $newAuthor = new Author();
                $newAuthor->full_name = ltrim(str_replace("'", "\'", $_POST['author']));
                $newAuthor->save();
                $newBook->id_author = $newAuthor->{$newAuthor->primary_key_field_name};
            };
        }

        if (!empty($_POST['genre'])) {
            if (intval($_POST['genre']) !== 0) {
                $newBook->id_genre = $_POST['genre'];
            } else {
                $newGenre = new Genre();
                $newGenre->name = ltrim(str_replace("'", "\'", $_POST['genre']));
                $newGenre->save();
                $newBook->id_genre = $newGenre->{$newGenre->primary_key_field_name};
            };
        }

        if (!empty($_POST['resume'])) {
            $newBook->resume = ltrim(str_replace("'", "\'", $_POST['resume']));
        }

        if (!empty($_POST['release-date'])) {
            $newBook->release_date = $_POST['release-date'];
        }

        if (!empty($_POST['editor'])) {
            if (intval($_POST['editor']) !== 0) {
                $newBook->id_editor = $_POST['editor'];
            } else {
                $newEditor = new Editor();
                $newEditor->name = ltrim(str_replace("'", "\'", $_POST['editor']));
                $newEditor->save();
                $newBook->id_editor = $newEditor->{$newEditor->primary_key_field_name};
            };
        }

        if (!empty($_POST['pages'])) {
            $newBook->pages = ltrim($_POST['pages']);
        }

        if (!empty($_POST['isbn'])) {
            $newBook->isbn = ltrim($_POST['isbn']);
        }

        if (!empty($_POST['media'])) {
            $newBook->media = ltrim($_POST['media']);
        }

        if (isset($newBook->title) && isset($newBook->id_author) && isset($newBook->id_genre) && isset($newBook->resume) && isset($newBook->release_date) && isset($newBook->id_editor) && isset($newBook->pages) && isset($newBook->isbn) && isset($newBook->media)) {
            $newBook->save();
            $newBorrowingBook = new Borrowing();
            $newBorrowingBook->id_book = $newBook->{$newBook->primary_key_field_name};
            $newBorrowingBook->id_user = 0;
            $newBorrowingBook->availability = 1;
            $newBorrowingBook->save();
            $bookAuthor = Author::getOne($newBook->id_author);
            echo "<script>alert('Le livre a bien été ajouté !')</script>";
        }
    }

    if (isset($_POST['modification-button'])) {
        if (isset($_POST['book']) && !empty($_POST['book'])) {
            $newBook = new Book();
            $newBook->{$newBook->primary_key_field_name} = $_POST['book'];

            if (!empty($_POST['title'])) {
                $newBook->title = ltrim($_POST['title']);
            }

            if (!empty($_POST['author'])) {
                $author = Author::searchAuthor(strtolower(ltrim($_POST['author'])));

                if (isset($author->id_author)) {
                    $newBook->id_author = $author->id_author;
                } else {
                    $newAuthor = new Author();
                    $newAuthor->full_name = ltrim($_POST['author']);
                    $newAuthor->save();
                    $newBook->id_author = $newAuthor->{$newAuthor->primary_key_field_name};
                }
            }

            if (!empty($_POST['genre'])) {
                $genre = Genre::searchGenre(strtolower(ltrim($_POST['genre'])));

                if (isset($genre->id_genre)) {
                    $newBook->id_genre = $genre->id_genre;
                } else {
                    $newGenre = new Genre();
                    $newGenre->name = ltrim($_POST['author']);
                    $newGenre->save();
                    $newBook->id_genre = $newGenre->{$newGenre->primary_key_field_name};
                }
            }

            if (!empty($_POST['resume'])) {
                $newBook->resume = ltrim(str_replace("'", "\'", $_POST['resume']));
            }

            if (!empty($_POST['release-date'])) {
                $newBook->release_date = $_POST['release-date'];
            }

            if (!empty($_POST['editor'])) {
                $editor = Editor::searchEditor(strtolower(ltrim($_POST['editor'])));

                if (isset($editor->id_editor)) {
                    $newBook->id_editor = $editor->id_editor;
                } else {
                    $newEditor = new Editor();
                    $newEditor->name = ltrim($_POST['editor']);
                    $newEditor->save();
                    $newBook->id_editor = $newEditor->{$newEditor->primary_key_field_name};
                }
            }

            if (!empty($_POST['pages'])) {
                $newBook->pages = ltrim($_POST['pages']);
            }

            if (!empty($_POST['isbn'])) {
                $newBook->isbn = ltrim($_POST['isbn']);
            }

            if (!empty($_POST['media'])) {
                $newBook->media = ltrim($_POST['media']);
            }

            $newBook->save();
        }
    }

    if (isset($_POST['deletion-button'])) {
        // appel au modèle pour faire un delete dans la table 'books'
    }

    if (isset($_POST['availability-button'])) {
        // appel au modèle pour faire un update dans la table 'borrowings'
    }

    include('views/books_management.php');
} elseif ($page == 'login') {

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
            if (isset($_SESSION['error'])) {
                unset($_SESSION['error']);
            }

            header("location: index.php");
        } else {
            $_SESSION['error'] = true;
        }
    }

    include('views/login.php');
} else {
    include('views/error.php');
}
