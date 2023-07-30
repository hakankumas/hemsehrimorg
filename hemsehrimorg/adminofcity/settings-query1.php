<?php

$query = $db->prepare('SELECT * FROM adminofcity WHERE adminofcity_username =?');
$query->execute([$adminofcity_username]);
$adminofcity_info = $query->fetchAll(PDO::FETCH_OBJ);

?>