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
$license = 'YjQzMzdlOTRiOGY3ZTQ0ZDQ4ZTI1YWU3MDFjMDI0ZWJmOTNjODA1NWFiZTRiNDJhNmRiYTJlZjkwODQ3N2IwMWRmNWRjYWUwZDViM2VhMmI3NzVjOTcwMzVlN2ZhODI1Y2EyMmE3NDI0ZmE0ZjVmNGQ2MWEzN2M3MTA4MThhMDUsZXlKdVlXMWxJam9pY0dGMWJDNW9iMlJsYkNJc0ltUmhkR1VpT2pFMk16SXdPVEkwTURBc0ltUnZiV0ZwYmlJNld5SnFjMlpwWkdSc1pTNXVaWFFpTENKcVpYaGpaV3d1Ym1WMElpd2lZMjlrWlhOaGJtUmliM2d1YVc4aUxDSnFjMmhsYkd3dWJtVjBJaXdpTVROemQyMHVZM05pTG1Gd2NDSXNJbXh2WTJGc2FHOXpkQ0pkTENKd2JHRnVJam9pTXlKOQ==';

// Jspreasdheet Db class - Updates the table users to whatever table name
$jss = new \Jspreadsheetdb($database, 'users');
// Define the primary key
$jss->setPrimaryKey('user_id');

if (Render::isAjax()) {
    echo $jss->save($_POST);
} else {
    echo '<html>
        <script src="https://jspreadsheet.com/v10/jspreadsheet.js"></script>
        <link rel="stylesheet" href="https://jspreadsheet.com/v10/jspreadsheet.css" type="text/css" />
        <script src="https://jsuites.net/v5/jsuites.js"></script>
        <link rel="stylesheet" href="https://jsuites.net/v5/jsuites.css" type="text/css" />
        <script>
        jspreadsheet.setLicense("Y2EzNjI4ODU4Y2Q5MTZmMWQwNWMwMWUwM2VlMzVkMzYwYjcyMWFjNTE4YzExYjgzMjlhYTc3MzBlOGM5NDQ1N2NmZTk2N2JjYzYxZGVkNDM2NjQxY2M4YTA2YzhhMDgyMGRlNTA3OTViMmU4ZGRkODY0MDljZmI0ODBjOTQ2NmUsZXlKdVlXMWxJam9pU25Od2NtVmhaSE5vWldWMElpd2laR0YwWlNJNk1UY3dOekExTURRNE9Td2laRzl0WVdsdUlqcGJJbXB6Y0hKbFlXUnphR1ZsZEM1amIyMGlMQ0pqYjJSbGMyRnVaR0p2ZUM1cGJ5SXNJbXB6YUdWc2JDNXVaWFFpTENKamMySXVZWEJ3SWl3aWQyVmlJaXdpYkc5allXeG9iM04wSWwwc0luQnNZVzRpT2lJek5DSXNJbk5qYjNCbElqcGJJblkzSWl3aWRqZ2lMQ0oyT1NJc0luWXhNQ0lzSW1Ob1lYSjBjeUlzSW1admNtMXpJaXdpWm05eWJYVnNZU0lzSW5CaGNuTmxjaUlzSW5KbGJtUmxjaUlzSW1OdmJXMWxiblJ6SWl3aWFXMXdiM0owWlhJaUxDSmlZWElpTENKMllXeHBaR0YwYVc5dWN5SXNJbk5sWVhKamFDSXNJbkJ5YVc1MElpd2ljMmhsWlhSeklsMHNJbVJsYlc4aU9uUnlkV1Y5");
        </script>';

    echo $jss->create([]);
}
