<?php

require_once __DIR__ . "/database-connection.php";

try {
    $conn = connectToSynKitchenDatabase();
} catch (Exception $error) {
    die($error->getMessage());
}

?>