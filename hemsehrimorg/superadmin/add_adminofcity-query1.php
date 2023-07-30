<?php

$query = $db->prepare('SELECT * FROM city ORDER BY city_name ASC');
$query->execute();
$cities = $query->fetchAll(PDO::FETCH_OBJ);

?>