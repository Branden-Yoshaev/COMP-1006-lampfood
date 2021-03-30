<!DOCTYPE html>
<html>
<head>
    <title>Database Connection</title>
</head>
<body>
<?php
    $db = new PDO('mysql:host=172.31.22.43;Branden1137913', 'Branden1137913', 'Lk0ULGu41Y');
    if (!$db)  {
        echo 'could not connect';
    }
    else {
        echo 'connected to the database';
    }
    $db = null;
?>
</body>
</html>