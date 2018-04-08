<?php

namespace Model;

class Comments extends \Orm\Model
{
	protected static $_table_name = 'comments';

	protected static $_primary_key = array('id');

	protected static $_properties = array(
			'id',
			'userId',
			'userName',
			'destName',
			'commentText',
			'postTime',
			'deleted',
      'dId'
	);
}
