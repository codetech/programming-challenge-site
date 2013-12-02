<?php
if ((isset($_POST['id']) && $_POST['id'] != '') &&
    (isset($_POST['submission']) && $_POST['submission'] != ''))
{
	include 'Challenge.php';
	$chal = Challenge::get($_POST['id']);
	$chal->addSubmission($_POST['submission']);
	$success = $chal->save();
}
?>

<?php if ($chal): ?>
	<pre><?php var_dump($chal); ?></pre>
<?php endif; ?>

<?php if ($success): ?>
	Challenge "<?php echo $chal->name; ?>" updated and saved.
<?php else: ?>
	Failed to add submission to challenge.
<?php endif; ?>
