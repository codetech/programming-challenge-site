<?php
if (isset($_POST['title']) && $_POST['title'] != '')
{
	include 'Submission.php';
	
	$sub = new Submission(null, 1, new DateTime(), $_POST['title'], 'A submission.', 'Smitty', 'https://github.com/jquery/jquery.git', 'mit');
	$success = $sub->save();
}
?>

<?php if ($sub): ?>
	<pre><?php var_dump($sub); ?></pre>
<?php endif; ?>

<?php if ($success): ?>
	Submission <?php echo $sub->title; ?> saved.
<?php else: ?>
	No submission saved.
<?php endif; ?>
