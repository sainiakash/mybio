<?php $this->load->view('home/header'); ?>
<div class="slider-container">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
      </li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1">
      </li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2">
      </li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="slider-img">
          <img class="  w-100" src="<?php echo base_url('public/home/assets/images/header.png'); ?>" alt="First slide">
          <div class="carousel-caption text-left home-slide d-md-block">
            <h4>Our goal is to keep
            </h4>
            <h1>All Members Healthy
            </h1>
            <h5>Healthy right, be bright.
            </h5>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="slider-img">
          <img class="w-100" src="<?php echo base_url('public/home/assets/images/header.png'); ?>" alt="Second slide">
          <div class="carousel-caption text-left home-slide d-md-block">
            <h4>Our goal is to keep
            </h4>
            <h1>All Members Healthy
            </h1>
            <h5>Healthy right, be bright.
            </h5>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="slider-img">
          <img class=" w-100" src="<?php echo base_url('public/home/assets/images/header.png'); ?>" alt="Third slide">
          <div class="carousel-caption home-slide text-left  d-md-block">
            <h4>Our goal is to keep
            </h4>
            <h1>All Members Healthy
            </h1>
            <h5>Healthy right, be bright.
            </h5>
          </div>
        </div>
      </div>
    </div>
    <div class="arrow">
      <a class="carousel-control-prev prev1" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span>
          <i class="fas fa-caret-square-left">
          </i>
        </span>
      </a>
      <a class="carousel-control-next next1" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span>
          <i class="fas fa-caret-square-right">
          </i>
        </span>
      </a>
    </div>
  </div>
</div>
</div>
</div>
<div class="container-fluid">
  <div class="container padding">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="search-box">
          <input type="text" placeholder="Find Your Test/Kit">
          <div class="search-btn">
            <a href="">
              <i class="fas fa-search mr-3">
              </i>Search
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- select lab -->
<div class="container-fluid">
  <div class="select-lab padding">
    <div class="container">
      <div class="lab-text text-center">
        <h4 class="text-white">Please Select Your Way
        </h4>
        <hr class="white-hr mx-auto">
      </div>
      <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
          <div class="lab-box">
            <div class="lab">
              <span>
                <i class="fas fa-plus">
                </i>
              </span>
              <h5>Lab
              </h5>
              <li>
                <a href="<?php echo base_url('lab'); ?>">click here
                </a>
                <i class="fas fa-long-arrow-alt-right">
                </i>
              </li>
            </div>
            <div class="lab">
              <span>
                <i class="fas fa-home">
                </i>
              </span>
              <h5>Home
              </h5>
              <li>
                <a href="<?php echo base_url('home-test'); ?>">click here
                </a>
                <i class="fas fa-long-arrow-alt-right">
                </i>
              </li>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  -->
