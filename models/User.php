<?php

class User extends Table
{
    public function __construct()
    {
        $table_name = 'users';
        $primary_key_field_name = 'id_user';
        $fields_names = ['id_user', 'last_name', 'first_name', 'birthdate', 'email', 'address', 'zip_code', 'city', 'country', 'password', 'id_role'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }
    

    public function authentication($email, $password)
    {
        $query = "select * from $this->table_name where email = \"$email\" and password = \"$password\"";

        $data = my_fetch_array($query);

        if(count($data) > 0) {
            foreach ($this->fields_names as $field) {
                $this->{$field} = $data[0][$field];
            }
        }
    }
}
