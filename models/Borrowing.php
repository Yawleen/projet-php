<?php

class Borrowing extends Table
{
    public function __construct()
    {
        $table_name = 'borrowings';
        $primary_key_field_name = 'id_borrowing';
        $fields_names = ['id_borrowing', 'id_book', 'id_user', 'availability'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }


    public function borrowBook($id_user, $id_book)
    {
        $query = "UPDATE $this->table_name SET  availability = 0 , id_user = \"$id_user\"  WHERE id_book = \"$id_book\"";
        my_query($query);
    }

    public function renderBook($id_user, $id_book)
    {
        $query = "UPDATE $this->table_name SET  availability = 1 , id_user = 0  WHERE id_book = \"$id_book\"";
        my_query($query);
    }

    public static function get_one_by_bookid($id_book)
    {
        $query = 'select id_borrowing from borrowings where id_book =' . $id_book;
        $data = my_fetch_array($query);
        $borrowing = Borrowing::getOne($data[0]['id_borrowing']);

        return $borrowing;
    }
}
