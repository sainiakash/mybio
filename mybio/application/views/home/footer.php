<!-- Footer -->
<div class="container-fluid">
  <div class="footer padding">
    <div class="container">
      <div class="footer-top">
        <div class="row align-items-center">
          <div class="col-md-4 col-lg-5 ">
            <div class="f-t-content">
              <p>Contact number
              </p>
              <h5><a class="text-light" href="tel:408-458-9988"> 408-458-9988</a>
              </h5>
            </div>
          </div>
          <div class="col-md-4 col-lg-2 ">
            <div class="f-t-link text-center">
              <div class="logo1">
                <a href="">
                  <i class="fab fa-apple">
                  </i>
                </a>
              </div>
              <div class="or">
                <h6>OR
                </h6>
              </div>
              <div class="logo1">
                <a href="">
                  <i class="fab fa-google-play">
                  </i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-5">
            <div class="f-t-content text-right">
              <p>online CONSULTANT
              </p>
              <h5><a class="text-light" href="mailto:info@mybio23.com">info@mybio23.com</a>
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-middle padding">
        <div class="row align-items-center">
          <div class="col-md-5">
            <div class="about-us">
              <h4>
                About us
              </h4>
              <p>Our Goal is to keep all members 
                <br> healthy and live younger through mybio23.
              </p>
              <div class="social-icon">
                <a href="#">
                  <i class="fab fa-instagram">
                  </i>
                </a>
                <a href="#">
                  <i class="fab fa-facebook-f">
                  </i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter">
                  </i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin-in">
                  </i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-2">
            <div class="about-us">
              <h4>Quick links
              </h4>
              <div class="link-list">
                <li>
                  <i class="fas fa-caret-right">
                  </i>
                  <a href="<?php echo base_url('about'); ?>">About
                  </a>
                </li>
                <li>
                  <i class="fas fa-caret-right">
                  </i>
                  <a href="<?php echo base_url('home-test'); ?>">test kit
                  </a>
                </li>
                <li>
                  <i class="fas fa-caret-right">
                  </i>
                  <a href="<?php echo base_url('contact-us'); ?>">support
                  </a>
                </li>
                <li>
                  <i class="fas fa-caret-right">
                  </i>
                  <a href="<?php echo base_url('contact-us'); ?>">contact us
                  </a>
                </li>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <div class="f-b-content">
            <p class="m-0">Mybio23 &copy; 2023
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="f-b-content">
            <p class="m-0">
              <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy
              </a>
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="f-b-content">
            <p class="m-0">
              <a href="<?php echo base_url('terms-conditions'); ?>">Terms & Conditions
              </a>
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="f-b-content">
            <p class="m-0">Developed By 
              <a href="https://webzent.com/" class="text-light" target="_blank">Webzent Technologies
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<script>
    $(document).ready(function()
    {
      if($('.bbb_viewed_slider').length)
        {
          var viewedSlider = $('.bbb_viewed_slider');

            viewedSlider.owlCarousel(
            {
            loop:true,
            margin:30,
            autoplay:true,
            autoplayTimeout:6000,
            nav:false,
            dots:false,
            responsive:
            {
            0:{items:1},
            575:{items:2},
            768:{items:3},
            991:{items:4},
            1199:{items:4}
            }
            });

            if($('.bbb_viewed_prev').length)
            {
            var prev = $('.bbb_viewed_prev');
            prev.on('click', function()
            {
            viewedSlider.trigger('prev.owl.carousel');
            });
            }

            if($('.bbb_viewed_next').length)
            {
            var next = $('.bbb_viewed_next');
            next.on('click', function()
            {
            viewedSlider.trigger('next.owl.carousel');
            });
            }
            }
   });
</script>
</body>
</html>
