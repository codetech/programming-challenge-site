<?php
include 'DatabaseConnection.php';
include 'DatabaseObject.php';

class Challenge implements DatabaseObject
{
	const DB_TABLE = 'challenges';
	const DB_PRIMARY_KEY = 'id';
	
	public $id;
	public $date;
	public $name;
	public $description;
	public $winningSubmission;
	public $submissions;
	
	public function __construct($id, $date, $name, $description, $winningSubmission, $submissions)
	{
		$this->id = intval($id);
		$this->date = (is_string($date)) ? new DateTime($date) : $date;
		$this->name = $name;
		$this->description = $description;
		$this->winningSubmission = intval($winningSubmission);
		$this->submissions = explode(',', $submissions);
		foreach ($this->submissions as &$value)
			$value = intval($value);
	}
	
	public function save()
	{
		// Format data for DB.
		$date = $this->date->format('Y-m-d H:i:s');
		$submissions = implode(',', $this->submissions);
		
		$dbh = (new DatabaseConnection())->connect();
		
		// Prepare and execute query.
		$stmt = $dbh->prepare('INSERT INTO ' . self::DB_TABLE . ' (date, name, description, winning_submission, submissions) VALUES (?, ?, ?, ?, ?)');
		$stmt->execute(array($date, $this->name, $this->description, $this->winningSubmission, $submissions));
		
		$dbh = null;
		return $this;
	}
	
	public static function get($id)
	{
		$dbh = (new DatabaseConnection())->connect();
		
		// Prepare and execute query.
		$stmt = $dbh->prepare('SELECT * FROM ' . self::DB_TABLE . ' WHERE ' . self::DB_PRIMARY_KEY . ' = ?');
		$stmt->execute(array($id));
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		
		// Create a new object using the fetched data.
		$challenge = new static($data['id'], $data['date'], $data['name'], $data['description'], $data['winning_submission'], $data['submissions']);
		
		$dbh = null;
		return $challenge;
	}
	
	// Gets all Submissions owned by this Challenge.
	public function getSubmissions()
	{
	}
}
