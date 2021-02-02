<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving your Item</title>
</head>
<body>
<?php
// 1. store the form inputs in variables (optional but reduces syntax errors)
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$categoryId = $_POST['categoryId'];
$ok = true;

// 1a. validate inputs before saving
if (empty(trim($name))) {
    echo 'Name is required<br />';
    $ok = false;
}

if (empty($quantity)) {
    echo 'Quantity is required<br />';
    $ok = false;
}
else {
    if (!is_numeric($quantity)) {
        echo 'Quantity must be a number<br />';
        $ok = false;
    }
    else {
        if ($quantity < 1) {
            echo 'Quantity must be greater than zero';
            $ok = false;
        }
    }
}

if (empty($categoryId)) {
    echo 'Category is required<br />';
    $ok = false;
}
else {
    if (!is_numeric($categoryId)) {
        echo 'Category must be a number<br />';
        $ok = false;
    }
    else {
        if ($categoryId < 1) {
            echo 'Category must be greater than zero';
            $ok = false;
        }
    }
}

if ($ok) {
    // 2. connect to db
    $db = new PDO('mysql:host=172.31.22.43;dbname=Branden1137913', 'Branden1137913', 'Lk0ULGu41Y');

    // 3. set up an SQL INSERT command w/2 parameters that have : prefixes
    $sql = "INSERT INTO items (name, quantity, categoryId) VALUES (:name, :quantity, :categoryId)";

    // 4. populate the INSERT with our variables using a Command variable to prevent SQL Injection
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
    $cmd->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $cmd->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

    // 5. execute the INSERT to save the data
    $cmd->execute();

    // 6. disconnect
    $db = null;

    // 7. show confirmation message to user
    echo "<h1>Item Saved</h1>";
}
?>
</body>
</html>