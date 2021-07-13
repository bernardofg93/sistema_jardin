<?php

class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', 'root', 'db_jrm_v1');
        $db->query("SET 'UTF8'");
        return $db;
    }
}

function Conectet()
{
    $db = new mysqli('localhost', 'root', '', 'db_jrm_v1');
    return $db;
}
