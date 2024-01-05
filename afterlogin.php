<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
  header("location: login.php");
}

if(isset($_POST["submit"])){
  $title = $_POST["title"];
  $description = $_POST["textarea"];
  $hashtag = $_POST["hashtag"];
  
  $existingPostQuery = "SELECT * FROM posts WHERE title = '$title'";
    $existingPostResult = mysqli_query($conn, $existingPostQuery);

    if (mysqli_num_rows($existingPostResult) > 0) {
        echo "<script>alert('Post with the same title already exists');</script>";
    }
  // Check if the "image" key exists in the $_FILES array
  else if(isset($_FILES["image"]) && $_FILES["image"]["error"] !== 4){

    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png', 'webp'];
    $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if(!in_array($imageExtension, $validImageExtension)){
      echo "<script>alert('Invalid image extension');</script>";
    }
    else if($fileSize > 10000000){
      echo "<script>alert('Image size is too large');</script>";
    }
    else{
      $newImageName = uniqid() . '.' . $imageExtension;

      move_uploaded_file($tmpName, 'images/uploaded/' . $newImageName);

      $query = "INSERT INTO `posts` VALUES('', '$title', '$description', '$hashtag', '$newImageName')";
      mysqli_query($conn, $query);

      $user_email = $_SESSION['email'];
            $updatePostCountQuery = "UPDATE users SET post_count = post_count + 1 WHERE email = '$user_email'";
            mysqli_query($conn, $updatePostCountQuery);

      echo "<script>alert('Successfully added');</script>";
    }
  }
  else {
    echo "<script>alert('Image does not exist');</script>";
  }
}
?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href = "CSS/style.css" rel = "stylesheet">
    <link href="Images/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="CSS/chatui.css">
    <link rel="stylesheet" href="CSS/sidebar.css">
    <title>Idea Point | Home</title>
    <style>
      /* text */
