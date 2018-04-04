<h2>
	<a href="<?=Uri::create('index.php/orm/index'); ?>">Courses</a>
	» Add
</h2>
<div class="h2Content">
	Add Course
	<form method="post">
		<label for="id">Course Name</label>
		<input type="text" name="name" />
		<br />
		<label for="id">Course Number</label>
		<input type="text" name="number" />
		<br />
		<label for="id">Number of assignments</label>
		<input type="text" name="assignments" />
		<br />
		<input type="submit" value="Add Course" />
	</form>
</div>
