<?php

$query = $db->prepare('SELECT * FROM noticeofcity WHERE city_username =? ORDER BY noticeofcity_registerDate DESC');
$query->execute([$city_username]);
$noticeofcity = $query->fetchAll(PDO::FETCH_OBJ);

?>