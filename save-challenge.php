<?php
if (isset($_POST['name']) && $_POST['name'] != '')
{
	include 'Challenge.php';
	
	$chal = new Challenge(null, new DateTime(), $_POST['name'], 'A challenge.');
	$success = $chal->save();
}
?>

<?php if ($chal): ?>
	<pre><?php var_dump($chal); ?></pre>
<?php endif; ?>

<?php if ($success): ?>
	Challenge <?php echo $chal->name; ?> saved.
<?php else: ?>
	No challenge saved.
<?php endif; ?>
