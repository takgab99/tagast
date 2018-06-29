<?php
include_once("connect.php");
include("lib.php");

$ticket_id = isset($_POST['ticket_id']) ? $_POST['ticket_id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$community = isset($_POST['community']) ? $_POST['community'] : '';
$first_seminar = isset($_POST['first_seminar']) ? $_POST['first_seminar'] : '';
$second_seminar = isset($_POST['second_seminar']) ? $_POST['second_seminar'] : '';

$update_count = 0;
$ticket_query = $mysqli->query("SELECT id, update_count FROM registration2018 WHERE ticket_id = '" . $ticket_id . "'");
while ($registration = mysqli_fetch_array($ticket_query, MYSQLI_ASSOC)) {
  $update_id = $registration['id'];
  $update_count = $registration['update_count'] + 1;
}

$message = 'Valami hiba történt!';
if ($update_count > 0) {
  $query = $mysqli->query("UPDATE `registration2018` 
                          SET `ticket_id` = '" . $ticket_id . "', `name` =  '" . $name . "', `city` = '" . $city . "',
                          `community` = '" . $community . "', `first_seminar` = '" . $first_seminar . "',
                          `second_seminar` = '" . $second_seminar . "', `update_count` = '" . $update_count . "'
                          WHERE id = '" . $update_id . "'");

  $message = "Errormessage: " . $mysqli->error;
  $message .= 'A regisztraciodat modosítottuk!';
}
else {
  $query = $mysqli->query("INSERT INTO `registration2018` (`ticket_id`, `name`, `city`, `community`, `first_seminar`, `second_seminar`, `update_count`) 
                        VALUES('" . $ticket_id . "', '" . $name . "', '" . $city . "', '" . $community . "', 
                        '" . $first_seminar . "', '" . $second_seminar . "', '" . $update_count ."')");
  $message = "Errormessage: " . $mysqli->error;
  $message .= 'A regisztrációdat elmentettük!';
}
print $message;
print $first_seminar;
?>