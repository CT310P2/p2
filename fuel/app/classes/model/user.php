<?php

namespace Model;

class User extends \Orm\Model
{
  protected static $_table_name = 'users';
  
  protected static $_primary_key = array('id');
  
  protected static $_properties = array(
    'id',
    'userName',
    'admin',
    'userPass',
    'email'
  );
  protected static $_has_many = array('comments' => array(
    'key_from' => 'id',
    'model_to' => 'Model\Comments',
    'key_to' => 'userId',
    'cascade_save' => true,
    'cascade_delete' => false,
  ));
}
