
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Henry Doorly Zoo and Aquarium</title>
</head>
<body>

<!-- Start of the navigation bar-->
<?=$nav; ?>

<div class="container text-center">
    <div class="row align-items-center">
        <div class="col">
            <br><br><br>
            <div class="card text-center border-primary mb-3">
                <div class="card-header">
                    <h2 class="card-title">Henry Doorly Zoo and Aquarium</h2>
                    <br />
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <button class="nav-item nav-link active btn btn-outline-primary my-2 my-sm-0" id="nav-home-tab" data-toggle="tab" href="#PR" role="tab" aria-controls="nav-home" aria-selected="true">Overview</button>
                            <button class="nav-item nav-link btn btn-outline-primary my-2 my-sm-0" id="nav-profile-tab" data-toggle="tab" href="#XC" role="tab" aria-controls="nav-profile" aria-selected="false">What You can Expect</button>
                            <button class="nav-item nav-link btn btn-outline-primary my-2 my-sm-0" id="nav-contact-tab" data-toggle="tab" href="#RA" role="tab" aria-controls="nav-contact" aria-selected="false">Interesting Facts</button>
                        </div>
                    </nav>

                </div>
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="PR" role="tabpanel" aria-labelledby="nav-home-tab">
                            <h4 class="card-title" >History</h4>
                            <p>&#9656; The zoo began in 1894 as Riverview Park Zoo<br />
                                &#9656; 4 years later, it was home to over 120 animals<br />
                                &#9656; In 1963,  Margaret Hitchcock Doorly donated $750,000 and asked it be renamed after her late husband, Henry Doorly<br /></p>
                        </div>
                        <div class="tab-pane fade" id="XC" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <h4 class="card-title">Cool Exhibits</h4>
                            <p>&#9656; The Lied Jungle is one of the largest indoor rainforest exhibits in the world!<br />
                                &#9656; Inside lies 90 different species of plants and animals. Some notable ones include the Blue Monkey, the Black Howler Monkey, and the Phillipine crocodile!<br />
                                &#9656; The Scott Kingdom of the Seas Aquarium exhibits aquatic life from around the world, including penguins, eels, sharks, stingrays, and more!<br /></p>
                        </div>
                        <div class="tab-pane fade" id="RA" role="tabpanel" aria-labelledby="nav-contact-tab">
                           <h4 class="card-title">Prices & Crowds</h4>
                            <p>&#9656; Admission prices vary depending on the season of the year, but they tend to stay between $15-20 for a general adult ticket.<br />
                                &#9656; Children tickets vary between $10-12.95<br />
                                &#9656; If you want less crowds, it's recommended to go in the colder months, but you may miss some of the neat animals that only like it warm!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-columns">
                <div class="card">
                    <img class="card-img-top" src="../../img/zooSunset.jpg" alt="Card image cap" height="300px" width="500px">
                </div>
                <div class="card">
                    <img class="card-img-top" src="../../img/zooInside.jpg" alt="Card image cap" height="400px">
                </div>
                <div class="card">
                    <img class="card-img" src="../../img/zooJelly.jpg" alt="Card image" height="500px" width="1000px">
                </div>
                <div class="card">
                    <img class="card-img" src="../../img/zoo.jpg" alt="Card image" height="175px" width="425px">
                </div>
                <div class="card">
                    <img class="card-img" src="../../img/zooWater.jpg" alt="Card image">
                </div>
                <div class="card">
                    <img class="card-img" src="../../img/zoo2.jpg" alt="Card image" height="400px">
                </div>
            </div>
        </div>
    </div>
</div>

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
