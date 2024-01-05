<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href = "CSS/style.css" rel = "stylesheet">
    <link href="Images/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <title>Idea Proximity | Home</title>
  </head>
  <style>
    *{
        font-family: "Poppins";
    }
    body{
        background: black;
        color: white;
    }
    .info{
        display: flex;
        justify-content: space-around;
    }
    .info header{
        margin-left: 50px;
        width: 240px;
        margin-top: 250px;
        align-items: center;
        height: 300px;
        position: sticky;
    }
    .info section{
        width: 500px;
        margin-left: 50px;
        width: 1000px;
        height: 620px;
        overflow-y: auto;
    }
    section::-webkit-scrollbar{
        width: 0px;
    }
    body::-webkit-scrollbar{
    width: 0px;
  }
  </style>
  <body>

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
          <a class="nav-link" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="aboutus.php">About US</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class = "info">
<header>
<img src="Images/img/ideapoint_icon.png" alt="logo">
<h1 style= "margin-left: 15px;"><b>Idea Proximity</b></h1>
        <p>Connect. Collaborate. Create.</p>
    </header>

    <section>
        <h2>Welcome to Idea Proximity</h2>
        <p>At Idea Proximity, we believe in the transformative power of shared vision and collaboration. We understand that
            behind every groundbreaking product is a community of like-minded individuals, driven by a common ideology.
            Our platform is designed to be the nexus where these innovative minds converge, communicate, and catalyze
            the development of extraordinary ideas.</p>
            <br>

        <h3>Our Mission</h3>
        <p><strong>Facilitating Connections:</strong> Idea Proximity is more than just a platform; it's a dynamic space where
            individuals who share similar ideologies can connect effortlessly. We bring together visionaries, creators,
            and problem solvers, fostering an environment where meaningful collaborations thrive.</p>

        <p><strong>Accelerating Innovation:</strong> We are committed to expediting the product development process. By
            connecting you with individuals who share your passion and perspective, we aim to accelerate the journey
            from ideation to realization.</p>
            <br>

        <h3>How Idea Proximity Works</h3>
        <ol>
            <li><strong>Create Your Profile:</strong> Join our vibrant community by creating a profile that highlights
                your skills, interests, and the ideologies that drive you.</li>
            <li><strong>Discover Like-Minded Peers:</strong> Explore a diverse network of individuals who resonate with
                your ideas. Our algorithm intelligently matches you with potential collaborators based on shared
                ideologies.</li>
            <li><strong>Connect and Collaborate:</strong> Initiate conversations, share insights, and embark on
                collaborative ventures. Whether you're an entrepreneur, developer, designer, or any other professional,
                Idea Proximity provides the platform for you to connect with the right people.</li>
        </ol>
        <br>

        <h3>Why Choose Idea Proximity?</h3>
        <ul>
            <li><strong>Efficiency:</strong> Save time and resources by connecting with individuals who align with your
                vision, reducing the trial-and-error typically associated with finding the right collaborators.</li>
            <li><strong>Diversity of Thought:</strong> Our platform embraces diversity, ensuring that you're exposed to
                a wide range of perspectives, enriching your creative process.</li>
            <li><strong>Empowering Innovators:</strong> Idea Proximity empowers innovators by providing a space where ideas
                flourish, partnerships thrive, and groundbreaking products come to life.</li>
        </ul>

        <br>

        <h3>Join Idea Proximity Today</h3>
        <p>Embark on a journey of collaborative innovation. Join Idea Proximity today and be part of a community where
            shared ideologies fuel exceptional product development.</p>

        <p><em>Connect. Collaborate. Create.</em></p>
    </section>
</div>
</div>
</body>
</html>