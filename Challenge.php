<?php
/*
 * Database Object for programming Challenges themselves.
 * Owns Submissions.
 */
include 'functions.php';
include 'DatabaseConnection.php';
include 'DatabaseObject.php';

class Challenge implements DatabaseObject
{
	const DB_TABLE = 'challenges';
	const DB_PRIMARY_KEY = 'id';
	
	public $id;					/** int **/
	public $date;				/** DateTime **/
	public $name;				/** string **/
	public $description;		/** string **/
	public $winningSubmission;	/** int **/
	public $submissions;		/** array([int, ...]) **/
	
	public function __construct($id, $date, $name, $description, $winningSubmission = 0, $submissions = array())
	{
		$this->id = (is_null($id)) ? $id : intval($id);
		$this->date = (is_string($date)) ? new DateTime($date) : $date;
		$this->name = $name;
		$this->description = $description;
		$this->winningSubmission = intval($winningSubmission);
		$this->submissions = csv_to_array($submissions, function($value) {
			return intval($value);
		});
	}
	
	public function save()
	{
		// Format data for DB.
		$date = datetime_to_string($this->date);
		$submissions = array_to_csv($this->submissions);
		
		// Establish DB connection.
		$dbh = (new DatabaseConnection())->connect();
		
		// Prepare and execute query.
		// Add.
		if (is_null($this->id)) {
			$stmt = $dbh->prepare('INSERT INTO ' . self::DB_TABLE . ' (date, name, description, winning_submission, submissions) VALUES (?, ?, ?, ?, ?)');
			$success = $stmt->execute(array($date, $this->name, $this->description, $this->winningSubmission, $submissions));
		}
		// Edit.
		else {
			$stmt = $dbh->prepare('UPDATE ' . self::DB_TABLE . ' SET date = ?, name = ?, description = ?, winning_submission = ?, submissions = ? WHERE ' . self::DB_PRIMARY_KEY . ' = ?');
			$success = $stmt->execute(array($date, $this->name, $this->description, $this->winningSubmission, $submissions, $this->id));
		}
		
		// Close connection.
		$dbh = null;
		
		return $success;
	}
	
	public static function get($id)
	{
		// Establish DB connection.
		$dbh = (new DatabaseConnection())->connect();
		
		// Prepare and execute query.
		$stmt = $dbh->prepare('SELECT * FROM ' . self::DB_TABLE . ' WHERE ' . self::DB_PRIMARY_KEY . ' = ? LIMIT 1');
		$stmt->execute(array($id));
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		
		// Create a new object using the fetched data.
		$challenge = new static($data['id'], $data['date'], $data['name'], $data['description'], $data['winning_submission'], $data['submissions']);
		
		// Close connection.
		$dbh = null;
		
		return $challenge;
	}
	
	// Gets all Submissions owned by this Challenge.
	public function getSubmissions()
	{
	}
	
	// Adds the id of a Submission that this Challenge owns.
	public function addSubmission($submission)
	{
		array_push($this->submissions, intval($submission));
	}
}
