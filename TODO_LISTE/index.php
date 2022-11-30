<?php  include('server.php');?>
<?php 
// EDIT
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
		$n = mysqli_fetch_array($record);
		$name = $n['name'];
		$task = $n['task'];
	}
?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>TODO LIST</title>
</head>
<header>
	<h1 style="text-align: center; color:#e0bc3b;"> Todo List  </h1>
</header>
<body>
	</div>
<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Task</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['task']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	<form method="post" action="server.php" >
		<div class="input-group">
			<h2>Add task</h2>
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>task</label>
			<input type="text" name="task" value="<?php echo $task; ?>">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		</div>
		<div class="input-group">
		<?php if ($update == true): ?>
		<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
		<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
		</div>
	</form>
</body>
</html>