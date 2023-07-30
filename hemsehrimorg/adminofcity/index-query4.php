<?php

$query = $db->prepare('SELECT * FROM count_noticeofcity');
$query->execute();
$count_noticeofcity = $query->fetchAll(PDO::FETCH_OBJ);

?>