<br /><br /><br /><br /><br />

<div class="row">
<?php foreach($destss as $des): ?>
  <div class="col-6">
    <div class="card-deck">
      <div class="card border-success text-center">
        <img class="card-img-top" src=" ../../assets/img/<?=$des->image; ?>" alt="Card image <?=$des->image; ?>" height="242" width="162">
        <div class="card-body ">
          <h5 class="card-title"><?=$des->name; ?></h5>
          <p class="card-text"><?=$des->overview; ?></p>
          <p class="card-text"><?=$des->history; ?></p>
          <p class="card-text"><?=$des->facts; ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><a href="<?=Uri::create('index.php/nebraska/view/'.$des->id); ?>" class="btn btn-success">Learn More</a></small>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
