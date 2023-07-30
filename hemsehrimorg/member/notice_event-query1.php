<?php

$query = $db->prepare("SELECT *
FROM noticeofcity_city_info
WHERE city_username IN (SELECT city_username
                        FROM member_city
                        WHERE member_username = ?)
ORDER BY RAND()");
$query->execute([$member_username]);
$cities_notice = $query->fetchAll(PDO::FETCH_OBJ);


?>