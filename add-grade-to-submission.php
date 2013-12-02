<?php
if ((isset($_POST['id']) && $_POST['id'] != '') &&
    (isset($_POST['grade']) && $_POST['grade'] != ''))
{
	include 'Submission.php';
	$sub = Submission::get($_POST['id']);
	$sub->setGradeTest($_POST['grade']);
	$success = $sub->save();
}
?>

<?php if ($sub): ?>
	<pre><?php var_dump($sub); ?></pre>
<?php endif; ?>

<?php if ($success): ?>
	Submission "<?php echo $sub->title; ?>" updated and saved.
<?php else: ?>
	Failed to add grade to submission.
<?php endif; ?>
