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

    public static function searchAuthor($fullName)
    {
        $class_name = static::class;
        $instance = new $class_name;

        $query = "select * from authors where LOWER(full_name) LIKE \"%$fullName%\"";
        $data = my_fetch_array($query);

        if (count($data) > 0) {
            foreach ($instance->fields_names as $field)
                $instance->$field = $data[0][$field];

            return $instance;
        }
    }
}
