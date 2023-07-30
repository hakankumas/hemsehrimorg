<?php

$query = $db->prepare("SELECT * FROM admintomember_announce_info");
$query->execute([$member_username]);
$announceList = $query->fetchAll(PDO::FETCH_OBJ);

?>