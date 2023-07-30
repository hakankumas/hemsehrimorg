<?php

$query = $db->prepare('SELECT * FROM city ORDER BY city_username ASC');
$query->execute();
$city_list = $query->fetchAll(PDO::FETCH_OBJ);

?>