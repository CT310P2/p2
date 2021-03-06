<div class="row">
    <div class="col">
        <div class="jumbotron jumbotron-fluid text-center">
            <div class="container">
                <h1 class="display-4">Feedback?</h1>
                <p class="lead">Please feel free to add any thoughts you have about this wonderful attraction!</p>
                <hr class="my-4">
                <?php foreach($comment as $com): ?>
                  <div class="row">
                    <div class="col text-left">
                      <?= $com->userName; ?>'s post: <?=$com->commentText; ?> at <?=$com->postTime; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
                <form method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <?php if(isset($username)){ ?>
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="cSub" id="add">Add Comment</button>
                            <?php } else { ?>
                              <button type="button" class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#comment">Add Comment</button>
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
                        <textarea class="form-control" aria-label="With textarea" value="cEntry" name="cEntry"></textarea>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br>
    </div>
</div>
