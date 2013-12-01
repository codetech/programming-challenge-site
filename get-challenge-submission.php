<?php
if (isset($_GET['id']) && $_GET['id'] != '')
{
	include 'ChallengeSubmission.php';
	$chalSub = ChallengeSubmission::get($_GET['id']);
}
?>

<?php if ($chalSub): ?>

	<pre><?php var_dump($chalSub); ?></pre>
	Challenge submission "<?php echo $chalSub->title; ?>" gotten.

<?php else: ?>

	Failed to get challenge submission.
	
<?php endif; ?>
