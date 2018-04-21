<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>All Status Page</title>
</head>
<body>

<!-- Start of the navigation bar-->
  <?=$nav; ?>
<br />
<br /><br /><br /><br />
<div class="container">
  <div class="row">
    <div class="col">
      <table class="table table-hover table-sm table-bordered ">
        <thead>
          <tr>
            <th>Team ID</th>
            <th>Name Short</th>
            <th>Name Long</th>
          </tr>
        </thead>
        <tbody>
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
                $url = 'http://www.cs.colostate.edu/~'.$eid.'/ct310/index.php/federation/status';

               ?>
               <script>
                 $.ajax({
                  type: 'GET',
                  url: '<?=$url; ?>',

                  dataType: 'json',
                  success: function( json ) {
                    if (json.status == "closed"){
                      $('#<?=$eid; ?>').addClass("table-danger");
                    } else if (json.status == "open"){
                      $('#<?=$eid; ?>').addClass("table-success");
                    }else {
                      $('#<?=$eid; ?>').addClass("table-warning");
                    }
                  },
                  error: function(){
                    $('#<?=$eid; ?>').addClass("table-warning");
                  }
                });

               </script>
               <tr class="check" id="<?=$eid; ?>">
                 <td>
                   <?=$id; ?>
                 </td>
                 <td>
                   <?=$short; ?>
                 </td>
                 <td>
                   <?=$long; ?>
                 </td>
               </tr>
            <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

<br /><br /><br />
  <div class="container">
    <?= $footer; ?>
  </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
