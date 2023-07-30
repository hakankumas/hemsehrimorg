<link href="/hemsehrimorg/tools/img/hemsehrimorg.png" rel="icon">
<title>hemsehrim.org | Çıkış</title>

<?php
session_start();
session_destroy();
header("location:/hemsehrimorg/index.php");
?>