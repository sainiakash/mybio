<?php
$this->load->view('home/header1');
?>
<div class="other-page">
  <div class="other-heading text-center text-white">
    <h1>Appointments
    </h1>
    <p>Home / Appointments
    </p>
  </div>
</div>
</div>
</div>

<div class="container-fluid">
  <div class="my-page">
    <div class="container padding">
      <div>
        <h4 >My Page
        </h4>
        <hr class="green-hr ">
        
        
  <div class="row mt-5">
   <?php $this->load->view('home/sidebar');?>
      <div class="col-md-8 col-lg-8">
          <div class="order-history-box">
              <div class="order-history-header">

              </div>
              <div class="order-product-box">
                  <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="lab-detail">
                            <h5>Lab Corp</h5>
                            <div class="lab-tag">
                                <li><i class="fas fa-award mr-3"></i>Certified Lab</li>
                                <li><i class="fas fa-check-circle mr-3 text-primary"></i>E-Reports in 2 Days</li>
                                <p>+10% Health Cashback* T&C</p>
                            </div>
                            <div class="lab-detail-box">
                                <a href="lab-view.html">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5 class="clr">UPCOMING</h5>
                    </div>
                    <div class="col-md-4">
                        <div class="lab-icon text-center">
                            <span>
                                <img src="images/icons8-lab-items-96.png" alt="">
                            </span>
                           
                            <div class="lab-btn">
                                <h5 class="m-0">28/04/21</h5>
                                <p class="m-0">09:14 PM</p>
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
<?php
  	$this->load->view('home/footer');
?>


