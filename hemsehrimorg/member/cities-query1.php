<?php

$query = $db->prepare('SELECT city_id, city_name, city_username, city_img
                        FROM city
                        WHERE city_username NOT IN (SELECT city_username
                                                FROM member_city
                                                WHERE member_city.member_username =?)
                        ORDER BY city_username ASC');
$query->execute([$member_username]);
$city_list = $query->fetchAll(PDO::FETCH_OBJ);

?>