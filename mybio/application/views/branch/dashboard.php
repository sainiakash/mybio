<?php $this->load->view('branch/header'); ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php $this->load->view('branch/sidebar');
          ?>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <?php $this->load->view('branch/top-header');
          ?>
        </div>
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row d-inline" >
          <div class="tile_count">
             <div class="col-md-3 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/test1.png');?>"> </span>
                <div>
                  <h4 class="m-0 mt-2">Total Test</h4>
                </div>
                <div class="count"><?php echo $test; ?></div>
              </div>
            </div>
             <div class="col-md-3 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/kit1.png');?>"> </span>
                <div>
                  <h4 class="m-0 mt-2">Total Kit</h4>
                </div>
                <div class="count"><?php echo $kit; ?></div>
              </div>
            </div>
             <div class="col-md-3 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/database1.png');?>"></span>
                <div>
                  <h4 class="m-0 mt-2">Total Product</h4>
                </div>
                <div class="count"><?php echo $product; ?></div>
              </div>
            </div>
            <div class="col-md-3 col-lg-3 tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img src="<?php echo base_url('public/admin/images/user.png'); ?>"></span>
                <div>
                  <h4 class="m-0 mt-2">Total Staff</h4>
                </div>
                <div class="count"><?php echo $staff; ?></div>
              </div>
            </div>
            <div class="col-md-3 col-lg-3 tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><i class="fa fa-calendar" style="font-size: 40px;"></i> </span>
                <div>
                  <h4 class="m-0 mt-2">Total Time Slot</h4>
                </div>
                <div class="count "><?php echo $timeslot; ?></div>
              </div>
            </div>
            <div class="col-md-3 col-lg-3 tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><i class="fas fa-ticket-alt" style="font-size: 40px;"></i> </span>
                <div>
                  <h4 class="m-0 mt-2">Total Ticket</h4>
                </div>
                <div class="count "><?php echo $ticket; ?></div>
              </div>
            </div>
            <div class="col-md-3 col-lg-3 tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img src="<?php echo base_url('public/admin/images/user.png'); ?>"></span>
                <div>
                  <h4 class="m-0 mt-2">Total User</h4>
                </div>
                <div class="count"><?php echo $user; ?></div>
              </div>
            </div>
          </div>
        </div>

        </div>
         <?php $this->load->view('branch/footer');
          ?>
      </div>
    </div>