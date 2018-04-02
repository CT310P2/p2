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
        <img class="card-img-top" src=" <?=$image; ?>" alt="Card image cap" height="242" width="162">
        <div class="card-body ">
          <h5 class="card-title"><?=$name; ?></h5>
          <p class="card-text"><?=$overview; ?></p>
          <p class="card-text"><?=$history; ?></p>
          <p class="card-text"><?=$facts; ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><a href="<?=Uri::create('index.php/nebraska/'.<?=$name; ?>); ?>" class="btn btn-danger">Learn More</a></small>
        </div>
      </div>
    </div>
  </div>
  
<?php } ?>


</div>






if (!empty($result)) { 
foreach($result as $key=>$value){
?>
<div class="product-item">
	<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
	<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
	<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
	<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
	<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
	</form>
</div>
