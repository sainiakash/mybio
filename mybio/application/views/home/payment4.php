<?php
$this->load->view('user/user_header');
?>

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
        <div class="col-md-4 col-lg-2">
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
        
        <div class="check-out-heading-light d-flex align-items-center mb-3">
          <div class="check-num-light">
            <span>1</span>
          </div>
          <div>
            <h6 class="m-0">
              Login/Register
            </h6>
          </div>
        </div>
        <div class="check-out-heading-light d-flex align-items-center mb-3">
            <div class="check-num-light">
              <span>2</span>
            </div>
            <div>
              <h6 class="m-0">
                Details
              </h6>
            </div>
          </div>
          <div class="check-out-heading-light d-flex align-items-center mb-3">
            <div class="check-num-light">
              <span>3</span>
            </div>
            <div>
              <h6 class="m-0">
               Add Address, Date & Time
              </h6>
            </div>
          </div>
        <div class="check-out-heading-black d-flex align-items-center mt-3">
            <div class="check-num">
              <span>4</span>
            </div>
            <div>
              <h6 class="m-0 text-white">
                Payment Options
              </h6>
            </div>
          </div>
          <div class="check-out-body">
           <div class="coupon-area">
               <div class="view-coupon">
                   <div class="row">
                       <div class="col-md-6">
                           <div class="apply-coupon-heading">
                               <div class="coupon-icon">
                                <img src="<?= base_url()?>assets/images/icons8-coupon-60.png" alt="">
                               </div>
                               <div class="coupon-text">
                                   <p>Apply Coupon Here</p>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-6 text-right">
                        <div class="view-coupon">
                            <a href="view-coupon.html" class="m-0">View All Coupon <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                       </div>
                       
                   </div>
                   <div class="row mt-4">
                       <div class="col-md-8 col-lg-6 offset-lg-3 offset-md-2">
                           <div class="apply-coupon-box">
                               <input type="text" placeholder="Enter Coupon Code">
                               <div class="apply-coupon-btn">
                                   <button type="button">Add</button>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row mt-4 ">
                       <div class="col-md-12">
                           <div class="redeem-box">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="redeem-text">
                                        <p class="m-0">Redeem Reward Points <i class="fas fa-info-circle text-muted" title="Please read all terms and conditions carefully"></i></p>
                                        <span>(Available Points 10)</span>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="redeem-btn">
                                        <button>Redeem Now</button>
                                    </div>
                                </div>
                            </div>
                           </div>
                       </div>
                   </div>
                   <div class="row mt-4 border-bottom pt-3 pb-3 ">
                    <div class="col-md-8 col-lg-6">
                      <h5 class="clr">Total Payable Amount </h5>
                    </div>
                    <div class="col-md-4 col-lg-6 text-right">
                      <h5 class="clr">$50</h5>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-12">
                      <h5 class="mb-3">Select Payment Method</h5>
                      <div class="payment-method">
                        <div id="accordion">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Credit/Debit Card
                                </button>
                              </h5>
                            </div>
                        
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                               <div class="card-box">
                                 <div class="row">
                                   <div class="col-md-12 mb-4">
                                     <div class="card-input">
                                       <input type="text" placeholder="Card Number">
                                     </div>
                                   </div>
                                   <div class="col-md-12 mb-4">
                                     <div class="card-input">
                                       <input type="text" placeholder="Name On Card">
                                     </div>
                                   </div>
                                   <div class="col-md-8 mb-4">
                                    <div class="card-input">
                                      <input type="text" placeholder="Valid Thru (MM/YY)">
                                    </div>
                                   </div>
                                   <div class="col-md-4">
                                     <div class="card-input">
                                       <input type="text" placeholder="CVV">
                                     </div>
                                   </div>
                                 </div>
                                 <div class="row">
                                   <div class="col-md-12">
                                     <div class="check-box">
                                       <div>
                                         <input type="checkbox" class="mr-2">
                                       </div>
                                       <div><p class="m-0 small ">Save this card for faster payments</p></div>
                                     </div>
                                     <div class="pay-now-btn mt-4">
                                      <a href="">Pay Now</a>
                                    </div>
                                   </div>
                                 </div>
                               </div>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  UPI
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                              <div class="card-box">
                                <div class="upi-box">
                                  <div>
                                    <input type="radio">
                                  </div>
                                  <div class="upi-img">
                                    <img src="<?= base_url()?>assets/images/PhonePe-Logo.wine.svg" alt="">
                                  </div>
                                </div>
                                <div class="upi-box">
                                  <div>
                                    <input type="radio">
                                  </div>
                                  <div class="upi-img">
                                    <img src="<?= base_url()?>assets/images/Paytm-Logo.wine.svg" alt="">
                                  </div>
                                </div>
                                <div class="upi-box">
                                  <div>
                                    <input type="radio">
                                  </div>
                                  <div class="upi-img">
                                    <img src="<?= base_url()?>assets/images/Google_Pay_Send-Logo.wine.svg" alt="">
                                  </div>
                                </div>
                                <div class="pay-now-btn">
                                  <a href="">Pay Now</a>
                                </div>
                              </div>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Net Banking
                                </button>
                              </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                            <div class="card-box">
                              <div class="net-banking-box d-flex align-items-center">
                                <div>
                                  <input type="radio" class="mr-3">
                                </div>
                                <div class="net-banking-detail d-flex align-items-center">
                                  <div class="net-banking-icon">
                                    <span><i class="fas fa-university"></i></span>
                                  </div>
                                  <div class="net-banking-name">
                                    <p class="m-0">Bank Name</p>
                                  </div>
                                </div>
                              </div>
                              <div class="net-banking-box d-flex align-items-center">
                                <div>
                                  <input type="radio" class="mr-3">
                                </div>
                                <div class="net-banking-detail d-flex align-items-center">
                                  <div class="net-banking-icon">
                                    <span><i class="fas fa-university"></i></span>
                                  </div>
                                  <div class="net-banking-name">
                                    <p class="m-0">Bank Name</p>
                                  </div>
                                </div>
                              </div>
                              <div class="net-banking-box d-flex align-items-center">
                                <div>
                                  <input type="radio" class="mr-3">
                                </div>
                                <div class="net-banking-detail d-flex align-items-center">
                                  <div class="net-banking-icon">
                                    <span><i class="fas fa-university"></i></span>
                                  </div>
                                  <div class="net-banking-name">
                                    <p class="m-0">Bank Name</p>
                                  </div>
                                </div>
                              </div>
                              <div class="net-banking-box d-flex align-items-center">
                                <div>
                                  <input type="radio" class="mr-3">
                                </div>
                                <div class="net-banking-detail d-flex align-items-center">
                                  <div class="net-banking-icon">
                                    <span><i class="fas fa-university"></i></span>
                                  </div>
                                  <div class="net-banking-name">
                                    <p class="m-0">Bank Name</p>
                                  </div>
                                </div>
                              </div>

                              <div class="pay-now-btn mt-3">
                                <a href="">Pay Now</a>
                              </div>

                            </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
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

<?php
  	$this->load->view('user/footer');
?>

