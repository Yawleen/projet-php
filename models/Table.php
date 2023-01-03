<?php

function my_query($query)
{
	global $link;
	mysqli_report(MYSQLI_REPORT_OFF);

	if (empty($link))
		$link = @mysqli_connect('localhost', 'root', 'root', 'library');

	if (!$link)
		die("Failed to connect to MySQL: " . mysqli_connect_error());

	$result = @mysqli_query($link, $query);
	if (!$result)
		die("Failed to execute MySQL query: " . mysqli_error($link));

	return $result;
}

function my_fetch_array($query)
{
	$result = my_query($query);
	$data = [];

	while ($line = mysqli_fetch_array($result))
		$data[] = $line;

	return $data;
}

function my_insert_id()
{
	global $link;
	$pk_val = mysqli_insert_id($link);
	return $pk_val;
}


class Table
{
	public $primary_key_field_name;
	public $table_name;
	public $fields_names;

	public function __construct(
		string $table_name,
		string $primary_key_field_name,
		array $fields_names
	) {
		$this->table_name = $table_name;
		$this->primary_key_field_name = $primary_key_field_name;
		$this->fields_names = $fields_names;
	}

	public function save()
	{
		$query = '';


		if (isset($this->{$this->primary_key_field_name})) {

			$query .= 'UPDATE ' . $this->table_name . ' SET ';

			$fields = array_slice(array_keys((array) $this), 3);
			$first = true;

			foreach ($fields as $field) {
				if ($first)
					$first = false;
				else
					$query .= ', ';
				$query .= $field . ' = \'' . $this->{$field} . '\'';
			}
			$query .= ' WHERE ' . $this->primary_key_field_name . ' = ' . $this->{$this->primary_key_field_name};
			// echo $query;
			my_query($query);
		} else {
			$query .= "INSERT INTO $this->table_name (";

			$first = true;
			$fields = array_slice($this->fields_names, 1);

			foreach ($fields as $field) {
				if ($first)
					$first = false;
				else
					$query .= ', ';
				$query .= $field;
			}
			$query .= ') VALUES (';
			$first = true;
			foreach ($fields as $field) {
				if ($first)
					$first = false;
				else
					$query .= ', ';
				$query .= '\'' . $this->{$field} . '\'';
			}

			$query .= ')';
			my_query($query);
			$pk_val = my_insert_id();
			// echo $query;
			$this->{$this->primary_key_field_name} = $pk_val;
		}
	}

	public function delete()
	{
		$query = '';

		if (isset($this->{$this->primary_key_field_name})) {

			$query .= 'DELETE from ' . $this->table_name . ' WHERE ' . $this->primary_key_field_name . ' = ' . $this->{$this->primary_key_field_name};
			my_query($query);
		}
	}

	public static function getAll()
	{

		$class_name = static::class;
		$instance_base = new $class_name;
		$objects = [];

		$query = 'select * from ' . $instance_base->table_name;
		$lines = my_fetch_array($query);
		foreach ($lines as $line) {
			$instance = new $class_name;
			foreach ($instance->fields_names as $field)
				$instance->$field = $line[$field];
				
			$objects[] = $instance;
		}

		return $objects;
	}

	public static function getOne(int $pk_value)
	{
		$class_name = static::class;
		$instance = new $class_name;
		$instance->{$instance->primary_key_field_name} = $pk_value;
		$instance->hydrate();

		return $instance;
	}

	public function hydrate()
	{
		$query = 'select * from ' . $this->table_name . ' where ' . $this->primary_key_field_name . '=' . $this->{$this->primary_key_field_name};
		$data = my_fetch_array($query);

		if (count($data) > 0) {
			foreach ($this->fields_names as $field) {
				$this->{$field} = $data[0][$field];
			}
		}
	}
}
