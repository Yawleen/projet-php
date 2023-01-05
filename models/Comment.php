<?php

class Comment extends Table
{
    public function __construct()
    {
        $table_name = 'comments';
        $primary_key_field_name = 'id_comment';
        $fields_names = ['id_comment', 'id_book', 'id_user', 'contents'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }
}

?>