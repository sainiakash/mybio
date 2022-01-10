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
        
        <div class="check-out-heading-light d-flex align-items-center mt-3">
          <div class="check-num-light">
            <span>1</span>
          </div>
          <div>
            <h6 class="m-0">
              Login/Register
            </h6>
          </div>
        </div>
        <div class="check-out-heading-black d-flex align-items-center mt-3">
            <div class="check-num">
              <span>2</span>
            </div>
            <div>
              <h6 class="m-0 text-white">
                Details
              </h6>
            </div>
          </div>
          <div class="check-out-body">
            <div class="row mt-3 align-items-center">
              <div class="col-md-5">
               <div class="saved-add-box">
                    <div class="saved-add-container">
                        <div class="saved-add">

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="add-name">
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenter">
                                            <p class="m-0">Alex Smith, <br> 
                                                New City USA 11946,<br>
                                                Male, 25
                                            </p>
                                        </a>
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header" style="border: none !important;">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12 text-center">
                                                              <h6 class="m-0">Add New Address</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 
                                                
                                                </div>
                                                <div class="modal-body">
                                                 <div class="container">
                                                     <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="payment-mobile">
                                                                <input type="text" placeholder="Search Locality">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="payment-mobile">
                                                                <input type="text" placeholder="Home Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="payment-mobile">
                                                                <input type="text" placeholder="City, State">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="payment-mobile">
                                                                <input type="text" placeholder="Pin Code *">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="payment-mobile">
                                                                <input type="text" placeholder="City, State">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex align-items-center">
                                                                <input type="radio" id="choose" >
                                                                <label for="choose" class="small m-0 ml-2">Make Default Address</label>
                                                            </div>
                                                        </div>
                                                     </div>
                                                     <div class="row mt-4">
                                                         <div class="col-md-6 text-right">
                                                             <div class="modal-btn">
                                                                 <a href="payment3.html">
                                                                    <button type="button">Save</button>
                                                                 </a>
                                                                 
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="modal-btn">
                                                                <button type="button" data-dismiss="modal">Cancel</button>
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
                                <div class="col-md-2 text-right">
                                    <div class="radio">
                                        <input type="radio">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
              </div>
              <div class="col-md-7">
                <div class="add-address-box text-center">
                    <a href="" data-toggle="modal" data-target="#exampleModalCenter1">ADD NEW DETAILS</a>
                    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header" style="border: none !important;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                          <h6 class="m-0">Enter Your Details</h6>
                                        </div>
                                    </div>
                                </div>
                             
                            
                            </div>
                            <div class="modal-body" style="text-align: left;">
                             <div class="container">
                                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="payment-mobile">
                                            <span class="clr">Name</span>
                                            <input type="text" placeholder="Enter Your Full Name *">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="payment-mobile">
                                            <span class="clr">Email</span>
                                            <input type="text" placeholder="Enter Your Email *">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="payment-mobile">
                                           <span class="clr">Age</span>
                                            <input type="text" placeholder="Enter Your Age (Eg. 39)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="gender">
                                            <span class="clr">
                                                Gender
                                            </span>
                                           <div class="d-flex align-items-center mt-3"> 
                                            <div class="form-check mr-3">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                <label class="form-check-label m-0 ml-1" for="exampleRadios1">
                                                 Male
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                <label class="form-check-label m-0 ml-1" for="exampleRadios2">
                                                  Female
                                                </label>
                                              </div>
                                              
                                           </div>
                                        </div>
                                    </div>
                                   
                                    
                                 </div>
                                 <div class="row mt-4">
                                     <div class="col-md-12 text-center">
                                         <div class="modal-btn">
                                             <button  type="button" data-dismiss="modal">Save</button>
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

