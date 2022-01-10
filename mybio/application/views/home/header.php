<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Font awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/home/assets/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">   -->
   
    <title>MyBio23</title>
    
  </head>
  <body> 
    <div class="container-fluid">
      <div class="top-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5">
              <div class="header-content d-flex align-items-center justify-content-around">
                <div class="content-text ">
                  <p>CONTACT NUMBER
                  </p>
                  <h5><a style="color: #70B544;" href="tel:408-458-9988"> 408-458-9988</a>
                  </h5>
                </div>
                <div class="select">
                  <select name="" id="">
                    <option value="" selected>EN
                    </option>
                    <option value="">KR
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <div class="logo">
                <a href="<?php echo base_url('/'); ?>">
                <img src="<?php echo base_url('public/admin/images/mybio23-01.png'); ?>" alt=""></a>
              </div>
            </div>
            <div class="col-md-5">
              <div class="header-content d-flex align-items-center justify-content-around">
                <?php
                if(empty($this->session->userdata('u_id')))
                {
                ?>
                <div class="sign-in ">
                  <a href="<?php echo base_url('signin'); ?>">
                    <i class="fas fa-user">
                    </i>Sign In
                  </a>
                </div>
                <?php
                }
                else
                {
                  ?>
                  <div class="sign-in ">
                    <a href="<?php echo base_url('user-dashboard'); ?>">
                      <i class="fas fa-user">
                      </i>Hello, <?php echo $this->session->userdata('u_name'); ?>
                    </a>
                  </div>
                  <?php
                }
                ?>
                <div class="content-text text-right">
                  <p>ONLINE CONSULTANT
                  </p>
                  <h5><a style="color: #70B544;" href="mailto:info@mybio23.com">info@mybio23.com</a>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="header-slider">
        <div class="navigation">
          <div class="container">
            <nav class="navbar navbar-expand-xl navbar-light">
              <a class="navbar-brand" href="#">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                  <li class="nav-item ">
                    <a class="nav-link " href="<?php echo base_url('/'); ?>">Home 
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('about'); ?>">About
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('services'); ?>">Services
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('shop'); ?>">shop
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('latest-news'); ?>">latest news
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('contact-us'); ?>">contact
                    </a>
                  </li>
                  <div class="download-app">
                    <a href="">download app
                    </a>
                  </div>
                </ul>
              </div>
            </nav>
          </div>
        </div>
