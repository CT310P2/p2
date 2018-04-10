<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-success" href="<?=Uri::create('index.php/nebraska/index'); ?>">Nebraska</a>
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
          <?php foreach($dests as $de): ?>
      		    <a class="dropdown-item " href="<?=Uri::create('index.php/nebraska/view/'.$de->id); ?>" ><?=$de->name; ?></a>
  	      <?php endforeach; ?>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=Uri::create('index.php/nebraska/credits'); ?>" >Credits</a>
      </li>
    </ul>
    <div class="my-2 my-lg-0">
        <?php if(isset($username)) { ?>
            <button class="btn btn-outline-primary my-2 my-sm-0"><?=$username; ?></button>
            <a class="btn btn-outline-warning my-2 my-sm-0" href="<?=Uri::create('index.php/nebraska/changePass'); ?>" >Change Password </button>
            <?php if($admin) { ?>
                <a class="btn btn-outline-success my-2 my-sm-0" href="<?=Uri::create('index.php/nebraska/addDest'); ?>"> Add Destination </button>
            <?php } ?>
            <a class="btn btn-outline-danger my-2 my-sm-0" href="<?=Uri::create('index.php/nebraska/logout'); ?>">Logout</a>
             <a class="btn btn-outline-secondary my-2 my-sm-0" href="<?=Uri::create('index.php/nebraska/cart/'.$username); ?>">Cart</a>
        <?php } else {?>
          <a class="btn btn-outline-warning my-2 my-sm-0" href="<?=Uri::create('index.php/nebraska/newUser'); ?>"> Register </button>
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
                    <label class="form-check-label" for="exampleCheck1">Admin?</label>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-warning my-2 my-sm-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-warning my-2 my-sm-0">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Register modal-->
<div class="modal fade" id="passchange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelll" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-warning text-center" id="exampleModalLabelll">Change Pass</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="changePass">
                <div class="modal-body">
                    <input type="username" class="form-control" id="oldpass" placeholder="Username" name="username">
                    <br />
                    <input type="password" class="form-control" id="oldpass" placeholder="Old Password" name="oldpass">
                    <br />
                    <input type="password" class="form-control" id="pass" placeholder="New Password" name="pass">
                    <br />
                    <br />
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-warning my-2 my-sm-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-warning my-2 my-sm-0">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Cart modal-->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered text-center" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-success text-center" id="exampleModalLabel">Purchase Brochure</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="sel1">Select 1 or More Destination(s)!</label>
            <select multiple class="form-control" id="sel1">
              <?php foreach($dests as $de): ?>
                <option<?php $de->id ?>><?=$de->name; ?></option>
              <?php endforeach; ?>
            </select>
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
