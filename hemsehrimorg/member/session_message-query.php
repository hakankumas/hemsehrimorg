<?php

$query = $db->prepare("SELECT * FROM admintomember_message_info WHERE member_username=?");
$query->execute([$member_username]);
$messageList = $query->fetchAll(PDO::FETCH_OBJ);

?>