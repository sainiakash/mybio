<?php $this->load->view('admin/header'); ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php $this->load->view('admin/sidebar');
          ?>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <?php $this->load->view('admin/top-header');
          ?>
        </div>
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-6 col-lg-3 tile_stats_count">
              <div class="dash-box">
                <span class="count_top "><img  src="<?php echo base_url('public/admin/images/test1.png');?>"> </span>
                <div>
                  <h6 class="m-0 mt-2">TOTAL TEST</h6>
                </div>
                <div class="count"><?php echo $test; ?></div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/kit1.png');?>"> </span>
                <div>
                  <h6 class="m-0 mt-2">TOTAL KIT</h6>
                </div>
                <div class="count "><?php echo $kit; ?></div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/database1.png');?>"> </span>
                <div>
                  <h6 class="m-0 mt-2">TOTAL PRODUCT</h6>
                </div>
                <div class="count "><?php echo $product; ?></div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/branch1.png');?>"></span>
                <div>
                  <h6 class="m-0 mt-2">TOTAL BRANCH</h6>
                </div>
                <div class="count"><?php echo $branch; ?></div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/offer1.png');?>"> </span>
                <div>
                  <h6 class="m-0 mt-2">TOTAL COUPON</h6>
                </div>
                <div class="count"><?php echo $coupon; ?></div>
              </div> 
            </div>
            <div class="col-md-6 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top "><img  src="<?php echo base_url('public/admin/images/user.png');?>"> </span>
                <div>
                  <h6 class="m-0 mt-2">TOTAL USER</h6>
                </div>
                <div class="count"><?php echo $user; ?></div>
              </div> 
            </div>
               <div class="col-md-6 col-lg-3   tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/enquiry.png');?>"></span>
                <div>
                  <h6 class="m-0 mt-2">TOTAL ENQUIRY</h6>
                </div>
                <div class="count"><?php echo $enquiry; ?></div>
              </div> 
            </div>
               <div class="col-md-6 col-lg-3 tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/Appoint.png');?>"></span>
                <div>
                  <h6 class="m-0 mt-2">TOTAL APPOINTMENTS</h6>
                </div>
                <div class="count"><?php echo $appointment; ?></div>
              </div> 
            </div>
            <div class="col-md-6 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/orders.png');?>"></span>
                <div>
                  <h6 class="m-0 mt-2">TOTAL ORDERS</h6>
                </div>
                <div class="count"><?php echo $orders; ?></div>
              </div> 
            </div>
            <?php
            $select = $this->db->get('tbl_payments');
            $payment = $select->result_array();

            $subtotal=0;
            $grandtotal=0;

            foreach($payment as $values)
            {
                $subtotal = $values['ps_total_amount'];
                $grandtotal+=$subtotal;
            }
            ?>

            <div class="col-md-6 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/Payment.png');?>"> </span>
                <div>
                  <h6 class="m-0 mt-2">TOTAL PAYMENTS</h6>
                </div>
                <div class="count"><?php echo $grandtotal; ?></div>
              </div> 
            </div>
          </div>
        </div>
          <!-- /top tiles -->
        </div>
         <?php $this->load->view('admin/footer');
          ?>
      </div>
    </div>
