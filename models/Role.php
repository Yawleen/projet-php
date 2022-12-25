<?php

class Role extends Table
{
    public function __construct()
    {
        $table_name = 'roles';
        $primary_key_field_name = 'id_role';
        $fields_names = ['name'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }
}
