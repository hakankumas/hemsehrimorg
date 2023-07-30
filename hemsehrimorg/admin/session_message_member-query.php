<?php

$query = $db->prepare("SELECT * FROM membertoadmin_message_info");
$query->execute();
$message_member = $query->fetchAll(PDO::FETCH_OBJ);

?>