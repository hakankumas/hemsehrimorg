<?php

$query = $db->prepare('SELECT * FROM count_postofcity');
$query->execute();
$count_postofcity = $query->fetchAll(PDO::FETCH_OBJ);

?>