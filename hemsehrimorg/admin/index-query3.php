<?php

$query = $db->prepare('SELECT * FROM count_city');
$query->execute();
$count_city = $query->fetchAll(PDO::FETCH_OBJ);

?>