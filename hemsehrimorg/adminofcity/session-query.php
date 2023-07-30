<?php

$query = $db->prepare('SELECT * FROM adminofcity WHERE adminofcity_username =?');
$query->execute([$adminofcity_username]);
$adminofcity_session_info = $query->fetchAll(PDO::FETCH_OBJ);

?>