<?php

$query = $db->prepare('SELECT * FROM count_member');
$query->execute();
$count_member = $query->fetchAll(PDO::FETCH_OBJ);

?>