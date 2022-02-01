<?php

	include 'database.php';
	// else simply go back to the page
	if (isset($_GET['id'])){

		// Store the value from get to a
		// local variable "course_id"
		$comId=$_GET['id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `tbl_comment` SET
			`status`=0 WHERE comId='$comId'";

		// Execute the query
		mysqli_query($conn,$sql);
	}

	// Go back to course-page.php
	header('location: manage-comment.php');
?>
