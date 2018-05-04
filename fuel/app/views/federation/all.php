<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <title>About Luke & Logan</title>
</head>

<!-- Start of the navigation bar-->
<?=$nav; ?>
<br/><br/><br/><br/>
<div class="conatiner">
  <div class="row">
    <div class="col">
      <?php
        $url = '/~'.$eid.'/ct310/index.php/federation/attraction/'.$id;
      $url2 = '/~'.$eid.'/ct310/index.php/federation/attrimage/'.$id;
        ?>
        <script>
            $.ajax({
                type: 'POST',
                url: '<?=$url; ?>',
                dataType: 'json',
                success: function (data) {
                  $("#name").html(data.name);
                  $("#state").html("State: " + data.state);
                  $("#desc").html(data.desc);
                }});
            $.ajax({
                type: 'POST',
                url: '<?=$url2; ?>',
                dataType: 'json',
                success: function (data) {
                
 
                }});
        </script>
      <div class="card text-center">
        <div class="card-header">
          <h3 id="name"></h3>
        </div>
        <img class="card-img-top mx-auto" src="<?=$url2; ?>" id="imagee" alt="Desintation image" style="height:500px; width: 500px;">
        <div class="card-body">
          <div class="card-deck">
            <div class="card border-success">
              
              <div class="card-body ">
                <h2 class="card-title" id="state"></h2>
                <h4>Description: </h4>
                <p class="card-text" id="desc"></p>
              </div>

            </div>
          </div>
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
