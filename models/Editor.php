<?php

class Editor extends Table
{
    public function __construct()
    {
        $table_name = 'editors';
        $primary_key_field_name = 'id_editor';
        $fields_names = ['id_editor','name'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }
}
