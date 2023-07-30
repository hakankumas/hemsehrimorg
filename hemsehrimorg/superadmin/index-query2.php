<?php

$query = $db->prepare('SELECT * FROM count_admin');
$query->execute();
$count_admin = $query->fetchAll(PDO::FETCH_OBJ);

?>