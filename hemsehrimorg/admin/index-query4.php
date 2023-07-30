<?php

$query = $db->prepare('SELECT * FROM count_adminofcity');
$query->execute();
$count_adminofcity = $query->fetchAll(PDO::FETCH_OBJ);

?>