<?php
// aws
$db = new PDO('mysql:host=172.31.22.43;dbname=Branden1137913', 'Branden1137913', 'Lk0ULGu41Y');

// local
//$db = new PDO('mysql:host=localhost;dbname=Branden1137913', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>