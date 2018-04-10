<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Cart</title>
</head>
<?php
if (isset($_POST['op'])) {
  $sendTo = $email;
  $name = $username;
  $subject = $_POST['destName']." Order";
  $dest = $_POST['destName'];
  $content = "Thank you for your order of the ".$dest." brochure. It will ship to you shortly!";

  mail($sendTo, $subject, $content);

  foreach($adUsers as $a){
    $sendTo = $a;
    $subject = $_POST['destName']." Order";
    $dest = $_POST['destName'];
    $content = "Notification: ".$dest."s brochure has been ordered.";

    mail($sendTo, $subject, $content);
  }

  header("Location: http://www.cs.colostate.edu/~ewanlp/ct310/index.php/nebraska/index");
  exit();
}
?>
<!-- Start of the navigation bar-->
<?=$nav; ?>

<br /><br /><br /><br /><br />
<div class="container">
  <div class="jumbotron">
    <h1 class="display-4 text-center">Your Cart</h1>
    <hr class="my-4">
    <p class="text-center">Check out destinations as you please, and then order!</p>
    <?php foreach($dNames as $dn): ?>
      <div class="row justify-content-md-center">
        <form method="POST">
          <div class="form-row align-items-center">
            <div class="col-auto">
                <input type="hidden" value="done" name="op">
                <input type="hidden" value='<?=$dn; ?>' name="destName">
                <a type="button" class="btn btn-success btn-lg btn-block" href="<?=Uri::create('index.php/nebraska/'.$username); ?>"><?=$dn; ?></a>
            </div>
            <div class="col-auto">
              <button type="submit" name="email" class="btn btn-primary btn-lg btn-block">Order</button>
            </div>
          </div>
        </form>
      </div>
      <br>
    <?php endforeach; ?>
  </div>
</div>

<div class="modal fade" id="em" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered text-center" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-danger text-center" id="exampleModalLabel">Email</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Your order has been placed!
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-danger my-2 my-sm-0" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <?= $footer; ?>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
