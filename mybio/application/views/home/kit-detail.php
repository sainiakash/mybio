<?php $this->load->view('home/header1'); ?>


<div class="container-fluid padding2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-9">
                <div class="logo">
                    <img src="<?php echo base_url('public/admin/images/mybio23-01.png'); ?>" alt="">
                  </div>
            </div>
            <div class="col-md-6 col-lg-3 text-right">
                <div class="iner-page-sign">
                  <?php
                  if(!empty($this->session->userdata('u_id')))
                  {
                  ?>
                    <div class="in-sign">
                        <a href="<?php echo base_url('user-dashboard'); ?>"><i class="fas fa-user"></i>Hello <?php echo $this->session->userdata('u_name'); ?>,</a>
                    </div>
                  <?php
                  }
                  else
                  {
                    ?>
                    <div class="in-sign">
                        <a href="<?php echo base_url('signin'); ?>"><i class="fas fa-user"></i>Sign In</a>
                    </div>
                    <?php
                  }
                  ?>
                    <div class="in-sign border-left">
                        <a href="<?php echo base_url('cart'); ?>"><i class="fas fa-cart-plus"></i>Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container padding2">
    <div class="row align-items-center">
        <div class="col-md-4 col-lg-2">
            <div class="back-home d-flex">
                <div class="go-home">
                    <a href="<?php echo base_url('/'); ?>"><i class="fas fa-long-arrow-alt-left mr-2"></i>Home</a>
                </div>
                <div class="go-home">
                    <a href="#">/  Test Kit</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="container padding">
   <div class="text-center mb-5">
        <h4>About Kit</h4>
        <hr class="green-hr mx-auto">
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">

        <div class="more-box ">
        <div class="more-heading">
                    <h4 class="m-0">DNA Kit Basic</h4>
                </div>
                  <div class="row">
                      <div class="col-md-4">
                        <div class="know-mr-img p-2">
                        <img class="img-fluid" src="<?= base_url('public/home/assets/images/lab-cat.jpg'); ?>"  alt="">
                        </div>
                      </div>
                      <div class="col-md-8">
                   

                <div class="more-content p-3">
                <h6>Description</h6>
                   <p class="m-0 text-muted">
                       
                       Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit accusantium, exercitationem error deserunt voluptates ullam adipisci laborum voluptas. Asperiores doloremque est totam non culpa suscipit rerum sunt tempora dolorum commodi. Ipsam nisi eum cum iste temporibus ratione obcaecati repellat unde?
                   </p>
                </div>
               <div class="p-3">
               <div class="more-button-box  ">
                    <div class="more-price d-flex">
                        <p class="m-0 small mr-2"><del>$55</del></p>
                        <h5 class="clr" >$50</h5>
                    </div>
                    <div class="more-btn">
                        <button>Add To Cart</button>
                    </div>
                </div>
               </div>
                      </div>
                  </div>
        </div>
            <!-- <div class="more-box pb-3">
               
            </div> -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="parameter-box">
                <div class="parameter-heading">
                    <h5 class="m-0">Parameters Details</h5>
                </div>
                <div class="parameter-list">
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('home/footer'); ?>