<?php

// ezt a servicet a mobil alkalmazás használja 
//
//
$db = new PDO('mysql:host=localhost;dbname=tagaster_data;charset=utf8', 'tagaster_admin', 'T4gast3r!');

$locales = array();

foreach($db->query("SELECT * FROM locales order by number") as $row){
	$locales[$row['id']] = array('id'=>$row['id'], 'name'=> $row['name'], 'programs'=>array());
}

foreach($db->query("SELECT * FROM programs ORDER BY day, start_time") as $row){
	$locales[$row['locale_id']]['programs'][] = array('name'=>$row['name'],
	'description' =>$row['description'],
	'start'=>$row['start_time'], 'end'=>$row['end_time'], 'day'=> 24 + intval($row['day']));
}

$response = $locales;

header("Content-Type: application/json");
echo json_encode(array_values($response));