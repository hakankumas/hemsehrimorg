<?php

$query = $db->prepare('SELECT * FROM postofcity WHERE city_username =? ORDER BY postofcity_registerDate DESC');
$query->execute([$city_username]);
$postofcity = $query->fetchAll(PDO::FETCH_OBJ);

?>