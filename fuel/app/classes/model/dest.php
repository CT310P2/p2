<?php

namespace Model;

class Dest extends \Orm\Model
{
  protected static $_table_name = 'destinations';
  
  protected static $_primary_key = array('id');
  
  protected static $_properties = array(
    'id',
    'name',
    'image',
    'imageName',
    'overview',
    'history',
    'facts',
  );
  protected static $_has_many = array('comments' => array(
    'key_from' => 'id',
    'model_to' => 'Model\Comments',
    'key_to' => 'dId',
    'cascade_save' => true,
    'cascade_delete' => false,
  ));
}
