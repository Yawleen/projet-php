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
    if ($_SESSION['id_role'] == 1) {
        header('Location: index.php');
    }

    $books = Book::getAll();

    include('views/borrowings.php');
} else if ($page == 'books') {

    if (isset($_GET['book_id'])) {
        $bookId = $_GET['book_id'];
        $book = Book::getOne($bookId);

        if (isset($book->title)) {
            $bookGenre = Genre::getOne($book->id_genre);
            $bookAuthor = Author::getOne($book->id_author);
            $bookEditor = Editor::getOne($book->id_editor);
            $borrow = Borrowing::get_one_by_bookid($bookId);
            $user = User::getOne($borrow->id_user);

            if (isset($_POST['borrowing-button'])) {
                $borrow->id_user = $_SESSION['id_user'];
                $borrow->availability = 0;
                $borrow->save();
                echo "<script> alert('Le livre a bien été emprunté !')</script>";
            }
            if (isset($_POST['render-button'])) {
                $borrow->id_user = 0;
                $borrow->availability = 1;
                $borrow->save();
                echo "<script> alert('Le livre a bien été remis !')</script>";
            }

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
    if ($_SESSION['id_role'] == 2) {
        header('Location: index.php');
    }

    $books = Book::getAll();
    $borrowed_books = Book::get_borrowed_books();
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
            echo "<script>alert('Le livre a bien été ajouté !')</script>";
        } else {
            echo "<script>alert('Veuillez remplir tous les champs.')</script>";
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

            $newBook->save();
            echo "<script>alert('Le livre a bien été modifié !')</script>";
        }
    }

    if (isset($_POST['deletion-button'])) {
        if (isset($_POST['book']) && !empty($_POST['book'])) {
            $bookToDelete = Book::getOne($_POST['book']);
            $borrowingToDelete = Borrowing::get_one_by_bookid($_POST['book']);
            if (isset($bookToDelete) && isset($borrowingToDelete)) {
                $bookToDelete->delete();
                $borrowingToDelete->delete();
                echo "<script>alert('Le livre a bien été supprimé !')</script>";
            }
        } else {
            echo "<script>alert('Veuillez sélectionner un livre à supprimer.')</script>";
        }
    }

    if (isset($_POST['availability-button'])) {
        if (isset($_POST['book']) && !empty($_POST['book'])) {
            $borrowing = Borrowing::get_one_by_bookid($_POST['book']);
            $borrowing->id_user = 0;
            $borrowing->availability = 1;
            $borrowing->save();
            echo "<script> alert('Le livre a bien été remis !')</script>";
        } else {
            echo "<script>alert('Veuillez sélectionner un livre à remettre.')</script>";
        }
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
