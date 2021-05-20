<?php

session_start();
require('db.php');
require('style.php');
require('js.php');


?>
<a class="copy" href="http://dsksolutions.unaux.com"><img src="assets/images/logo.png" height="70px" /></a>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Bootstrap CSS -->
  <!-- Meta TAGS -->
  <meta name="description" content="Question Management Software, DSK Solutions Kubeer Pvt. Ltd. Ask Here For Tech And Music Solutions. Home Page | Dj Sai Kubeer Softwares And Worlds Pvt. Ltd., Any Technical And Music Issue Solutions" />
  <meta name="author" content="Sainath Sapa" />
  <meta name="copyright" content="Dj Sai Kubeer Softwares And Worlds Pvt. Ltd. All Rights Reserved." />
  <meta name="robots" content="index,follow" />
  <meta name="googlebot" content="index,follow" />
  <link rel="shortcut icon" href="/assets/images/logo.png" type="image/png" />

</head>
<div class="container">
  <br>

  <h1 class="text-center head_line "> Question Management Web Application</h1>
  <strong class="ml-5 pl-5"> As a assigned TASK for iCloudEMS - Sainath Sapa </strong>

  <br>
  <nav class=" navbar navbar-expand-md navbar-dark bg-info">
    <a class="navbar-brand" href="#">Welcome Admin[static] </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Nav_bar" aria-controls="Nav_bar" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="Nav_bar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php"><img class="img px-1" src="assets/images/home.svg" height="20px" />Home <span class="sr-only">(current)</span></a>
        </li>


        <li class="nav-item dropdown text-white bg-info">
          <a class="nav-link dropdown-toggle text-white " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img px-1" src="assets/images/add_new.png" height="20px" />New</a>
          <div class="dropdown-menu bg-info " aria-labelledby="dropdown04">

            <a class=" p-1 px-2 text-left text-white" href="add_qns"><img class="img px-1" src="assets/images/add.png" height="20px" /> Question </a>
            <hr color="white">
            <a class=" p-1 px-2 text-left text-white" href="mk_qp"><img class="img px-1" src="assets/images/view.png" height="20px" /> Question Paper </a>
            <hr color="white">
            <a class=" p-1 px-2 text-left text-white" href="add_stdnt"><img class="img px-1" src="assets/images/add_stdnt.png" height="20px" /> Student </a>


          </div>
        </li>

        <li class="nav-item dropdown text-white bg-info">
          <a class="nav-link dropdown-toggle text-white " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img px-1" src="assets/images/view_eye.png" height="20px" />View</a>
          <div class="dropdown-menu bg-info " aria-labelledby="dropdown04">

            <a class=" p-1 px-2 text-left text-white" href="view_qns"><img class="img px-1" src="assets/images/add.png" height="20px" /> Questions </a>
            <hr color="white">
            <a class=" p-1 px-2 text-left text-white" href="view_qp"><img class="img px-1" src="assets/images/view.png" height="20px" /> Question
              Papers </a>
            <hr color="white">
            <a class=" p-1 px-2 text-left text-white" href="view_stdnts"><img class="img px-1" src="assets/images/stdnts.png" height="20px" /> Students </a>

          </div>
        </li>
        <li class="nav-item active hover">
          <a class="nav-link" href="importMarks"><img class="img px-1" src="assets/images/import.png" height="20px" />Import Marks </a>
        </li>



      </ul>
      <div class="nav-item text-white log_out mr-auto">
        <a class="nav-link text-white ml-auto" href="exit.php"><img class="img px-1" src="assets/images/log_out.png" height="20px" />Exit
        </a>
      </div>
    </div>
  </nav>