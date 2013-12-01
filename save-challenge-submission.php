<?php
if (isset($_POST['title']) && $_POST['title'] != '')
{
	include 'ChallengeSubmission.php';
	
	$chalSub = new ChallengeSubmission(null, 1, new DateTime(), $_POST['title'], 'A challenge submission.', 'Smitty', 'https://github.com/jquery/jquery.git', 'mit');
	$chalSub->save();
	
	echo 'Challenge ' . $chalSub->title . ' saved.';
}
else
{
	echo 'No title specified!';
}
