<?php

$query = $db->prepare('SELECT * FROM admin WHERE admin_username =?');
$query->execute([$admin_username]);
$admin_session_info = $query->fetchAll(PDO::FETCH_OBJ);

?>