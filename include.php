<?
session_start();

require_once("lib/myclass.php");
include_once("lib/db_config.php");

if(!isset($obj))
	$obj=new myclass($SERVER, $DBASE, $USERNAME,$PASSWORD);



?>