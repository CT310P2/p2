<div class="jumbotron">
  <h1 class="display-4 text-center">Welcome to Nebraska</h1>
  <hr class="my-4">
  <p class="text-center">Below you can find out more about Nebraska than you thought possible. How neat!</p>
  <div class="card text-center">
    <div class="card-header">
      <h3>Attractions</h3>
    </div>
    <div class="card-body">
      <div class="card-deck">
        <div class="card border-warning">
          <img class="card-img-top" src="./../img/car2.jpg" alt="Card image cap" height="180" width="255">
          <div class="card-body ">
            <h5 class="card-title">Carhenge</h5>
            <p class="card-text">Have you ever wanted to visit the famous Stonehenge but it's too far away? This is the perfect solution!</p>
          </div>
          <div class="card-footer">
            <small class="text-muted"><a href="<?=Uri::create('index.php/nebraska/carhenge'); ?>" class="btn btn-warning">Learn More</a></small>
          </div>
        </div>
        <div class="card border-primary">
          <img class="card-img-top" src="./../img/zoo.jpg" alt="Card image cap" height="180" width="255">
          <div class="card-body">
            <h5 class="card-title">Henry Doorly Zoo and Aquarium</h5>
            <p class="card-text">One of the world's best zoo's with some of the largest, wildest, exhibits!</p>
          </div>
          <div class="card-footer">
            <small class="text-muted"><a href="<?=Uri::create('index.php/nebraska/zooAqua'); ?>" class="btn btn-primary">Learn More</a></small>
          </div>
        </div>
        <div class="card border-success">
          <img class="card-img-top" src="./../img/chimney.jpg" alt="Card image cap" height="180" width="255">
          <div class="card-body">
            <h5 class="card-title">Chimney Rock</h5>
            <p class="card-text">Beautiful landscape also exists in Nebraska, take a look!</p>
          </div>
          <div class="card-footer">
            <small class="text-muted"><a href="<?=Uri::create('index.php/nebraska/chimney'); ?>" class="btn btn-success">Learn More</a></small>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer text-muted">
      <small class="text-muted" id="Info"><a href="#top">To Top</a></small>
    </div>
  </div>
</div>
