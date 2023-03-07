<?php

$dsn = "mysql://wsizpmpv1b4yo1k1:gdvkq1ywvxzeo89j@j8oay8teq9xaycnm.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/savummwta2kz104x";
$username = 'wsizpmpv1b4yo1k1';
$password = 'gdvkq1ywvxzeo89j';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = "Database Error: ";
    $error_message .= $e->getMessage();
    //include('view/error.php');
    exit();
}

?>
