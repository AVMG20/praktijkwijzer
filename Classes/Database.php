<?php
namespace Classes;
use PDO;

class Database {
    public static $host = DB_HOST;
    public static $user = DB_USER;
    public static $password = DB_PASSWORD;
    public static $dbname = DB_NAME;

    /**
     * @return PDO
     */
    private static function connect(){
        try {
            $pdo = new PDO( "mysql:host=".self::$host.";dbname=".self::$dbname, self::$user, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    /**
     * query to the database
     * exmaple params
     * $sth->execute(array(':calories' => $calories, ':colour' => $colour));
     * @param $query
     * @param array $params
     * @return array
     *
     */
    public static function query($query, $params = array()){
        $stmt = self::connect()->prepare($query);
        $stmt->execute($params);
        if (explode(' ', $query)[0] == "SELECT") return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
