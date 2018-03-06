<div class="row">
    <div class="col">
        <div class="jumbotron jumbotron-fluid text-center">
            <div class="container">
                <h1 class="display-4">Feedback?</h1>
                <p class="lead">Please feel free to add any thoughts you have about this wonderful attraction!</p>
                <hr class="my-4">
                <?php if(isset($_POST) && !empty($_POST)):
                    $entry = htmlspecialchars($_POST['test']);
                    ?>
                    <div class="row">
                        <div class="col text-left">
                            <?= $username; ?>'s post: <?=$entry; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <form method="post">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" value="submit" id="add">Add Comment</button>
                            </div>
                            <textarea class="form-control" aria-label="With textarea" name="test"></textarea>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
        <br><br><br>
    </div>
</div>