<?php

namespace Model;

class Demo extends \Orm\Model
{
	protected static $_table_name = 'demos';
	protected static $_has_many = array('examples' => array(
        'key_from' => 'id',
        'model_to' => 'Model\Example',
        'key_to' => 'demos_id',
        'cascade_save' => true,
        'cascade_delete' => false,
    ));
	protected static $_many_many = array(
		'types' => array(
			'table_through' => 'demotypes',
			'model_to' => 'Model\Type',
			'key_through_to' => 'types_id',
			'key_through_from' => 'demos_id',
		)
	);

	public function __toString()
	{
		return $this->id . '-' . $this->name;
	}

	public function setAll($post)
	{
		foreach($post as $field => $value)
		{
			$this->{$field} = $value;
		}
	}

	public function simpleValidate()
	{
		//Name
		// Not Empty, > 2 chars < 255 chars
		return strlen($this->name) > 2 && strlen($this->name) < 255;
	}

	public function betterValidate()
	{
		$errors = array();
		if(strlen($this->name) <= 2)
			$errors['name'] = 'Name must contain at least 3 characters';
		if(strlen($this->name) >= 255)
			$errors['name'] = 'Name must contain less than 255 characters';

		return $errors;
	}

	public function fuelValidate()
	{

	}

	//const FILENAME = "demo.model";
	//
	//private $field_values = array();
	//
	//public $isStoredRecord = false;
	//
	//public function __construct($id = null)
	//{
	//	if($id !== null)
	//	{
	//		if(is_array($id))
	//		{
	//			$this->field_values = $id;
	//			$this->isStoredRecord = true;
	//		}
	//		elseif(file_exists(self::FILENAME))
	//		{
	//			$data = unserialize(file_get_contents(self::FILENAME));
	//			if(isset($data[$id]))
	//			{
	//				$this->field_values = $data[$id];
	//				$this->isStoredRecord = true;
	//			}
	//		}
	//	}
	//}
	//
	//public function __get($name)
	//{
	//	return $this->field_values[$name];
	//}
	//
	//public function __set($name, $value)
	//{
	//	$this->field_values[$name] = $value;
	//}
	//
	//public function __isset($name)
	//{
	//	return isset($this->field_values[$name]);
	//}
	//
	//public function save()
	//{
	//	$data = array();
	//	if(file_exists(self::FILENAME))
	//	{
	//		$data = unserialize(file_get_contents(self::FILENAME));
	//	}
	//	$data[$this->field_values['id']] = $this->field_values;
	//	file_put_contents(self::FILENAME, serialize($data));
	//	$this->isStoredRecord = true;
	//}
	//
// 	public static function getAll()
// 	{
// 		$return = array();
// 		if(file_exists(self::FILENAME))
// 		{
// 			$data = unserialize(file_get_contents(self::FILENAME));
// 			foreach($data as $id => $model)
// 			{
// 				$return[$id] = new Demo($model);
// 			}
// 		}
// 		return $return;
// 	}
	//
	//public function delete()
	//{
	//	$data = array();
	//	if(file_exists(self::FILENAME))
	//	{
	//		$data = unserialize(file_get_contents(self::FILENAME));
	//		unset($data[$this->id]);
	//	}
	//	$this->field_values = array();
	//	file_put_contents(self::FILENAME, serialize($data));
	//	$this->isStoredRecord = false;
	//}
	//
	//public function __toString()
	//{
	//	return $this->id . '-' . $this->name;
	//}
	//
	//public function setAll($post)
	//{
	//	foreach($post as $field => $value)
	//	{
	//		$this->{$field} = $value;
	//	}
	//}
	//
	//public function simpleValidate()
	//{
	//	//Name
	//	// Not Empty, > 2 chars < 255 chars
	//	return strlen($this->name) > 5 && strlen($this->name) < 255;
	//}
	//
	//public function betterValidate()
	//{
	//	$errors = array();
	//	if(strlen($this->name) <= 10)
	//		$errors['name'] = 'Name must contain at least 3 characters';
	//	if(strlen($this->name) >= 255)
	//		$errors['name'] = 'Name must contain less than 255 characters';
	//
	//	return $errors;
	//}
	//
	//public function fuelValidate()
	//{
	//
	//}
}




















