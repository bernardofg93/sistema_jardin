<?php

class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', 'root', 'db_jardin_dm');
        $db->query("SET 'UTF8'");
        return $db;
    }
}

function Conectet()
{
    $db = new mysqli('localhost', 'root', '', 'db_jardin_dm');
    return $db;
}
