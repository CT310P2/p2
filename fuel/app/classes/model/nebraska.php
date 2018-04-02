<?php

namespace Model;

class Nebraska extends \Orm\Model
{
    protected static $_connection = 'ewanlp';
    
    protected static $_properties = array(
        'id', // both validation & typing observers will ignore the PK
        'name' => array(
            'data_type' => 'varchar',
            'label' => 'Article Name',
            'validation' => array('required', 'min_length' => array(3), 'max_length' => array(20)),
            'form' => array('type' => 'text'),
            'default' => 'New article',
        ),
        'gender' => array(
            'data_type' => 'varchar',
            'label' => 'Gender',
            'form' => array('type' => 'select', 'options' => array('m' => 'Male', 'f' => 'Female')),
            'validation' => array('required'),
        ),
        'created_at' => array(
            'data_type' => 'int',
            'label' => 'Created At',
            'form' => array(
                'type' => false, // this prevents this field from being rendered on a form
            ),
        ),
        'updated_at' => array('data_type' => 'int', 'label' => 'Updated At')
    );
    public static $id;
    public $pass;
    const FILENAME = "nebraska.model";
    const file = 'user.txt';

    public function __construct($id = null, $pass = null){
      if( strpos(file_get_contents("./user.txt"),$id) !== false) {

      }
    }
    public function lAuth(){

    }
    public function save()
    {
        $data = array();
        if (file_exists(self::FILENAME)) {
            $data = unserialize(file_get_contents(self::FILENAME));
        }
        $data[$this->field_values['id']] = $this->field_values;
        file_put_contents(self::FILENAME, serialize($data));
        $this->isStored = true;
    }
}
