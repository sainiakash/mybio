<?php
$this->load->view('home/header1');
?>
<div class="other-page">
  <div class="other-heading text-center text-white">
    <h1>Order History
    </h1>
    <p>Home / Order History
    </p>
  </div>
</div>
</div>
</div>

<div class="container padding2">
    <div class="row align-items-center">
      
        <div class="col-md-12 text-right mt-4">
          <div class="cart-btn">
            <a href="" class="active">DELIVERED</a>
            <a href="">PENDING</a>
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
      <div class="col-md-6 col-lg-8 ">
          <div class="order-history-box">
              <div class="order-history-header">

              </div>
              <div class="order-product-box">
                  <div class="row pb-2">
                      <div class="col-md-6">
                          <div class="">
                            <a href="
                          ">
                          <div class="order-product d-flex">
                            <div class="order-product-name">
                                <h4>ResveraCel &reg; </h4>
                                <p>Product ID : 387920935883</p>
                            </div>
                            <div class="order-product-image">
                                <img src="images/product.png" class="img-fluid" alt="">
                            </div>
                        </div>
                        </a>
                          </div>
                          
                      </div>
                      <div class="col-md-6 text-right">
                          <div class="order-product-price">
                              <h4>$45</h4>
                              <h5><del>$55</del></h5>
                          </div>
                      </div>
                  </div>
                  <div class="row  align-items-center">
                      <div class="col-md-6">
                        <div class="off-price-box">
                          <div class="off-icon">
                           <i class="fas fa-check-circle text-success mr-3"></i>
                          </div>
                          <div class="off-price">
                           <p class="m-0">Extra 30% Off</p>
                          </div>
                       </div>
                      </div>
                      <div class="col-md-6 text-right">
                        <div class="align-left">
                          <p class="m-0 text-muted">29/10/2021</p>
                          <h6 class="clr">DELIVERED</h6>
                       
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
