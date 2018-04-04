<?php

namespace Model;

class Dest0 extends \Orm\Model
{
    protected static $_connection = 'ewanlp';
    
    protected static $_table_name = 'destinations';
    
    protected static $_primary_key = array('name');
    
    protected static $_properties = array(
        'name',
        'image',
        'imageName',
        'overview',
        'history',
        'facts',
        ),
    );
    
}
