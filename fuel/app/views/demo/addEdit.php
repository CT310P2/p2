<script type="text/javascript">
	$(function(){
		$("#main").on("submit", function(){
			if($("input[name='name']").val().length < 3)
			{
				alert("Name must contain at least 3 characters");
				return false;
			}
		});
	});
</script>
<h2>
	<a href="<?=Uri::create('demo/index'); ?>">Demos</a>
	&raquo; <?=is_object($demo)?'Edit':'Add'; ?>
</h2>
<div class="h2Content">
	<?php if(!$valid): ?>
		<div class="error">
			There was an error in saving.
		</div>
	<?php endif; ?>
	<?=is_object($demo)?'Edit':'Add'; ?> Demo Object
	<form method="post" id="main">
		<label for="id">ID</label>
		<input type="text" name="id" value="<?=isset($demo->id)?$demo->id:''; ?>" />
		<br />

		<label for="name">Name:</label>
		<input type="text" name="name" value="<?=isset($demo->name)?$demo->name:''; ?>" />
		<?php if(isset($errors) && isset($errors['name'])): ?>
			<span class="formError"><?=$errors['name']; ?></span>
		<?php endif; ?>
		<br />

		<input type="submit" value="<?=is_object($demo)?'Edit':'Add'; ?>" />
	</form>
</div>
