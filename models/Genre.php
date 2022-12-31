<?php

class Genre extends Table
{
    public function __construct()
    {
        $table_name = 'genres';
        $primary_key_field_name = 'id_genre';
        $fields_names = ['id_genre', 'name'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }
}
