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
  $facts = $obj['facts']; ?>

  <div class="col-6">
    <div class="card-deck">
      <div class="card border-danger text-center">
        <img class="card-img-top" src="<?=$image; ?>" alt="Card image cap" height="242" width="162">
        <div class="card-body ">
          <h5 class="card-title"><?=$name; ?></h5>
          <p class="card-text"><?=$overview; ?></p>
          <p class="card-text"><?=$history; ?></p>
          <p class="card-text"><?=$facts; ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><a href="<?=Uri::create('index.php/nebraska/carhenge'); ?>" class="btn btn-danger">Learn More</a></small>
        </div>
      </div>
    </div>
  </div>
  
<?php } ?>


</div>


<!--<div class="row">-->
<!--  <div class="col-6">-->
<!--    <div class="card-deck">-->
<!--      <div class="card border-danger">-->
<!--        <img class="card-img-top" src="../../img/car2.jpg" alt="Card image cap" height="242" width="162">-->
<!--        <div class="card-body ">-->
<!--          <h5 class="card-title">Carhenge</h5>-->
<!--          <p class="card-text">Have you ever wanted to visit the famous Stonehenge but it's too far away? This is the perfect solution!</p>-->
<!--        </div>-->
<!--        <div class="card-footer">-->
<!--          <small class="text-muted"><a href="--><?//=Uri::create('index.php/nebraska/carhenge'); ?><!--" class="btn btn-danger">Learn More</a></small>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="col-6">-->
<!--    <div class="card-deck">-->
<!--      <div class="card border-danger">-->
<!--        <img class="card-img-top" src="../../img/zoo.jpg" alt="Card image cap" height="242" width="162">-->
<!--        <div class="card-body">-->
<!--          <h5 class="card-title">Henry Doorly Zoo and Aquarium</h5>-->
<!--          <p class="card-text">One of the world's best zoo's with some of the largest, wildest, exhibits!</p>-->
<!--        </div>-->
<!--        <div class="card-footer">-->
<!--          <small class="text-muted"><a href="--><?//=Uri::create('index.php/nebraska/zooAqua'); ?><!--" class="btn btn-danger">Learn More</a></small>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!---->
<!--  <div class="col-6">-->
<!--    <div class="card-deck">-->
<!--      <div class="card border-danger">-->
<!--        <img class="card-img-top" src="../../img/chimney.jpg" alt="Card image cap" height="242" width="162">-->
<!--        <div class="card-body">-->
<!--          <h5 class="card-title">Chimney Rock</h5>-->
<!--          <p class="card-text">Beautiful landscape also exists in Nebraska, take a look!</p>-->
<!--        </div>-->
<!--        <div class="card-footer">-->
<!--          <small class="text-muted"><a href="--><?//=Uri::create('index.php/nebraska/chimney'); ?><!--" class="btn btn-danger">Learn More</a></small>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
