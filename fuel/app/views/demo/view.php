<h2>
	<a href="<?=Uri::create('demo/index'); ?>">Demos</a>
	&raquo; View Demo Object
	<span class="floatRight">
		<a href="<?=Uri::create('demo/delete/'.$demo->id); ?>"
		   onclick="return confirm('Are you sure you want to delete this?');">&#x1f5d1; Delete</a>
	</span>
	<span class="floatRight">&nbsp;&nbsp;&nbsp;</span>
	<span class="floatRight">
		<a href="<?=Uri::create('demo/addEdit/'.$demo->id); ?>">&#x270E; Edit</a>
	</span>
	<span class="floatClear"></span>
</h2>
<div class="h2Content">
	ID: <?=$demo->id; ?><br />
	Name: <?=$demo->name; ?>
</div>
<h3>Examples</h3>
<div>
	<?php foreach($demo->examples as $example): ?>
		ID: <?=$example->id; ?><br />
		Name: <?=$example->name; ?><br />
	<?php endforeach; ?>
</div>
<h3>Types</h3>
<div>
	<?php foreach($demo->types as $type): ?>
		ID: <?=$type->id; ?><br />
		Name: <?=$type->name; ?><br />
	<?php endforeach; ?>
</div>
