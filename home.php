<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href = "CSS/style.css" rel = "stylesheet">
    <link href="Images/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <title>Idea Proximity | Home</title>
  </head>
  <body>
    <style>
      .back{
        border-radius: 10px;
        width: 250px;
        margin-left: 370px;
        display: flex;
        justify-content: center;
        background: yellow;
      }
      .back1{
        color: red;
      }
      .back2{
        color: green;
      }
    </style>
    <script>
      function aboutus(){
        window.location.href = "aboutus.php";
      }
    </script>

  <?php
    // Check if the user is logged in (assuming you have a session variable named 'user_logged_in')
    session_start();
    if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
      header('location: afterlogin.php');
    }
    ?>
  <div class="loading-spinner" id="loadingSpinner"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src= "script/script.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <div class="container-fluid">
    <p class="navbar-brand mx-5 my-0" href="#" style = " background-image: linear-gradient(135deg, #ff00c7 0%, #64ecff 100%);background-size: 100%;
  background-repeat: repeat;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent; 
  -moz-background-clip: text;
  -moz-text-fill-color: transparent;
  font-size: 30px;">
  <b>
      I<span class>dea</span>
      P<span>roximity</span>
  </b>
  </p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About US</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class = "info">
<div class = "black" id= "tra1">
  <div class = "title">
  <img src="Images/img/ideapoint_icon.png" alt="logo" style="width: 100px; height: 100px;">
  <div class="back">
    <div class="back1">
  <h2 style="padding: 10px 5px 5px 5px"><b>Idea</b></h2>
    </div>
    <div class="back2">
  <h2 style="padding: 10px 5px 5px 5px"><b>Proximity</b></h2>

    </div>
    </div>
  <h8><b> <i class="fa fa-link" aria-hidden="true"></i> Connect. <i class="fas fa-users"></i> Collaborate. <i class="fas fa-plus"></i> Create. <i class="far fa-thumbs-up"></i> Impliment. <i class="fas fa-signal"></i> Sustain.</b></h8>
</div>
<div class = "cards">
<div class="card" style="width: 18rem; border-radius: 20px;background:  #b7b6b6; color: #000; ">
  <div class="card-body my-5">
    <h5 class="card-title"><b>Why Idea Proximity?</b></h5>
    <p class="card-text">Innovative Together <br>
Build Dynamic Teams <br>
Form Concept to completion</p>
<button class = "card-link" onclick="aboutus()">
    Read More
</button>
  </div>
</div>
<div class="card" style="width: 18rem; border-radius: 20px;background:  #b7b6b6; color: #000">
  <div class="card-body my-5">
    <h5 class="card-title"> <b>How it works?</b></h5>
    <p class="card-text">Share your ideas <br>
Form Your Team <br>
Start Building</p>
<button class = "card-link" onclick="aboutus()">
    Read More
</button>
  </div>
</div>
<div class="card" style="width: 18rem; border-radius: 20px; background: #b7b6b6; color: #000; text-align: center">
  <div class="card-body my-5" style="align-text: center; padding-top: 40px;">
    <h2 class="card-title"> <b> Join Us <br> Today!!</b></h2>
  </div>
</div>
</div>
</div>
<div class = "white" id = "tra">
<div class = "butt">
<button class="learn-more">
  <span class="circle" aria-hidden="true">
  <span class="icon arrow"></span>
  </span>
  <a class="button-text" href = "login.php" style = "text-decoration: none">Get Started</a>
</button>
</div>
</div>
</div>
</div>
</body>
</html>