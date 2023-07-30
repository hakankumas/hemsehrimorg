<?php

$query = $db->prepare("SELECT * FROM admintoadminofcity_announce_info");
$query->execute();
$announceList = $query->fetchAll(PDO::FETCH_OBJ);

?>