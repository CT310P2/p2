<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-danger" href="<?=Uri::create('index.php/nebraska/index'); ?>">Nebraska</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=Uri::create('index.php/nebraska/index'); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=Uri::create('index.php/nebraska/about'); ?>" >About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
          Destinations
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?=Uri::create('index.php/nebraska/allDest'); ?>">All Destinations</a>
          <?php foreach($dests as $dest): ?>
            <?php $ar = explode(" ", $dest)?>
      		    <a class="dropdown-item " href="<?=Uri::create('index.php/nebraska/view/'.$ar[0]); ?>" ><?=$ar[1]; ?></a>
  	      <?php endforeach; ?>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=Uri::create('index.php/nebraska/credits'); ?>" >Credits</a>
      </li>
    </ul>
    <div class="my-2 my-lg-0">
        <?php if(isset($username)) { ?>
            <button class="btn btn-outline-primary my-2 my-sm-0"><?=$username; ?></button> <?php if($admin) { ?>
              <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal"> Add Destination </button> <?php } ?>
            <?php if($admin == 0) { ?>
              <a class="btn btn-outline-danger my-2 my-sm-0" href="<?=Uri::create('index.php/nebraska/order'); ?>">Order Brochure</a>
              <?php } ?>
            <a class="btn btn-outline-danger my-2 my-sm-0" href="<?=Uri::create('index.php/nebraska/logout'); ?>">Logout</a>
        <?php } else {?>
          <button class="btn btn-outline-warning my-2 my-sm-0" data-toggle="modal" data-target="#exampleModall"> Register </button>
            <a class="btn btn-outline-danger my-2 my-sm-0" href="<?=Uri::create('index.php/nebraska/login'); ?>" >Login</a>
        <?php } ?>
    </div>
  </div>
</nav>

<!--Destination modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-success text-center" id="exampleModalLabel">Add Destination</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="addDest">
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
    </div>
</div>
<!--Register modal-->
<div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabell" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-warning text-center" id="exampleModalLabell">Register</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="nUser">
                <div class="modal-body">
                    <input type="username" class="form-control" id="user" placeholder="Username" name="user">
                    <br />
                    <input type="password" class="form-control" id="pass" placeholder="Password" name="pass">
                    <br />
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                    <br />
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="admin">
                    <label class="form-check-label" for="exampleCheck1">Admin</label>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-warning my-2 my-sm-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-warning my-2 my-sm-0">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
