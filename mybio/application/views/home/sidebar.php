 <div class="col-md-6 col-lg-4 mb-3">
   <h4 class="text-left">My Page
          </h4>
          <hr class="green-hr">
          <div class="box1">
             <div class="box1-list">
              <a href="<?php echo base_url('user-dashboard'); ?>" >
                <span class="fas fa-house">
                </span>
                <p class="m-0"> MY PAGE
                </p>
                <i  class="fas fa-chevron-right " >
                </i>
              </a>
              </div>
            <div class="box1-list">
              <a href="<?php echo base_url('user-edit-profile/').$this->session->userdata('u_id'); ?>" >
                <span class="fas fa-user-alt">
                </span>
                <p class="m-0"> MY PROFILE
                </p>
                <i  class="fas fa-chevron-right " >
                </i>
              </a>
              </div>
              <div class="box1-list">
              <a href="<?php echo base_url('user-change-password/').$this->session->userdata('u_id');; ?>">
                <span class="fas fa-unlock">
                </span>
                <p class="m-0"> CHANGE PASSWORD
                </p>
                <i class="fas fa-chevron-right">
                </i>
              </a>
            </div>
              <div class="box1-list">
              <a href="<?php echo base_url('user-create-verification-code/').$this->session->userdata('u_id');; ?>">
                <span  class="fab fa-codiepie">
                </span>
                <p class="m-0"> CREATE VERIFICATION CODE 
                </p>
                <i class="fas fa-chevron-right">
                </i>
              </a>
            </div>
              <div class="box1-list">
              <a href="<?php echo base_url('user-change-verification-code/').$this->session->userdata('u_id');; ?>">
                <span  class="fas fa-money-check">
                </span>
                <p class="m-0"> CHANGE VERIFICATION CODE
                </p>
                <i class="fas fa-chevron-right">
                </i>
              </a>
            </div>
            <div class="box1-list">
              <a href="<?php echo base_url('appointment'); ?>">
                <span class="fas fa-calendar-check">
                </span>
                <p class="m-0"> MY APPOINTMENT
                </p>
                <i class="fas fa-chevron-right">
                </i>
              </a>
            </div>
            <div class="box1-list">
              <a href="<?php echo base_url('user-order-history'); ?>">
                <span class="fas fa-shopping-bag">
                </span>
                <p class="m-0">ORDER HISTORY
                </p>
                <i class="fas fa-chevron-right">
                </i>
              </a>
            </div>
            <div class="box1-list">
              <a href="<?php echo base_url('plan'); ?>">
                <span class="fas fa-credit-card">
                </span>
                <p class="m-0">SUBSCRIPTION
                </p>
                <i class="fas fa-chevron-right">
                </i>
              </a>
            </div>
            <div class="box1-list">
              <a href="<?php echo base_url('cart'); ?>">
                <span class="fas fa-cart-plus">
                </span>
                <p class="m-0">CART
                </p>
                <i class="fas fa-chevron-right">
                </i>
              </a>
            </div>
            <div class="box1-list">
              <a href="<?php echo base_url('user-reward'); ?>">
                <span class="fas fa-award">
                </span>
                <p class="m-0">REWARD POINTS
                </p>
                <i class="fas fa-chevron-right">
                </i>
              </a>
            </div>
            <div class="sign-out-btn text-center">
              <a href="<?php echo base_url('user-logout'); ?>"><button> Sign Out <span class="fas fa-sign-out-alt pl-2">
                </span></button></a>
            </div>
          </div>
        </div>