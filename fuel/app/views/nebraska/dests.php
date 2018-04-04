<br /><br /><br /><br /><br />

<div class="row">
<?php foreach($dest as $de): ?>
  <div class="col-6">
    <div class="card-deck">
      <div class="card border-danger text-center">
        <img class="card-img-top" src=" ../../img/<?=$de->image; ?>" alt="Card image <?=$de->image; ?>" height="242" width="162">
        <div class="card-body ">
          <h5 class="card-title"><?=$de->name; ?></h5>
          <p class="card-text"><?=$de->overview; ?></p>
          <p class="card-text"><?=$de->history; ?></p>
          <p class="card-text"><?=$de->facts; ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><a href="<?=Uri::create('index.php/nebraska/view/'.$de->id); ?>" class="btn btn-danger">Learn More</a></small>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>