.text {
    position: absolute;
    right: 0%;
    width: 0%;
    opacity: 0;
    color: rgb(0, 0, 0);
    font-size: 1.0em;
    font-weight: 500;
    transition-duration: .3s;
  }
  /* hover effect on button width */
  
  .create_pop{
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    border: none;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    z-index: 9999;
  }
  .dropdown {
   position: relative;
   display: inline-block;
   margin-right: 30px;
   background-color: transparent;
   border-radius: 10px;
  }
  
  .dropdown-content {
   display: none;
   position: absolute;
   background-color: #f9f9f9;
   border-radius: 10px;
   min-width: 160px;
   box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
   z-index: 1;
  }
  
  .dropdown-content a {
   color: black;
   padding: 12px 16px;
   text-decoration: none;
   display: block;
  }
  
  .dropdown-content a:hover {
   background-color: #f1f1f1;
   border-radius: 15px;
  }
  
  .dropdown:hover .dropdown-content {
   display: block;
   border-radius: 15px;
  }
  
  .dropdown .dropbtn {
   color: #fff;
   border-radius: 10px;
   padding: 10px 10px 10px 10px;
  }
  
  .dropdown .dropbtn:hover{
    background-color: #ffffff1e;
  }
  .dropdown-photo {
   border-radius: 50%;
   margin-right: 5px;
   height: 50px;
   width: 50px;
  }
  .form-container {
    width: 400px;
    background: linear-gradient(#212121, #212121) padding-box,
                linear-gradient(145deg, transparent 35%,#ffffff, #e100ff) border-box;
    border: 2px solid transparent;
    padding: 32px 24px;
    font-size: 14px;
    font-family: inherit;
    color: white;
    flex-direction: column;
    gap: 20px;
    box-sizing: border-box;
    border-radius: 16px;
    background-size: 200% 100%;
    animation: gradient 5s ease infinite;
  }
  
  @keyframes gradient {
    0% {
      background-position: 0% 50%;
    }
  
    50% {
      background-position: 100% 50%;
    }
  
    100% {
      background-position: 0% 50%;
    }
  }
  
  .form-container button:active {
    scale: 0.95;
  }
  
  .form-container .form {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
  
  .form-container .form-group {
    display: flex;
    flex-direction: column;
    gap: 2px;
  }
  
  .form-container .form-group label {
    display: block;
    margin-bottom: 5px;
    color: #717171;
    font-weight: 600;
    font-size: 12px;
  }
  
  .form-container .form-group1 label {
    display: block;
    margin-bottom: 5px;
    color: #717171;
    font-weight: 600;
    font-size: 12px;
  }
  
  
  .form-container .form-group input {
    width: 100%;
    padding: 12px 16px;
    border-radius: 8px;
    color: #fff;
    font-family: inherit;
    background-color: transparent;
    border: 1px solid #414141;
  }
  
  .form-container .form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border-radius: 8px;
    resize: none;
    color: #fff;
    height: 96px;
    border: 1px solid #414141;
    background-color: transparent;
    font-family: inherit;
  }
  .form-container .form-group1 textarea {
    width: 100%;
    padding: 12px 16px;
    border-radius: 8px;
    resize: none;
    color: #fff;
    height: 60px;
    border: 1px solid #414141;
    background-color: transparent;
    font-family: inherit;
  }
  
  .form-container .form-group input::placeholder {
    opacity: 0.5;
  }
  
  .form-container .form-group input:focus {
    outline: none;
    border-color: #e81cff;
  }
  
  .form-container .form-group textarea:focus {
    outline: none;
    border-color: #e81cff;
  }
  
  .form-container .form-submit-btn {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    align-self: flex-start;
    font-family: inherit;
    color: #717171;
    font-weight: 600;
    width: 40%;
    background: #313131;
    border: 1px solid #414141;
    padding: 12px 16px;
    font-size: inherit;
    gap: 8px;
    margin-top: 8px;
    cursor: pointer;
    margin-left: 30%;
    border-radius: 6px;
  }
  .icons8-cancel { 
  display: inline-block;
  padding-top: 0%;
  margin-left: 94%;
  width: 25px;
  height: 25px;
  background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAsMCwyNTYsMjU2IgpzdHlsZT0iZmlsbDojMDAwMDAwOyI+CjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtcnVsZT0ibm9uemVybyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lY2FwPSJidXR0IiBzdHJva2UtbGluZWpvaW49Im1pdGVyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxnIHRyYW5zZm9ybT0ic2NhbGUoNS4xMiw1LjEyKSI+PHBhdGggZD0iTTI1LDJjLTEyLjY5MDQ3LDAgLTIzLDEwLjMwOTUzIC0yMywyM2MwLDEyLjY5MDQ3IDEwLjMwOTUzLDIzIDIzLDIzYzEyLjY5MDQ3LDAgMjMsLTEwLjMwOTUzIDIzLC0yM2MwLC0xMi42OTA0NyAtMTAuMzA5NTMsLTIzIC0yMywtMjN6TTI1LDRjMTEuNjA5NTMsMCAyMSw5LjM5MDQ3IDIxLDIxYzAsMTEuNjA5NTMgLTkuMzkwNDcsMjEgLTIxLDIxYy0xMS42MDk1MywwIC0yMSwtOS4zOTA0NyAtMjEsLTIxYzAsLTExLjYwOTUzIDkuMzkwNDcsLTIxIDIxLC0yMXpNMzIuOTkwMjMsMTUuOTg2MzNjLTAuMjYzNzcsMC4wMDYyNCAtMC41MTQzOSwwLjExNjQ1IC0wLjY5NzI3LDAuMzA2NjRsLTcuMjkyOTcsNy4yOTI5N2wtNy4yOTI5NywtNy4yOTI5N2MtMC4xODgyNywtMC4xOTM1MyAtMC40NDY4LC0wLjMwMjcyIC0wLjcxNjgsLTAuMzAyNzRjLTAuNDA2OTIsMC4wMDAxMSAtMC43NzMyMSwwLjI0Njc2IC0wLjkyNjMzLDAuNjIzNzdjLTAuMTUzMTIsMC4zNzcwMSAtMC4wNjI1NSwwLjgwOTIxIDAuMjI5MDcsMS4wOTMwM2w3LjI5Mjk3LDcuMjkyOTdsLTcuMjkyOTcsNy4yOTI5N2MtMC4yNjEyNCwwLjI1MDgyIC0wLjM2NjQ4LDAuNjIzMjcgLTAuMjc1MTIsMC45NzM3MWMwLjA5MTM2LDAuMzUwNDQgMC4zNjUwMywwLjYyNDExIDAuNzE1NDcsMC43MTU0N2MwLjM1MDQ0LDAuMDkxMzYgMC43MjI4OSwtMC4wMTM4OCAwLjk3MzcxLC0wLjI3NTEybDcuMjkyOTcsLTcuMjkyOTdsNy4yOTI5Nyw3LjI5Mjk3YzAuMjUwODIsMC4yNjEyNCAwLjYyMzI3LDAuMzY2NDggMC45NzM3MSwwLjI3NTEyYzAuMzUwNDQsLTAuMDkxMzYgMC42MjQxMSwtMC4zNjUwMyAwLjcxNTQ3LC0wLjcxNTQ3YzAuMDkxMzYsLTAuMzUwNDQgLTAuMDEzODgsLTAuNzIyODkgLTAuMjc1MTIsLTAuOTczNzFsLTcuMjkyOTcsLTcuMjkyOTdsNy4yOTI5NywtNy4yOTI5N2MwLjI5NzI0LC0wLjI4NTgzIDAuMzg4NTcsLTAuNzI0OCAwLjIzLC0xLjEwNTQ2Yy0wLjE1ODU3LC0wLjM4MDY2IC0wLjUzNDU0LC0wLjYyNDk3IC0wLjk0Njc5LC0wLjYxNTI0eiI+PC9wYXRoPjwvZz48L2c+Cjwvc3ZnPg==') 50% 50% no-repeat;
  background-size: 100%; 
  cursor: pointer;
  }
  .form-container .form-submit-btn:hover {
    background-color: #fff;
    border-color: #fff;
  }
  
  .resultDiv{
    margin: 0 0 0 0;
    position: fixed;
    width: 100%;
    height: 100%;
    display:flex;
    justify-content: space-between;
  }
  
  .left{
    width:350px;
    height: 100%;
    background-color: rgb(220, 220, 220);
  }
  .middle {
    margin-top: 40px;
    width: 55%;
    position: relative;
    margin-left: 300px;
    max-height: 670px;
    color: white;
    background-color: transparent;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0px;
    overflow-y: auto;
  }
  .middle::-webkit-scrollbar{
    width: 0px;
  }
  .post-container {
    width: 85%;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 10px;
  }
  
  .post-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  
  .post-image-container {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
  }
  
  .post-image-container img {
    max-width: 100%;
    height: 200px;
    border-radius: 8px;
  }
  
  .post-description {
    font-size: 16px;
    margin-bottom: 10px;
  }
  
  .create {
    position: relative;
    cursor: pointer;
    text-decoration: none;
    color: black;
    background-color: white;
    padding: 10px 10px 10px 10px;
    border-radius: 0px;
    border-bottom: 1px;
    transition: 0.2s ease-in;
  }
  .create:hover{
    background-color: gray;
    color: white;
    transition: 0.2s ease-out;
  }
  .search-bar{
    margin-top: 10px;
    margin-bottom: 20px;
  }
  .search-bar input{
    border-radius: 5px 0 0 5px;
    height: 42px;
    width: calc(100% -50px);
    border: none;
    background: white;
    color: #333;
    font-size: 16px;
    padding: 0 13px;
    outline: none;
  }
  .categories{
    margin-top: 20px;
  }
  .categories a{
    text-decoration: none;
    color: white;
  }
  .custom-button {
      background-color: white;
      color: black; /* Change text color to black or any color you prefer */
      border: 2px solid white;
    border-radius: 20px;
    margin-left: 75%;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
  }
  
  .custom-button:hover {
    background-color: gray;
    color: white; /* Change text color on hover */
  }
  .search{
    margin-top: 20px;
    margin-left: 10%;
  }
  
  .search input{
    border-radius: 5px 0 0 5px;
    height: 42px;
    width: calc(100% -50px);
    border: none;
    background: #000;
    color: white;
    font-size: 16px;
    padding: 0 13px;
    outline: none;
  }
  .search button{
    position: absolute;
    width: 47px;
    height: 42px;
    border: none;
    outline: none;
    color: #fff;
    background: #333;
    cursor: pointer;
    font-size: 17px;
    border-radius: 0 5px 5px 0;
    margin-right: 0px;
  }
  .right{
    transition: 0.3s ease-in-out;
  }
.wrapper2{
  background-color: black;
        width: 410px;
        max-height: 100%;
        border-radius: 0px;
        box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                    0 32px 64px -48px rgba(0,0,0,0.5);
}
      .wrapper{
        background-color: white;
        width: 410px;
        max-height: 100%;
        border-radius: 0px;
        box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                    0 32px 64px -48px rgba(0,0,0,0.5);
        transition: 0.3s ease-in-out;
        display: none;
      }
      .wrapper img{
          object-fit: cover;
          border-radius: 50%;
      }
      .users{
          padding: 0px 30px;
      }
      .users .content,
      .users-list a .content{
          display: flex;
          align-items: center;
          cursor: pointer;
      }
      .users-list .details{
          color: #000;
          margin-left: 15px;
          margin-top: 15px;
      }
      .users .search{
          margin: 20px 0;
          margin-left: 0px;
          display: flex;
          align-items: center;
          justify-content: space-between;
      }
      .wrapper .users .search input{
          position: relative;
          height: 42px;
          width: 200px;
          border: 1px solid #ccc;
          padding: 0 13px;
          font-size: 16px;
          background: white;
          color: black;
          border-radius: 5px 0 0 5px;
          outline: none;
      }
      .wrapper .users .search button{
          position: relative;
          width: 47px;
          height: 42px;
          margin-right: 10px;
          border: none;
          outline: none;
          border-radius: 0 5px 5px 0;
          color: #fff;
          background-color: #333;
          cursor: pointer;
          font-size: 17px;
      }
      #hi {
        border: none;
        position: relative;
        outline: none;
        background-color: #333;
        color: white;
        font-size: 17px;
        padding: 15px 15px 15px 15px;
        cursor: pointer;
        border-radius: 10px;
      }
      .users-list .details span{
          font-size: 17px;
          font-weight: 500;
      }
      .users-list .details p{
          margin-top: 0px;
          font-size: 15px;
          color: #67676a;
      }
      .users-list a{
          display: flex;
          align-items: center;
          padding-bottom: 10px;
          justify-content: space-between;
          border-bottom: 1px solid #e6e6e6;
          text-decoration: none;
          padding-right: 15px;
          margin-top: 10px;
      }
      .users-list a:last-child{
          display: flex;
          align-items: center;
          padding-bottom: 0px;
          justify-content: space-between;
          border-bottom: none;
          text-decoration: none;
          padding-right: 15px;
          margin-top: 15px;
      }
      .users-list a .content img{
          height: 50px;
          width: 50px;
          margin-top: 0px;
      }
      .users-list{
          max-height: 600px;
          overflow-y: auto;
      }
      .users-list::-webkit-scrollbar{
          width: 0px;
      }
      .users-list a .status-dot{
          font-size: 12px;
          color: #468669;
      }
      .users-list a .status-dot.offline{
          color: #ccc;
      }

.chats{
  margin-top: 300px;
  margin-left: 25%;
}
.cssbuttons-io-button {
  background: #ffffff;
  color: rgb(0, 0, 0);
  font-family: inherit;
  padding: 0.35em;
  padding-left: 1.2em;
  font-size: 17px;
  font-weight: 500;
  border-radius: 0.9em;
  border: none;
  letter-spacing: 0.05em;
  display: flex;
  align-items: center;
  box-shadow: inset 0 0 1.6em -0.6em #39373a;
  overflow: hidden;
  position: relative;
  height: 2.8em;
  padding-right: 3.3em;
  cursor: pointer;
}

.cssbuttons-io-button .icon {
  background: rgb(0, 0, 0);
  margin-left: 1em;
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 2.2em;
  width: 2.2em;
  border-radius: 0.7em;
  box-shadow: 0.1em 0.1em 0.6em 0.2em #39363c;
  right: 0.3em;
  transition: all 0.3s;
}

.cssbuttons-io-button:hover .icon {
  width: calc(100% - 0.6em);
}

.cssbuttons-io-button .icon svg {
  width: 1.1em;
  transition: transform 0.3s;
  color: #ffffff;
}

.cssbuttons-io-button:hover .icon svg {
  transform: translateX(0.1em);
}

.cssbuttons-io-button:active .icon {
  transform: scale(0.95);
}


    </style>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
            // Hide the loading spinner when all content is loaded
            document.getElementById("loadingSpinner").style.display = "none";
        });
      function showCreateForm(event) {
      event.preventDefault();
      var formContainer = document.querySelector('.create_pop');
      formContainer.style.display = 'flex';
    }
    function hideCreateForm(event) {
      event.preventDefault();
      var formContainer = document.querySelector('.create_pop');
      formContainer.style.display = 'none';
    }
    function showchats(){
      var but = document.querySelector('.wrapper2');
      var chat = document.querySelector('.wrapper');
      var chat1 = document.querySelector('.right');
      but.style.display = 'none';
      chat.style.display = 'block';
    }
    function hidechats(){
      var but = document.querySelector('.wrapper2');
      var chat = document.querySelector('.wrapper');
      but.style.display = 'block';
      chat.style.display = 'none';
    }
    function showchatui(){
      var ui = document.querySelector('.wrapper3');
      var users = document.querySelector('.wrapper');
      ui.style.display = 'block';
      users.style.display = 'none';
    }
    function hidechatui(){
      var ui = document.querySelector('.wrapper3');
      var users = document.querySelector('.wrapper');
      ui.style.display = 'none';
      users.style.display = 'block';
    }
