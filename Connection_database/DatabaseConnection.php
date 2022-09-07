<?php
// Class with connection to Database

class DatabaseConnection {
    protected function connect() {
        try {
            $database_connection = new PDO('mysql:host=localhost; dbname= Name your Database; port= Mysql port ( most often this 3306 or 3308 )', 'Login in your Mysql', 'Password in your Mysql', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            return $database_connection;
        } catch (PDOException $e) {
            print "Hey Houston, looks like we're in trouble with connect to Database: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}