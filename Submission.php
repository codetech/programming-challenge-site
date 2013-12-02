<?php
/*
 * Database Object for contest Submissions.
 * Owned-by a Challenge.
 */
include 'functions.php';
include 'DatabaseConnection.php';
include 'DatabaseObject.php';

class Submission implements DatabaseObject
{
	const DB_TABLE = 'submissions';
	const DB_PRIMARY_KEY = 'id';
	
	public $id;				/** int **/
	public $challengeId;	/** int **/
	public $date;			/** DateTime **/
	public $title;			/** string **/
	public $description;	/** string **/
	public $author;			/** string **/
	public $repository;		/** string **/
	public $license;		/** string "mit", "gpl", "copyright" **/
	public $grades;			/** array([int 0-35, ...]) **/
	public $winner;			/** bool **/
	
	public function __construct($id, $challengeId, $date, $title, $description, $author, $repository, $license, $grades = array(), $winner = false)
	{
		$this->id = (is_null($id)) ? $id : intval($id);
		$this->challengeId = intval($challengeId);
		$this->date = (is_string($date)) ? new DateTime($date) : $date;
		$this->title = $title;
		$this->description = $description;
		$this->author = $author;
		$this->repository = $repository;
		$this->license = $license;
		$this->grades = csv_to_array($grades, function($value) {
			return intval($value);
		});
		$this->winner = $winner;
	}
	
	public function save()
	{
		// Format data for DB.
		$date = datetime_to_string($this->date);
		$grades = array_to_csv($this->grades);
		
		// Establish DB connection.
		$dbh = (new DatabaseConnection())->connect();
		
		// Prepare and execute query.
		// Add.
		if (is_null($this->id)) {
			$stmt = $dbh->prepare('INSERT INTO ' . self::DB_TABLE . ' (challenge_id, date, title, description, author, repository, license, grades, winner) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
			$success = $stmt->execute(array($this->challengeId, $date, $this->title, $this->description, $this->author, $this->repository, $this->license, $grades, $this->winner));
		}
		// Edit.
		else {
			$stmt = $dbh->prepare('UPDATE ' . self::DB_TABLE . ' SET challenge_id = ?, date = ?, title = ?, description = ?, author = ?, repository = ?, license = ?, grades = ?, winner = ? WHERE ' . self::DB_PRIMARY_KEY . ' = ?');
			$success = $stmt->execute(array($this->challengeId, $date, $this->title, $this->description, $this->author, $this->repository, $this->license, $grades, $this->winner, $this->id));
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
		$submission = new static($data['id'], $data['challenge_id'], $data['date'], $data['title'], $data['description'], $data['author'], $data['repository'], $data['license'], $data['grades'], $data['winner']);
		
		// Close connection.
		$dbh = null;
		
		return $submission;
	}
	
	// Get the Challenge which this Submission belongs to.
	public function getChallenge()
	{
	}
	
	// Parses an array of point values (typically provided by user input),
	// pushing the final integer score to the end of $this->grades.
	public function setGrade($arr)
	{
	}
	
	// Quick and dirty testing for setting grades.
	public function setGradeTest($grade)
	{
		array_push($this->grades, intval($grade));
	}
}
