
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Chimney Rock</title>
</head>
<body>

<!-- Start of the navigation bar-->
<?=$nav; ?>

<div class="container text-center">
    <div class="row align-items-center">
        <div class="col">
            <br><br><br>
            <div class="card text-center border-success mb-3">
                <div class="card-header">
                    <h2 class="card-title"><?=$dest->name; ?></h2>
                    <br />
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <button class="nav-item nav-link active btn btn-outline-success my-2 my-sm-0" id="nav-home-tab" data-toggle="tab" href="#PR" role="tab" aria-controls="nav-home" aria-selected="true">Overview</button>
                            <button class="nav-item nav-link btn btn-outline-success my-2 my-sm-0" id="nav-profile-tab" data-toggle="tab" href="#XC" role="tab" aria-controls="nav-profile" aria-selected="false">What You can Expect</button>
                            <button class="nav-item nav-link btn btn-outline-success my-2 my-sm-0" id="nav-contact-tab" data-toggle="tab" href="#RA" role="tab" aria-controls="nav-contact" aria-selected="false">Interesting Facts</button>
                        </div>
                    </nav>

                </div>
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="PR" role="tabpanel" aria-labelledby="nav-home-tab">
                            <h4 class="card-title" >History of <?=$dest->name; ?></h4>
                            <p>&#9656;  <?=$dest->history; ?>
                        </div>
                        <div class="tab-pane fade" id="XC" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <h4 class="card-title">How to Get Here, and What You can Enjoy</h4>
                            <p>&#9656; <?=$dest->overview; ?></p>
                        </div>
                        <div class="tab-pane fade" id="RA" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <h4 class="card-title">How About some Awesome Facts!</h4>
                            <p>&#9656; <?=$dest->facts; ?>></p>
                        </div>
                    </div>
                </div>
                <img class="card-img-bottom" src="../../../img/<?=$dest->image; ?>" alt="Card image <?=$dest->image; ?>">
            </div>
        </div>
    </div>
</div>
<br /><br /><br />
<div class="container">
  <?= $comment; ?>
</div>

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
