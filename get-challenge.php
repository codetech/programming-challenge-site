<?php
if (isset($_GET['id']) && $_GET['id'] != '')
{
	include 'Challenge.php';
	$chal = Challenge::get($_GET['id']);
}
?>

<?php if ($chal): ?>
	<pre><?php var_dump($chal); ?></pre>
	Challenge "<?php echo $chal->name; ?>" gotten.
<?php else: ?>
	Failed to get challenge.
<?php endif; ?>
