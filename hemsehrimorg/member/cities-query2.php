<?php

$query = $db->prepare("SELECT member_city.member_city_id, city.city_id, member_city.city_username, 
city.city_name, city.city_img, member_city.member_username, member_city.member_city_registerDate
FROM member_city
LEFT JOIN city ON city.city_username = member_city.city_username
WHERE member_username =?
ORDER BY city.city_name ASC");
$query->execute([$member_username]);
$member_city_list = $query->fetchAll(PDO::FETCH_OBJ);

?>