<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>Nebraska Home Page</title>
</head>
<body>

<!-- Start of the navigation bar-->
  <?=$nav; ?>

<!-- The start of the changing images -->
  <div class="container">
    <br /><br /><br /><br /><br />

    <div class="row">
      <table class="table table-hover table-sm table-bordered">
        <thead>
        <tr>
          <th>Team ID</th>
          <th>Team Name</th>
          <th>Location ID</th>
          <th>Location Name</th>
          <th>State</th>
        </tr>
        </thead>
        <tbody id="bodyy">
      <?php for($i = 0; $i < count($allData); $i++){ ?>
          <?php
            $temp = $allData[$i];
            $id = $temp['team'];
            $short = $temp['nameShort'];
            $long = $temp['nameLong'];
            $eid = $temp['eid'];
            if ($eid === ''){
              $eid = 'unpop'.$i;
            }
            $test = 'unpop'.$i;
            $url = '/~'.$eid.'/ct310/index.php/federation/listing';
           ?>
           <script>
             $.ajax({
              type: 'POST',
              url: '<?=$url; ?>',
              dataType: 'json',
                 success: function (data) {
                     $.each(data, function(index, element) {
                         var team = $('<td>').text(<?=$id; ?>);
                         var Name = $('<td>').text("<?=$long; ?>");
                         var first = $('<td>').text(element.id);
                         var second = $('<td>').append("<div><a href=\'http://cs.colostate.edu/~ewanlp/ct310/index.php/nebraska/all/" + '<?=$eid; ?>' + "/" + element.id +"\'" + ">" + element.name + "</a></div>");
                         var third = $('<td>').text(element.state);
                         var whole = $('<tr>').append(team).append(Name).append(first).append(second).append(third);
                         $('#bodyy').append(whole);
                     });
            }});
             
             $.ajax({
                type: 'POST',
                 url: 'allDest.php',
                 data: { }
             });
             
           </script>
    <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<br /><br /><br />

  <div class="container">
    <?= $footer; ?>
  </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