</script>
  </head>
  <body>
  <div class="loading-spinner" id="loadingSpinner"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src= "script/script.js"></script>
    
<div class="create_pop">
  <div class="form-container">
    <form class="form" method="post" autocomplete="off" enctype="multipart/form-data">
      <div class="form-group">
      <div class="icons8-cancel" onclick="hideCreateForm(event)"></div>
        <label for="email">TItle</label>
        <input required="true" name="title" id="email" type="text" >
      </div>
      <div class="form-group">
        <label for="textarea">Discription</label>
        <textarea required="true" cols="50" rows="10" id="textarea" name="textarea"></textarea>
      </div>
      <div class="form-group1">
        <label for="textarea">Provide some hashtags</label>
        <textarea required="true" cols="50" rows="10" id="textarea" name="hashtag"></textarea>
      </div>
      <div class="form-group">
        <label for="textarea">Upload</label>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile02" name="image" accept=" .jpg, .png, .jpeg, .webp" >
        </div>
      </div>
      <button type="submit" name="submit" class="form-submit-btn">Submit</button>
    </form>
  </div>
</div>
<div class="resultDiv">
<div class="wrapper1">
<div class="sidebar">
  <div class="icon">
    <div class="logo">
      <img src="Images/img/ideapoint_icon.png" alt="logo">
    </div>
  </div>
        <ul>
            <li><a href="#" style="color: #fff"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#" onclick="showCreateForm(event)"><i class="fas fa-plus"></i>Create</a></li>
            <li><a href="#"><i class="fas fa-search"></i>Search</a1></li>
            <li><a href="users.php"><i class="fas fa-envelope"></i>Messages</a></li>
            <li><a href="#"><i class="fas fa-bell"></i>Notifications</a></li>
            <li><a href="#"><i class="fas fa-address-book"></i>Contact Us</a></li>
        </ul> 
        <div class="social_media">
        <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
        <div class="btn-group dropup">
  <button type="button" class="btn btn-secondary" style= "background: black; border: none; outline: none; display: flex;">
  <img src="php/images/<?php echo $row['img'];?>" alt="Profile Photo" class="dropdown-photo" style="margin-right: 15px; margin-left: 35px;">
  <?php
  if (isset($_SESSION['unique_id'])) {
    if ($sql && $row) {
        echo '<p style="margin: auto;">' . $row['fname'] .'</p>';
        echo '<p><pre> </pre></p>';
        echo '<p style = "margin: auto;">'.$row['lname'].'</p>';
    } else {
        // Handle error or default name
        echo '<p style="margin: auto;">User</p>';
    }
}
else{
  echo "Email not found.";
}
?>
  </button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" style= "background: black; border: none; outline: none;">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" style="width: 200px; background-color: #333; padding: 0px;">
      <li style="padding: 5px;"><a href="#" ><i class="fas fa-cog"></i>Settings</a></li>
      <li style="padding: 5px;"><a href="#"><i class="fas fa-address-book"></i>Contact Us</a></li>
      <li style="padding: 5px; background-color: red"><a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
  </ul>
</div>
      </div>
    </div>
    </div>        
<div class="middle">
  <?php
    $rows = mysqli_query($conn, "select * from posts order by id desc");
  ?>
  <?php foreach($rows as $row) : ?>
    <div class="post-container">
      <div class="post-title"><?php echo $row["title"]; ?></div>
      <div class="post-image-container">
        <img src="Images/uploaded/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>">
      </div>
      <div class="post-description"><?php echo $row["description"]; ?>
      <button class="custom-button"> <b>Request Join</b></button>
    </div>
    </div>
  <?php endforeach; ?>
</div>
    <div class="wrapper2">
    <div class="chats">
      </div>
    </div>
</body>
</html>