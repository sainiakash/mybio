<?php $this->load->view('branch/header'); ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php $this->load->view('krbranch/sidebar');
          ?>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <?php $this->load->view('krbranch/top-header');
          ?>
        </div>
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row d-inline" >
          <div class="tile_count">
            <div class="col-md-3 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><i class="fa fa-users" style="font-size: 40px;"></i> </span>
                <div>
                  <h4 class="m-0 mt-2">총 직원</h4>
                </div>
                <div class="count"><?php echo $staff; ?></div>
              </div>
            </div>
            <div class="col-md-3 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><i class="fa fa-calendar" style="font-size: 40px;"></i> </span>
                <div>
                  <h4 class="m-0 mt-2">총 시간 슬롯</h4>
                </div>
                <div class="count "><?php echo $timeslot; ?></div>
              </div>
            </div>
            <div class="col-md-3 col-lg-3  tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><i class="fas fa-ticket-alt" style="font-size: 40px;"></i> </span>
                <div>
                  <h4 class="m-0 mt-2">총 티켓</h4>
                </div>
                <div class="count "><?php echo $ticket; ?></div>
              </div>
            </div>
            <div class="col-md-3 col-lg-3 tile_stats_count">
              <div class="dash-box">
                <span class="count_top"><img  src="<?php echo base_url('public/admin/images/user.png'); ?>"> </span>
                <div>
                  <h4 class="m-0 mt-2">총 사용자</h4>
                </div>
                <div class="count"><?php echo $user; ?></div>
              </div>
            </div>
          </div>
        </div>

        </div>
         <?php $this->load->view('krbranch/footer');
          ?>
      </div>
    </div>