<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?=$destination->name; ?></title>
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
                    <h2 class="card-title"><?=$destination->name; ?></h2>
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
                            <h4 class="card-title" >History of <?=$destination->name; ?></h4>
                            <p>&#9656;  <?=$destination->history; ?>
                        </div>
                        <div class="tab-pane fade" id="XC" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <h4 class="card-title">How to Get Here, and What You can Enjoy</h4>
                            <p>&#9656; <?=$destination->overview; ?></p>
                        </div>
                        <div class="tab-pane fade" id="RA" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <h4 class="card-title">How About some Awesome Facts!</h4>
                            <p>&#9656; <?=$destination->facts; ?></p>
                        </div>
                    </div>
                </div>
                <img class="card-img-bottom" src="../../../assets/img/<?=$destination->image; ?>" alt="Card image <?=$destination->image; ?>">
            </div>
        </div>
    </div>
</div>
<br />
<?php if(isset($username)){ ?>
  <div class="container">
    <form method="POST">
      <input type="hidden" value="addDestt" name="addDestt">
      <input type='hidden' name='destId' value='<?=$destination->id; ?>'/>
      <input type='hidden' name='destName' value='<?=$destination->name; ?>'/>
      <button type="submit" class="btn btn-success btn-lg btn-block">Add <?=$destination->name; ?> brochure to cart</button>
    </form>
  </div>
<?php } ?>
<br />
<div class="container">
  <div class="row">
    <div class="col">
      <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
          <h1 class="display-4">Feedback?</h1>
          <p class="lead">Please feel free to add any thoughts you have about this wonderful attraction!</p>
          <hr class="my-4">
          <?php foreach($comment as $com): ?>
            <div class="row">
              <div class="col-9 text-left">
                <?= $com->userName; ?> said this about <?=$destination->name; ?>: <h5>"<?=$com->commentText; ?>"</h5>
              </div>
              <div class="col-3 text-right">
                Posted at <?=$com->postTime; ?>
              </div>
            </div>
            <br/>
            <br/>
          <?php endforeach; ?>
          <form method="post">
            <div class="input-group">
              <div class="input-group-prepend">
                <?php if(isset($username)){ ?>
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="cSub"name="cSub">Add Comment</button>
                <?php } else { ?>
                  <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#comment">Add Comment</button>
                  <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered text-center" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title text-danger text-center" id="exampleModalLabel">Error</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          It appears you're not logged in! Please login before adding a comment.
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-outline-danger my-2 my-sm-0" data-dismiss="modal">Close</button>
                          <a class="btn btn-outline-danger my-2 my-sm-0" href="<?=Uri::create('index.php/nebraska/login'); ?>">Login</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <input type='hidden' name='destId' value='<?=$destination->id; ?>'/>
              <input type='hidden' name='destName' value='<?=$destination->name; ?>'/>
              <textarea class="form-control" aria-label="With textarea" value="commentText" name="commentText"></textarea>
            </div>
          </form>
        </div>
      </div>
      <br><br><br>
    </div>
  </div>
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
