<?php $this->load->view('home/header'); ?>
<div class="other-page">
  <div class="other-heading text-center text-white">
    <h1>Test
    </h1>
    <p>Lab / Tests
    </p>
  </div>
</div>
</div>
</div>
<div class="container-fluid">
  <div class="container padding">
    <div class="spec-head">
      <h6>Specialty
      </h6>
      <h4>Our Tests
      </h4>
      <hr class="green-hr">
    </div>
    <div class="row mt-5">
      <?php
      foreach($test as $values) 
      {
      ?>
      <div class="col-md-6 col-lg-3">
        <div class="test-box">
          <div class="offer">
            <p>20% Off
            </p>
          </div>
          <h5>
            <?php echo $values['t_name']; ?>
          </h5>
          <p>Include : 10 Parameters
          </p>
          <div class="test-box-list">
            <li>
              <?php echo $values['t_description']; ?>
            </li>
          </div>
          <div class="know-more-btn">
            <a href="">Know More
            </a>
          </div>
          <div class="price">
            <span>
              <del class="text-muted">
                <?php echo $values['t_mrp']; ?>
              </del>
            </span>
            <span class="price-green">
              <?php echo $values['t_price']; ?>
            </span>
          </div>
          <div class="book-now text-center">
            <a href="">Book Now
            </a>
          </div>
        </div>
      </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>
<!-- Offer & Announcements -->
<div class="container-fluid bg-large">
  <div class="container padding">
    <div class="line-heading-white">
      <h4>Offer & Announcements
      </h4>
      <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam, facere.
      </p>
    </div>
    <div class="row mt-5">
      <div class="col-md-4">
        <div class="offer-box">
          <div class="offer-image">
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
              <a href="">
                <i class="fas fa-long-arrow-alt-right">
                </i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="offer-box">
          <div class="offer-image">
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
              <a href="">
                <i class="fas fa-long-arrow-alt-right">
                </i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="offer-box">
          <div class="offer-image">
            <img src="<?= base_url('public/home/assets/images/offer3.png'); ?>" alt="">
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
              <a href="">
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
<!-- news letter -->
<div class="container-fluid">
  <div class="container padding">
    <div class="row">
      <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <div class="newsletter-box text-center">
          <div class="newsletter-content ">
            <h4>SUBSCRIBE TO OUR NEWSLETTER
            </h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam rerum, ratione dolore sunt obcaecati et dolores culpa aliquid commodi? Quasi.
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
