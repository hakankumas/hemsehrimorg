<?php

$query = $db->prepare("SELECT COUNT(member_city_id) AS sehir_sayisi
FROM member_city
WHERE member_username = ?");
$query->execute([$member_username]);
$countCities = $query->fetchAll(PDO::FETCH_OBJ);

?>
