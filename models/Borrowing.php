<?php

class Borrowing extends Table
{
    public function __construct()
    {
        $table_name = 'borrowings';
        $primary_key_field_name = 'id_borrowing';
        $id_book = 'id_book';
        $fields_names = ['id_borrowing', 'id_book', 'id_user', 'availability'];
        parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }
   

    public function borrowBook($id_user, $id_book){
        
        $query = '';
        if (isset($this->{$this->primary_key_field_name}))
		{

            $query .= "UPDATE $this->table_name SET  availability = 2 , id_user = \"$id_user\"  WHERE id_book = \"$id_book\"";
			 my_query($query); 
		}
    }
    public function renderBook($id_user, $id_book){

        $query = '';
        if (isset($this->{$this->primary_key_field_name}))
		{
            $query .= "UPDATE $this->table_name SET  availability = 1 , id_user = 0  WHERE id_book = \"$id_book\"";
			my_query($query);
		}
    }

    /*  public function getBookBorrow($id_user, $id_book, $availaibilty){
        $query = '';
        if (isset($this->{$this->primary_key_field_name}))
		{
            $query .= "SELECT books.id_book, title ,  books.id_author, books.release_date , books.isbn, books.id_genre, books.id_editor FROM books LEFT JOIN borrowings ON books.id_book = borrowings.id_book  LEFT JOIN users ON users.id_user = borrowings.id_user   WHERE \"$availaibilty\" = 2";
            echo $query; 
            my_fetch_array($query);
        }
      }  */

 /*    public static function getBookBorrow($id_user, $id_book)
    {
        $class_name = static::class;
        $instance = new $class_name;
        $table_user = 'users';
        $table_books = 'books';

        $query = '';
        $query .= "SELECT * From books";
       /*  $query .= "SELECT *  FROM $table_books LEFT JOIN $instance->table_name ON books.id_book = \"$id_book\" LEFT JOIN $table_user ON users.id_user =  \"$id_user\"   WHERE borrowings.availability = 2";
        echo $query; 
        echo $query;
        my_fetch_array($query);
    } */
        
    /* public static function getBookBorrow()
	{
       
		$class_name = static::class;
		$instance_base = new $class_name;
		$objects = [];
        $table_user = 'users';
        $table_books = 'books';

		$query = 'select * from ' . $instance_base->table_name;
        $query = "SELECT *  FROM $table_books LEFT JOIN $instance_base->table_name ON books.id_book = \"$id_book\" LEFT JOIN $table_user ON users.id_user =  \"$id_user\"   WHERE borrowings.availability = 2";
        echo $instance_base->table_name;
		$lines = my_fetch_array($query);
		foreach ($lines as $line) {
			$instance = new $class_name;
			foreach ($instance->fields_names as $field)   
                if( $line[$field] ==2)
				$instance->$field = $line[$field];
            echo $instance->$field;
            
			$objects[] = $instance;
		}
        
		return $objects;
	} */
      

}
