<?php
/*
 * A class for connection info and establishing connections with your database.
 * 
 * Example usage:
 * 
 * $dbh = (new DatabaseConnection())->connect();
 * $stmt = $dbh->prepare(...);
 * $stmt->execute(...);
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
    // Read more about PDO: http://www.php.net/manual/en/pdo.prepared-statements.php
	public function connect()
	{
		$dbh = new PDO('mysql:host=' . DatabaseConnection::DB_HOST . ';port=' . DatabaseConnection::DB_PORT . ';dbname=' . DatabaseConnection::DB_NAME, DatabaseConnection::DB_USER, DatabaseConnection::DB_PASS);
		return $dbh;
	}
}
