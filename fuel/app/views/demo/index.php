<h2>
	Index of Demos
	<span class="floatRight">
		<a href="<?=Uri::create('demo/addEdit'); ?>">+ Add Demo</a>
	</span>
	<span class="floatClear"></span>
</h2>
<div class="h2Content">
	<?php if($flash = Session::get_flash('flash')): ?>
		<div class="<?=$flash['type']; ?>">
			<?=$flash['msg']; ?>
		</div>
	<?php endif; ?>
	<?php foreach($demos as $demo): ?>
		<a href="<?=Uri::create('demo/view/'.$demo->id); ?>">
			<?=$demo; ?>
		</a><br />
	<?php endforeach; ?>
</div>
