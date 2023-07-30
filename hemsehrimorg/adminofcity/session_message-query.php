<?php

$query = $db->prepare("SELECT * FROM admintoadminofcity_message_info WHERE adminofcity_username=?");
$query->execute([$adminofcity_username]);
$messageList = $query->fetchAll(PDO::FETCH_OBJ);

?>