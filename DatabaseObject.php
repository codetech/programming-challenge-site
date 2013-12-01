<?php
/*
 * All objects which can be saved-to and loaded-from a database should implement
 * this interface's methods.
 */
interface DatabaseObject
{
	// Each class should implement these.
	// const DB_TABLE;
	// const DB_PRIMARY_KEY;
		
	// Saves the object to the database.
	// Uses DatabaseConnection and PDO.
	public function save();
	
	// Gets an object with the specified $id from the database.
	// Uses DatabaseConnection and PDO.
	static public function get($id);
}
