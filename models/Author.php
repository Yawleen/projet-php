<?php

class Author extends Table
{
    public function __construct()
    {
        $table_name = 'authors';
        $primary_key_field_name = 'id_author';
        $fields_names = ['id_author', 'full_name'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }
}
