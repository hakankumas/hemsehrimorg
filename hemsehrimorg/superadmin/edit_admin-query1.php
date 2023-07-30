<?php

$query = $db->prepare('SELECT * FROM admin ORDER BY admin_type DESC, admin_username ASC');
$query->execute();
$admin_list = $query->fetchAll(PDO::FETCH_OBJ);

?>