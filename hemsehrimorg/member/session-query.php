<?php

$query = $db->prepare("SELECT * FROM member WHERE member_username=?");
$query->execute([$member_username]);
$sessionMember = $query->fetchAll(PDO::FETCH_OBJ);


?>
