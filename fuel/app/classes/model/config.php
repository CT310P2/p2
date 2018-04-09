<?php
/*
 * Defines configuration variables for our site
 */
namespace model;
 
class Config extends \Orm\Model
{
	public $url_local    = '/yr2018sp/aplay/lec21/';//==========================
	public $url_public   = '/~sabrinaw/ct310/index.php/nebraska/addDest/';
	public $base_url     = '';  /* Selected below based upon server */
	public $site_name    = "CT 310: Handling File Uploads";
	public $site_lmod    = "3/26/17";
	public $matience     = false;
	public $session_name = "File Upload Example";
	public $up_local     = "C:/inetpub/wwwroot/yr2018sp/aplay/lec21/uploads/";//===============================
	public $up_public    = "/s/bach/e/under/sabrinaw/public_html/ct310/assets/img/";
	public $upload_dir   = ''; /* Selected below based upon server */
	public $pad_length   = 6;
}

$config = new config();

/* Select the proper base_url for development vs. public server */
$test_local_p = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', "::1")));
$config->base_url   = $test_local_p ? $config->url_local : $config->url_public;
$config->upload_dir = $test_local_p ? $config->up_local : $config->up_public;
