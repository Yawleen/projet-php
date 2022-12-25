<?php

class Borrowing extends Table
{
    public function __construct()
    {
        $table_name = 'borrowings';
        $primary_key_field_name = 'id_borrowing';
        $fields_names = ['id_book', 'id_user', 'availability'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }
}
