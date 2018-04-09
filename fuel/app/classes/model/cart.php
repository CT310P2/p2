<?php

namespace Model;

class Cart extends \Orm\Model
{
  protected static $_table_name = 'cart';
  
  protected static $_primary_key = array('id');
  
  protected static $_properties = array(
    'id',
    'dId',
    'uId',
    'userName'
  );
}
