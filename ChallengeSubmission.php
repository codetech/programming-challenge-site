<?php
include 'DatabaseConnection.php';
include 'DatabaseObject.php';

class ChallengeSubmission implements DatabaseObject
{
	const DB_TABLE = 'challenge_submissions';
	const DB_PRIMARY_KEY = 'id';
	
	public $id;
	public $challengeId;
	public $date;
	public $title;
	public $description;
	public $author;
	public $repository;
	public $license;
	
	public function __construct($id, $challengeId, $date, $title, $description, $author, $repository, $license)
	{
		$this->id = intval($id);
		$this->challengeId = intval($challengeId);
		$this->date = (is_string($date)) ? new DateTime($date) : $date;
		$this->title = $title;
		$this->description = $description;
		$this->author = $author;
		$this->repository = $repository;
		$this->license = $license;
	}
	
	public function save()
	{
		// Format data for DB.
		$date = $this->date->format('Y-m-d H:i:s');
		
		$dbh = (new DatabaseConnection())->connect();
		
		// Prepare and execute query.
		$stmt = $dbh->prepare('INSERT INTO ' . self::DB_TABLE . ' (challenge_id, date, title, description, author, repository, license) VALUES (?, ?, ?, ?, ?, ?, ?)');
		$stmt->execute(array($this->challengeId, $date, $this->title, $this->description, $this->author, $this->repository, $this->license));
		
		$dbh = null;
		return $this;
	}
	
	public static function get($id)
	{
		$dbh = (new DatabaseConnection())->connect();
		
		// Prepare and execute query.
		$stmt = $dbh->prepare('SELECT * FROM ' . self::DB_TABLE . ' WHERE ' . self::DB_PRIMARY_KEY . '  = ?');
		$stmt->execute(array($id));
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		
		// Create a new object using the fetched data.
		$challengeSubmission = new static($data['id'], $data['challenge_id'], $data['date'], $data['title'], $data['description'], $data['author'], $data['repository'], $data['license']);
		
		$dbh = null;
		return $challengeSubmission;
	}
	
	// Get the Challenge which this Submission belongs to.
	public function getChallenge()
	{
	}
}
