<h3>Testing</h3>

<h4>Save Challenge</h4>
<form action="save-challenge.php" method="post">
	<label>Name:</label> <input name="name"><br>
	<input type="submit">
</form>

<h4>Get Challenge</h4>
<form action="get-challenge.php" method="get">
	<label>Id:</label> <input name="id"><br>
	<input type="submit">
</form>

<h4>Add a Submission's id to this Challenge</h4>
<form action="add-submission-to-challenge.php" method="post">
	<label>[Challenge] Id:</label> <input name="id"><br>
	<label>[Submission] Id:</label> <input name="submission"><br>
	<input type="submit">
</form>

<hr>

<h4>Save Submission</h4>
<form action="save-submission.php" method="post">
	<label>Title:</label> <input name="title"><br>
	<input type="submit">
</form>

<h4>Get Submission</h4>
<form action="get-submission.php" method="get">
	<label>Id:</label> <input name="id"><br>
	<input type="submit">
</form>

<h4>Add a Grade to this Submission</h4>
<form action="add-grade-to-submission.php" method="post">
	<label>Id:</label> <input name="id"><br>
	<label>Grade:</label> <input name="grade"><br>
	<input type="submit">
</form>
