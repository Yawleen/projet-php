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

    public static function searchGenre($name)
    {
        $class_name = static::class;
        $instance = new $class_name;

        $query = "select * from genres where LOWER(name) = \"$name\"";
        $data = my_fetch_array($query);

        if (count($data) > 0) {
            foreach ($instance->fields_names as $field)
                $instance->$field = $data[0][$field];

            return $instance;
        }
    }
}
