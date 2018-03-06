<div class="row">
  <div class="col">
    <div class="jumbotron jumbotron-fluid text-center">
      <div class="container">
        <h1 class="display-4">Feedback?</h1>
        <p class="lead">Please feel free to add any thoughts you have about this wonderful attraction!</p>
        <hr class="my-4">
		<?php if(isset($_POST) && !empty($_POST)): ?>
			<?=$_POST['test']; ?>
		<?php else: ?>
			<form method="post">
				<textarea name="test"></textarea>
				<input type="submit" value="GO!" />
			</form>
		<?php endif; ?>
      </div>
    </div>
  </div>
</div>
