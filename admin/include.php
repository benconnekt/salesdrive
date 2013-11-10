<?
session_start();

require_once("../lib/myclass.php");
include_once("../lib/db_config.php");

if(!isset($obj))
	$obj=new myclass($SERVER, $DBASE, $USERNAME,$PASSWORD);


include_once("../lib/messages.php");

include_once("../function/gen_db.inc.php");
include_once("../function/gen_function.inc.php");

gendb_getGeneralVar();
?>