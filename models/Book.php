<?php

class Book extends Table
{
    public function __construct()
    {
        $table_name = 'books';
        $primary_key_field_name = 'id_book';
        $fields_names = ['id_book', 'title', 'id_author', 'id_genre', 'resume', 'release_date', 'id_editor', 'pages', 'isbn', 'media'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }

    public static function searchBook($bookTitle)
    {
        $class_name = static::class;
        $objects = [];

        $query = "select * from books where LOWER(title) LIKE \"%$bookTitle%\"";

        $lines = my_fetch_array($query);

        if (count($lines) > 0) {
            foreach ($lines as $line) {
                $instance = new $class_name;
                foreach ($instance->fields_names as $field)
                    $instance->$field = $line[$field];

                $objects[] = $instance;
            }

            return $objects;
        }
    }

    public static function get_borrowed_books()
    {

        $class_name = static::class;
        $instance_base = new $class_name;
        $objects = [];

        $query = 'select * from ' . $instance_base->table_name . ' INNER JOIN borrowings ON books.id_book = borrowings.id_book WHERE availability = 0';
        $lines = my_fetch_array($query);
        foreach ($lines as $line) {
            $instance = new $class_name;
            foreach ($instance->fields_names as $field)
                $instance->$field = $line[$field];

            $objects[] = $instance;
        }

        return $objects;
    }
}
