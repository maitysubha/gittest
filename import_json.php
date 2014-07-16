<?php
$cc = mysql_connect('localhost','root',')qSa!04&xz#Ln(+');
mysql_select_db('subhamoy_flightbooking',$cc);

$f = file_get_contents('http://118.139.161.84/subhamoy/flightbooking/airports.json');

if(!function_exists('json_decode')) die('Your host does not support json');
$feed = json_decode($f);

for($i=0; $i<count($feed); $i++)
{
    $sql = array();
	$arr = (array) $feed[$i];
	
    foreach($arr as $key => $value){
        $sql[] = "`$key` = '" . $value . "'";
    }
	
    $sqlclause = implode(",",$sql);
	
    $rs = mysql_query("INSERT INTO airports SET $sqlclause");
}?>