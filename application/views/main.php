<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Courses</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	.container {
		width: 100%;
		padding: 10px;
	}
	.form-control {
		width: 50%;
	}
	.btn {
		margin-left: 46.7%;
	}
	.row {
		padding-left: 30px;
		padding-right: 30px;
	}
	h1 {
		margin: 0;
	}
	.table {
		border: 1px solid black;
	}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<h1>Add a new course</h1>
				<form action="add" method="post" role="add_course">
					<div class="form-group">
						<label for="full_name">Name: </label>
						<input type="text" id="full_name" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="desc_id">Description: </label>
						<textarea name="desc" id="desc_id" class="form-control"></textarea>
					</div>
					<button class="btn btn-success">Add</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<h1>Courses</h1>
				<table class="table">
					<thead>
						<tr>
							<th>Course Name</th>
							<th>Description</th>
							<th>Date Added</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($my_courses)) {
						foreach($my_courses as $courses) { ?>
							<tr>
							<td><?= $courses['name'] ?></td>
							<td><?= $courses['description'] ?></td>
							<td><?= $courses['created_at'] ?></td>
							<td>
								<form action="delete" method="post" role="delete-form">
									<input type="hidden" name="action" value="<?= $courses['id'] ?>">
									<a href="delete"><button>Delete</button></a>
								</form>
							</td>
							</tr>
					<?php	} ?>
					<?php } 
					else { 
						return "nothing"; 
					}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>