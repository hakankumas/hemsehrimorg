<?php

$query = $db->prepare('SELECT * FROM adminofcity ORDER BY adminofcity_username ASC');
$query->execute();
$adminofcities = $query->fetchAll(PDO::FETCH_OBJ);

?>