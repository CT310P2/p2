
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
                    <h2 class="card-title">Chimney Rock</h2>
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
                            <h4 class="card-title" >History of Chimney Rock</h4>
                            <p>&#9656; The name "Chimney Rock" most likely originated from early fur traders, but was acknowledged by Native American settlements prior to such naming.<br />
                                &#9656; The first recorded mentioning of Chimney Rock was in 1827 with a variety of proposed names (Chimley Rock, Chimney Tower)<br />
                                &#9656; A small town named Chimney Rock once stood near the base of the formation, which most likley was the final inspiration for its established name.<br /></p>
                        </div>
                        <div class="tab-pane fade" id="XC" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <h4 class="card-title">How to Get Here, and What You can Enjoy</h4>
                            <p>&#9656; The landmark is visible to drivers along U.S. Route 26 and Nebraska Highway 92.<br />
                                &#9656; Chimney Rock is located 20 miles southeast of Scotts Bluff National Monument, <br />
                                &#9656; Today, the Ethel and Christopher J. Abbot Visitor Center features interactive videos and exhibits about the pioneers who contributed to Chimney Rock's discovery <br /></p>
                        </div>
                        <div class="tab-pane fade" id="RA" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <h4 class="card-title">How About some Awesome Facts!</h4>
                            <p>&#9656; Due to erosion and lightning, Chimney Rock was taller when it was first seen by settlers versus its height today.<br />
                                &#9656; The original Native American name roughly translated to "elk penis", and variations on that were considered when settlers were establishing a permanent name for it.<br /></p>
                        </div>
                    </div>
                </div>
                <img class="card-img-bottom" src="../../img/chimney2.jpg" alt="Card image cap">
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
