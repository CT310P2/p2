<br /><br /><br /><br /><br />

<!--$query = "SELECT * FROM users where userName = :username";-->
<!--$result = DB::query($query)->bind('username', $username)->execute();-->
<!--$result->as_array();-->
<!--$user = $result[0];-->
<!--$admin = $user['admin'];-->
<div class="row">
<?php
$query = "SELECT * FROM destinations";
$result = DB::query($query)->execute();
$result->as_array();
$ar = $result[0];
$length = count($result);
for($i = 0; $i < $length; $i++) {
  $obj = $result[$i];
  $name = $obj['name'];
  $image = $obj['image'];
  $imageName = $obj['imageName'];
  $overview = $obj['overview'];
  $history = $obj['history'];
  $facts = $obj['facts']; 
  $url = $obj['url']?>

  <div class="col-6">
    <div class="card-deck">
      <div class="card border-danger text-center">
        <img class="card-img-top" src=" ../../img/<?=$image; ?>" alt="Card image cap" height="242" width="162">
        <div class="card-body ">
          <h5 class="card-title"><?=$name; ?></h5>
          <p class="card-text"><?=$overview; ?></p>
          <p class="card-text"><?=$history; ?></p>
          <p class="card-text"><?=$facts; ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><a href="<?=Uri::create($url); ?>" class="btn btn-danger">Learn More</a></small>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>
