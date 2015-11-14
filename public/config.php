<?php

ini_set('display_errors', 1);
ini_set('error_reporting', -1);

if (!defined('DB_DSN')) {
    define('DB_DSN', 'mysql:host=127.0.0.1;dbname=test16');
}
if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'root');
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '12345678');
}
if (!defined('CRYPT_KEY')) {
    define('CRYPT_KEY', '6Lc6CQoTAAAAAJCrW3b0_3Xx8to6MhO1X_B6T76u');
}

$db_options = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

