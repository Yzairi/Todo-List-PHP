<?php 
	session_start();
	// BDD
	$db = mysqli_connect('localhost', 'root', 'root', 'crud');
	$name = "";
	$task = "";
	$id = 0;
	$update = false;
	/*
	table name: "crud" 
	______________
	| name | task |
	––––––––––––––
	*/
	// SAVE
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$task = $_POST['task'];

		mysqli_query($db, "INSERT INTO info (name, task) VALUES ('$name', '$task')"); 
		header('location: index.php');
	}
	// UPDATE
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$task = $_POST['task'];
	
		mysqli_query($db, "UPDATE info SET name='$name', task='$task' WHERE id=$id");
		header('location: index.php');
	}
	// DELETE
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		header('location: index.php');
	}

