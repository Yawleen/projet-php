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

    public static function searchEditor($name)
    {
        $class_name = static::class;
        $instance = new $class_name;

        $query = "select * from editors where LOWER(name) = \"$name\"";
        $data = my_fetch_array($query);

        if (count($data) > 0) {
            foreach ($instance->fields_names as $field)
                $instance->$field = $data[0][$field];

            return $instance;
        }
    }
}
