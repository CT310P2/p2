<?php

namespace Model;

class Dest extends \Orm\Model
{
//     protected static $_connection = 'ewanlp';
    
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
    
}
