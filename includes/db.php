<?php
// Singleton !!! o singura conexiune la DB
class Db {
    private static $connection;
    public static function getInstance()
    {
        if (self::$connection) {
            return self::$connection;
        }
        self::connect();
        return self::$connection;
    }

    private static function connect()
    {
        $db['db_host']="localhost";
        $db['db_user']="apitaro_a";
        $db['db_pass']="parola.db.22";
        $db['db_name']="apitaro_db";
        foreach($db as $key=>$value)
        {
            define(strtoupper($key),$value);
        }

        $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if (!$connection)
        {
            echo "Error connecting to database";
        }

        self::$connection = $connection;
    }
}
