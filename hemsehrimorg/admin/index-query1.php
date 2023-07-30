<?php

$query = $db->prepare('SELECT * FROM count_superadmin');
$query->execute();
$count_superadmin = $query->fetchAll(PDO::FETCH_OBJ);

?>