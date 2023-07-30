<?php

$query = $db->prepare('SELECT * FROM adminofcity ORDER BY adminofcity_username ASC');
$query->execute();
$adminofcity_list = $query->fetchAll(PDO::FETCH_OBJ);

?>