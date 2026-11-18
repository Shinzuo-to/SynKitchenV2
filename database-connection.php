<?php

function connectToSynKitchenDatabase()
{
    $connection = mysqli_init();
    if (!$connection) {
        throw new Exception("Could not initialize the database connection.");
    }

    if (
        !$connection->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5) ||
        !$connection->options(MYSQLI_OPT_READ_TIMEOUT, 5)
    ) {
        throw new Exception("Could not configure database connection timeouts.");
    }

    try {
        $connected = $connection->real_connect(
            "localhost",
            "root",
            "",
            "the_burgerhotdog"
        );
    } catch (mysqli_sql_exception $error) {
        error_log("SynKitchen database connection failed (" . $error->getCode() . "): " . $error->getMessage());
        if ((int)$error->getCode() === 1049) {
            throw new Exception("The SynKitchen database is missing. Restore it from a backup before registering.");
        }

        throw new Exception("MySQL is not responding. Start or repair MySQL in XAMPP, then try again.");
    }

    if (!$connected) {
        error_log("SynKitchen database connection failed: " . $connection->connect_error);
        if ((int)$connection->connect_errno === 1049) {
            throw new Exception("The SynKitchen database is missing. Restore or initialize its schema before registering.");
        }
        throw new Exception("MySQL is not responding. Start or repair MySQL in XAMPP, then try again.");
    }

    return $connection;
}

?>
