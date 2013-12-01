<?php
if (isset($_POST['name']) && $_POST['name'] != '')
{
	include 'Challenge.php';
	
	$chal = new Challenge(null, new DateTime(), $_POST['name'], 'A challenge.', 4, '5, 7, 8, 9');
	$chal->save();
	
	echo 'Challenge ' . $chal->name . ' saved.';
}
else
{
	echo 'No name specified!';
}
