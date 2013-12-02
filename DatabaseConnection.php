<?php
/*
 * A class for storing connection info, and for establishing connections
 * with a database.
 * 
 * Usage:
 * 
 *   $dbh = (new DatabaseConnection())->connect();
 *   $stmt = $dbh->prepare(...);
 *   $stmt->execute(...);
 * 
 */
class DatabaseConnection
{
	const DB_HOST = 'localhost';
	const DB_PORT = '3306';
	const DB_NAME = 'ctcc_programming_challenge';
	const DB_USER = 'root';
	const DB_PASS = '';
    
    // Get a database handler ("dbh") PDO object.
    // The dbh can be used to make queries.
    // Read more about PDO here:
    //   http://www.php.net/manual/en/pdo.prepared-statements.php
	public function connect()
	{
		$dbh = new PDO('mysql:host=' . self::DB_HOST . ';port=' . self::DB_PORT . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASS);
		return $dbh;
	}
}