<div class="bbb_viewed">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="bbb_main_container">
          <div class="bbb_viewed_title_container">
            <div class="test-us1">
              <h4>Most Searched DNA Test
              </h4>
            </div>
            <div class="bbb_viewed_nav_container">
              <div class="bbb_viewed_nav bbb_viewed_prev">
                <i class="fas fa-chevron-left">
                </i>
              </div>
              <div class="bbb_viewed_nav bbb_viewed_next">
                <i class="fas fa-chevron-right">
                </i>
              </div>
            </div>
          </div>
          <div class="bbb_viewed_slider_container">
            <div class="owl-carousel owl-theme bbb_viewed_slider">
              <?php
              foreach($test as $values)
              {
              ?>
              <div class="owl-item test-box3">
                <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="bbb_viewed_image">
                    <img src="<?php echo base_url('public/test/').$values['t_image']; ?>"  alt="">
                  </div>
                  <div class="bbb_viewed_content text-center">
                    <div class="bbb_viewed_price">
                      <?php echo $values['t_price']; ?>
                      <span>
                        <?php echo $values['t_mrp']; ?>
                      </span>
                    </div>
                    <div class="bbb_viewed_name mb-2">
                      <a href="#">
                        <?php echo $values['t_name']; ?>
                      </a>
                    </div>
                    <div class="know-more-btn2">
                      <a href="<?php echo base_url('test-detail/').$values['t_id']; ?>">Know More
                      </a>
                    </div>
                  </div>
                  <ul class="item_marks">
                    <li class="item_mark item_discount">-25%
                    </li>
                    <li class="item_mark item_new">new
                    </li>
                  </ul>
                </div>
              </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
<!-- Test by condition -->
<div class="container-fluid">
  <div class="test-category padding">
    <div class="container">
      <div class="line-heading">
        <h4>
          Test By Condition
        </h4>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
        </p>
      </div>
      <div class="row mt-5">
        <?php
        foreach($category as $values)
        {
        ?>
        <div class="col-md-3 mb-4">
          <div class="condition-btn">
            <button>
              <?php echo $values['c_name']; ?>
            </button>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div> 
</div>
<!-- Offer & Announcements -->
<div class="container-fluid ">
  <div class="no-scroll">
    <div class="container padding" >
      <div class="line-heading-black">
        <h4>Offer & Announcements
        </h4>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam, facere.
        </p>
      </div>
      <div class="row mt-5">
        <div class="col-md-4 col-lg-4">
          <div class="offer-box1">
            <div class="offer-image1">
              <img src="<?php echo base_url('public/home/assets/images/offer1.png'); ?>" alt="">
              <div class="offer-voucher text-center">
                <p>No Coupon Required
                </p>
              </div>
            </div>
            <div class="offer-price">
              <div>
                <h5 class="m-0">Save upto $50
                </h5>
              </div>
              <div class="btn-rounded-green">
                <a href="<?php echo base_url('home/offers'); ?>">
                  <i class="fas fa-long-arrow-alt-right">
                  </i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-4">
          <div class="offer-box1">
            <div class="offer-image1">
              <img src="<?php echo base_url('public/home/assets/images/offer2.png'); ?>" alt="">
              <div class="offer-voucher text-center">
                <p>No Coupon Required
                </p>
              </div>
            </div>
            <div class="offer-price">
              <div>
                <h5 class="m-0">Save upto $50
                </h5>
              </div>
              <div class="btn-rounded-green">
                <a href="<?php echo base_url('home/newsdetail'); ?>">
                  <i class="fas fa-long-arrow-alt-right">
                  </i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-4">
          <div class="offer-box1">
            <div class="offer-image1">
              <img src="<?php echo base_url('public/home/assets/images/offer3.png'); ?>" alt="">
              <div class="offer-voucher text-center">
                <p>No Coupon Required
                </p>
              </div>
            </div>
            <div class="offer-price">
              <div>
                <h5 class="m-0">Save upto $50
                </h5>
              </div>
              <div class="btn-rounded-green">
                <a href="<?php echo base_url('home/appointmentview'); ?>">
                  <i class="fas fa-long-arrow-alt-right">
                  </i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="app-download">
    <div class="container">
      <div class="row ">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-6">
          <div class="download-app1 text-center padding">
            <h4>Download Our App Now
            </h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil quam eum eius labore reprehenderit sint
              odit laborum quasi saepe fugiat.
            </p>
            <div class="row mt-5">
              <div class="col-md-6">
                <div class="app-store">
                  <a href="">
                    <img src="<?php echo base_url('public/home/assets/images/appstore.png'); ?>" class="img-fluid" alt="">
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="play-store">
                  <a href="">
                    <img src="<?php echo base_url('public/home/assets/images/playstore.png'); ?>" class="img-fluid" alt="">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About us section -->
<div class="container-fluid">
  <div class="container padding">
    <div class="about-us1">
      <h4>About Us
      </h4>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, aut?
      </p>
    </div>
    <div class="row mt-5">
      <div class="col-md-6">
        <div class="about-us-img1">
          <img src="<?php echo base_url('public/home/assets/images/happy-family-lying-row.png'); ?>" class="img-fluid" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="about-us-content1">
          <h6>We Provide products and solutions services developed based on the continuing research results of a
            collaborative biotechnology research team in the United States and Thorne Research, a global genetic and
            nutritional researcher.
          </h6>
        </div>
        <div class="about-us-list1">
          <li>
            <i class="far fa-check-circle">
            </i> Browse Our Website
          </li>
          <li>
            <i class="far fa-check-circle">
            </i> Choose Service
          </li>
          <li>
            <i class="far fa-check-circle">
            </i> Send Message
          </li>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bbb_viewed">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="bbb_main_container">
          <div class="bbb_viewed_title_container">
            <div class="product-us1">
              <h4>Products
              </h4>
            </div>
            <div class="bbb_viewed_nav_container">
              <div class="bbb_viewed_nav bbb_viewed_prev">
                <i class="fas fa-chevron-left">
                </i>
              </div>
              <div class="bbb_viewed_nav bbb_viewed_next">
                <i class="fas fa-chevron-right">
                </i>
              </div>
            </div>
          </div>
          <div class="bbb_viewed_slider_container">
            <div class="owl-carousel owl-theme bbb_viewed_slider">
              <?php
              foreach($product as $values)
              {
              ?>
              <div class="owl-item test-box3">
                <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="bbb_viewed_image">
                    <img src="<?php echo base_url('public/product/').$values['p_image']; ?>" alt="">
                  </div>
                  <div class="bbb_viewed_content text-center">
                    <div class="bbb_viewed_price">
                      <?php echo $values['p_price']; ?>
                      <span>
                        <?php echo $values['p_mrp']; ?>
                      </span>
                    </div>
                    <div class="bbb_viewed_name">
                      <a href="#">
                        <?php echo $values['p_name']; ?>
                      </a>
                    </div>
                    <div class="know-more-btn2 mt-3">
                      <a href="<?php echo base_url('product-detail/').$values['p_slug']; ?>">Know More
                      </a> 
                     <!-- <a href="<?php echo base_url('add-to-cart/').$values['p_slug'].'/P'.'/'.$values['p_language']; ?>" class="know-more-btn2 ml-2 ">Add to Cart</a> -->
                    </div>
                  </div>
                </div>
                <ul class="item_marks">
                  <li class="item_mark item_discount">-25%
                  </li>
                  <li class="item_mark item_new">new
                  </li>
                </ul>
              </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div> 
<!-- Owl Slider -->
<div class="container-fluid">
  <div class="testimonial">
    <div class="container padding">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators indi1">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
          </li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1">
          </li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2">
          </li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active padding">
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="testimonial-box text-center">
                  <h4>What Patients say About Us
                  </h4>
                  <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum repudiandae sint animi magnam.
                    Dolorem vero repellat vitae optio voluptatem velit?"
                  </p>
                  <p class="mb-5">Cristian/Blood Patient
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item padding">
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="testimonial-box text-center">
                  <h4>What Patients say About Us
                  </h4>
                  <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum repudiandae sint animi magnam.
                    Dolorem vero repellat vitae optio voluptatem velit?"
                  </p>
                  <p class="mb-5">Cristian/Blood Patient
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item padding">
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="testimonial-box text-center">
                  <h4>What Patients say About Us
                  </h4>
                  <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum repudiandae sint animi magnam.
                    Dolorem vero repellat vitae optio voluptatem velit?"
                  </p>
                  <p class="mb-5">Cristian/Blood Patient
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- news letter -->
<div class="container-fluid">
  <div class="container padding">
    <div class="row">
      <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <div class="newsletter-box text-center">
          <div class="newsletter-content ">
            <h4>SUBSCRIBE TO OUR NEWSLETTER
            </h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam rerum, ratione dolore sunt obcaecati
              et dolores culpa aliquid commodi? Quasi.
            </p>
          </div>
          <div class="newsletter-input">
            <input type="text" placeholder="Enter Your Email Address">
            <div class="newsletter-btn">
              <button>Subscribe
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('home/footer'); ?>
