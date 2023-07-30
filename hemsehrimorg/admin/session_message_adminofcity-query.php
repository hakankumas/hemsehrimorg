<?php

$query = $db->prepare("SELECT * FROM adminofcitytoadmin_message_info");
$query->execute();
$message_adminofcity = $query->fetchAll(PDO::FETCH_OBJ);

?>