<?php

chdir('..');

include 'config.php';
include 'vendor/autoload.php';
include 'public/Jspreadsheetdb.php';

use \bossanova\Database\Database;
use \bossanova\Render\Render;

// Connect to the database

$database = Database::getInstance(null, [
    DB_CONFIG_TYPE,
    DB_CONFIG_HOST,
    DB_CONFIG_USER,
    DB_CONFIG_PASS,
    DB_CONFIG_NAME
]);

// Jspreadsheet license
$license = 'ZTk0NmUwMDYzMTk4NTY0ZDNiMjhhOGM5M2NlNjdhNDNiM2M2MjQ2YTkwZDZiNDMzMjQxYmJhOWY4MDBhODc4OTEzNTQyNGQ0MWUwODAwNWIzMDc2NjU2NzExMWUwYTMxZjMyYmJkODIzMzZiYjE5MjQ4Mjc1OTYzZDVkYjZjMzMsZXlKamJHbGxiblJKWkNJNklpSXNJbTVoYldVaU9pSktjM0J5WldGa2MyaGxaWFFpTENKa1lYUmxJam94TnpJMU5UZ3pNVE0yTENKa2IyMWhhVzRpT2xzaWFuTndjbVZoWkhOb1pXVjBMbU52YlNJc0ltTnZaR1Z6WVc1a1ltOTRMbWx2SWl3aWFuTm9aV3hzTG01bGRDSXNJbU56WWk1aGNIQWlMQ0ozWldJaUxDSnNiMk5oYkdodmMzUWlYU3dpY0d4aGJpSTZJak0wSWl3aWMyTnZjR1VpT2xzaWRqY2lMQ0oyT0NJc0luWTVJaXdpZGpFd0lpd2lkakV4SWl3aVkyaGhjblJ6SWl3aVptOXliWE1pTENKbWIzSnRkV3hoSWl3aWNHRnljMlZ5SWl3aWNtVnVaR1Z5SWl3aVkyOXRiV1Z1ZEhNaUxDSnBiWEJ2Y25SbGNpSXNJbUpoY2lJc0luWmhiR2xrWVhScGIyNXpJaXdpYzJWaGNtTm9JaXdpY0hKcGJuUWlMQ0p6YUdWbGRITWlMQ0pqYkdsbGJuUWlMQ0p6WlhKMlpYSWlMQ0p6YUdGd1pYTWlYU3dpWkdWdGJ5STZkSEoxWlgwPQ==';

// Jspreasdheet Db class - Updates the table users to whatever table name
$jss = new \Jspreadsheetdb($database, 'users');
// Define the primary key
$jss->setPrimaryKey('user_id');

if (Render::isAjax()) {
    echo json_encode($jss->save($_POST));
} else {
    echo "<html>
        <script src='https://jspreadsheet.com/v11/jspreadsheet.js'></script>
        <link rel='stylesheet' href='https://jspreadsheet.com/v11/jspreadsheet.css' type='text/css' />
        <script src='https://jsuites.net/v5/jsuites.js'></script>
        <link rel='stylesheet' href='https://jsuites.net/v5/jsuites.css' type='text/css' />
        <script>
        jspreadsheet.setLicense(\"$license\");
        </script>";

    echo $jss->create([]);
}
