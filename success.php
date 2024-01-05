<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <title>Idea Point | Log In</title>
    <style>
*{
    font-family:'Poppins', sans-serif;
  }
  body {
    background-image: url('Images/img/background.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    margin: 0;
    font-size: 16px;
  }
  

.login-box {
    position: fixed;
    top: 50%;
    left: 50%;
    width: 80%; 
    max-width: 400px; 
    padding: 40px;
    margin: 20px auto;
    transform: translate(-50%, -55%);
    background: rgba(0, 0, 0, .9);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
    border-radius: 10px;
}

@media only screen and (max-width: 600px) {
    .login-box {
        width: 90%;
    }

    .submit-button {
        margin-left: 25%;
        margin-top: 10px;
    }
}
.login-box p:first-child {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
  font-size: 1.5rem;
  font-weight: bold;
  letter-spacing: 1px;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}

.login-box .user-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #fff;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  font-weight: bold;
  color: #fff;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 3px
}

.login-box a:hover {
  background: #fff;
  color: #272727;
  border-radius: 5px;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box p {
  color: #aaa;
  font-size: 14px;
}

.login-box a.a2 {
  color: #fff;
  text-decoration: none;
}

.login-box a.a2:hover {
  background: transparent;
  color: #aaa;
  border-radius: 5px;
}
.submit-button {
      margin-left: 37%;
      background-color: #fff; /* Green color */
      color: #000; /* White text */
      text-decoration: bold;
      padding: 7px 15px; /* Padding for better readability */
      font-size: 16px;
      border: none;
      border-radius: 5px; /* Rounded corners */
      cursor: pointer;
      transition: background-color 0.3s ease; /* Smooth transition */
    }

    /* Change the button color on hover */
    .submit-button:hover {
      background-color: #808080;
      color: #fff;
    }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-primary">
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
      P<span>oint</span>
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
          <a class="nav-link" href="#">About US</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Idea?
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Publish Idea</a></li>
            <li><a class="dropdown-item" href="#">Join Community</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
      </form>
    </div>
  </div>
</nav>
<div class="login-box">
        <p>Thankyou for joining Idea Point!.<br> An activation link has been sent to your gmail please activate over there.</p>
      </div>
</body>
</html>