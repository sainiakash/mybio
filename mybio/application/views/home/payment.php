<?php $this->load->view('home/header1'); ?>
<div class="container-fluid padding2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9">
                <div class="logo">
                    <img src="<?= base_url()?>assets/images/logo.png" alt="">
                  </div>
            </div>
            <div class="col-md-3 text-right">
                <!-- <div class="iner-page-sign">
                    <div class="in-sign">
                        <a href="sign-in.html"><i class="fas fa-user"></i>Sign In</a>
                    </div>
                    <div class="in-sign border-left">
                        <a href="cart.html"><i class="fas fa-cart-plus"></i>Cart</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="container padding2">
    <div class="row align-items-center">
        <div class="col-md-2">
            <div class="back-home d-flex">
                <div class="go-home">
                    <a href="index.html"><i class="fas fa-long-arrow-alt-left mr-2"></i>Home</a>
                </div>
                <div class="go-home">
                    <a href="">/  Test Kit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container padding">
  <div class="row">
    <div class="col-md-8">
      <div class="check-out-box">
        <div class="check-out-heading-black d-flex align-items-center">
          <div class="check-num">
            <span>1</span>
          </div>
          <div>
            <h6 class="m-0 text-white">
              Login/Register
            </h6>
          </div>
        </div>
        <div class="check-out-body">
          <div class="row">
            <div class="col-md-6">
              <div class="payment-mobile">
                <input type="text" placeholder="Enter Mobile Number">
                <a href="payment1.html"><button>Continue</button></a>
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="payment-advantage">
                <p>Advantage of our secure login</p>
                <div class="advantage-list">
                  <div class="advantage-star">
                    <i class="fas fa-star">

                    </i>
                  </div>
                  <div class="advantage-text">
                    <p>
                      Stay informed with latest offers & reminders
                    </p>
                  </div>
                </div>
                <div class="advantage-list">
                  <div class="advantage-star">
                    <i class="fas fa-star">

                    </i>
                  </div>
                  <div class="advantage-text">
                    <p>
                      Single login for App & Web, access to historic reports
                    </p>
                  </div>
                </div>
                <div class="advantage-list">
                  <div class="advantage-star">
                    <i class="fas fa-star">

                    </i>
                  </div>
                  <div class="advantage-text">
                    <p >
                      Control all notifications, zero spam
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="check-out-heading-light d-flex align-items-center mt-3">
          <div class="check-num-light">
            <span>2</span>
          </div>
          <div>
            <h6 class="m-0">
              Details
            </h6>
          </div>
        </div>
        <div class="check-out-heading-light d-flex align-items-center mt-3">
          <div class="check-num-light">
            <span>3</span>
          </div>
          <div>
            <h6 class="m-0">
              Add Address, Date & Time
            </h6>
          </div>
        </div>
        <div class="check-out-heading-light d-flex align-items-center mt-3">
          <div class="check-num-light">
            <span>4</span>
          </div>
          <div>
            <h6 class="m-0">
              Payment Options
            </h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="order-history-header text-center">
        <p class="m-0 text-white">PACKAGE DETAILS</p>
      </div>
      <div class="cart-price-box position-relative mt-2">
        <div class="row">
         <div class="col-md-12">
          <h5>DNA Test Basic</h5>
          <div class="d-flex align-items-center">
            <h6 class="mr-3"><del>$55</del></h5>
            <h5 class="clr">$50</h5>
          </div>
         </div>
        </div>
        <div class="cart-offer">
          <p>20% Off</p>
        </div>
      </div>
      <div class="cart-price-box2 mt-4">
        <div class="border-bottom py-3">
          <div class="row">
         
            <div class="col-md-6">
              <h5 class="text-muted">Price</h6>
            </div>
            <div class="col-md-6 text-right">
              <h5 class="clr">$50</h6>
            </div>
           
            <div class="col-md-12">
              <div class="consultant-fee d-flex align-items-center">
                <div>
                  <h6 class="text-muted mr-4 m-0">Consultant Fee</h6>
                </div>
                <div class="my-badge">
                  <span>Free</span>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
        <div class="row mt-3">
          <div class="col-md-6">
            <h6 class="clr">Total Payable</h6>
          </div>
          <div class="col-md-6 text-right">
            <h5 class="clr">$50</h5>
          </div>
        
        </div>
      </div>
  </div>
  </div>
</div>
<?php $this->load->view('home/footer'); ?>