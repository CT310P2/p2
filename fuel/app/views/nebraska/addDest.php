<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login - Nebraska</title>
</head>
<body>

<!-- Start of the navigation bar-->
<?=$nav; ?>

<?php if(isset($username)){?>
    <div class="container text-center">
        <br /><br /><br /><br /><br /><br /><br />
        <div class="row">
            <div class="col text-center">
                <div class="card text-center border-danger w-50 mx-auto">
                    <div class="card-header text-danger">
                        <h2>It appears you've already signed in!</h2>
                    </div>
                    <div class="card-body">
                        <h4><a class="btn btn-danger" href="<?=Uri::create('index.php/nebraska/logout'); ?>">Sign in with a different account</a></h4>
                    </div>
                    <div class="card-footer text-muted">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <br /><br /><br />
        <div class="row">
            <div class="col text-center">
                <br /><br />
                <div id="formm" class="text-center">
                   <form method="POST" action="addDest" enctype = "multipart/form-data">
                <div class="modal-body">
                    <label for="user">Destination Info</label>
                    <input type="username" class="form-control" id="userr" placeholder="Destination Name" name="name">
                    <br />
                    <input type="username" class="form-control" id="a" placeholder="Image Name" name="imageName">
                    <br />
                    <label for="file">Add Image</label>
                    <input type="file" class="form-control-file" id="b" name="image">
                    <div class="form-group">
                      <br />
                      <label for="over">Description</label>
                      <textarea class="form-control" id="over" name="overview" placeholder="Add an overview of what this destination is like."></textarea>
                      <br />
                      <textarea class="form-control" id="c" name="history" placeholder="What is the historical background of this destination?"></textarea>
                      <br />
                      <textarea class="form-control" id="d" name="facts" placeholder="What's something interesting about this place?"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-success my-2 my-sm-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Add Destination</button>
                </div>
            </form>
                </div>
                <br />
            </div>
        </div>
    </div>
<?php } ?>
<!-- Start of login part -->



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
