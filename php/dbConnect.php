<?php 
    try
    {
        $host = 'mompopkoapi.wcoding.com';
        $user = 'mompopko_api';
        $password = 'uAVPVDMZz9N8d9RC';
        $port = '8833';
        $dbname = 'mompopko';

        $dsn = 'mysql:host='. $host . ';port=' . $port . ';dbname=' . $dbname;

        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    }
    catch (Exception $e)
    {
        die('Error: '. $e->getMessage());
    }
?>