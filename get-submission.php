<?php
if (isset($_GET['id']) && $_GET['id'] != '')
{
	include 'Submission.php';
	$sub = Submission::get($_GET['id']);
}
?>

<?php if ($sub): ?>
	<pre><?php var_dump($sub); ?></pre>
	Submission "<?php echo $sub->title; ?>" gotten.
<?php else: ?>
	Failed to get submission.
<?php endif; ?>
