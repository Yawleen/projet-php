<?php

class Borrowing extends Table
{
    public function __construct()
    {
        $table_name = 'borrowings';
        $primary_key_field_name = 'id_borrowing';
        $fields_names = ['id_borrowing', 'id_book', 'id_user', 'availability'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }

    public static function get_one_by_bookid($id_book)
    {
        $query = 'select id_borrowing from borrowings where id_book =' . $id_book;
        $data = my_fetch_array($query);
        $borrowing = Borrowing::getOne($data[0]['id_borrowing']);

        return $borrowing;
    }
    public static function get_borrowings_by_userid($id_user)
    {
        $class_name = static::class;
        $objects = [];

        $query = 'select id_borrowing from borrowings where id_user =' . $id_user;

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
