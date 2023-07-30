<?php

$query = $db->prepare('SELECT * FROM member ORDER BY member_username ASC');
$query->execute();
$member_list = $query->fetchAll(PDO::FETCH_OBJ);

?>