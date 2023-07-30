<?php

$query = $db->prepare('SELECT * FROM city_adminofcity ORDER BY adminofcity_username ASC');
$query->execute();
$city_adminofcity_list = $query->fetchAll(PDO::FETCH_OBJ);

?>