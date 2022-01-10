<?php $this->load->view('admin/header-include'); ?>
<div class="container mt-5">
<div class="row ">
  <div class="col-md-12 col-lg-12 col-sm-12">
    <div class="appointment-box">
      <div class="appointment-main-heading">
        <h5 class="m-0">Appointment History Details</h5>
       
      </div>

      <div class="row p-3">
        <!-- USER Details -->
        <div class="col-md-12 col-lg-6 mb-4">
          <div class="boxes">
            <div class="boxes-heading">
              <h6 class="m-0">User Details</h6>

            </div>
            <div class="box-list-box">
            <div class="box-list">
              <div><strong>User Name</strong></div>
              <div><p class="m-0"><?php echo $appointment->u_name; ?></p></div>
            </div>
            <div class="box-list">
              <div><strong>User Email</strong></div>
              <div><p class="m-0"><?php echo $appointment->u_email; ?></p></div>
            </div>
            <div class="box-list">
              <div><strong>User Mobile</strong></div>
              <div><p class="m-0"><?php echo $appointment->u_mobile; ?></p></div>
            </div>
            <div class="box-list">
              <div><strong>User Address</strong></div>
              <div><p class="m-0"><?php echo $appointment->u_address; ?></p></div>
            </div>
            </div>
            
          </div>
        </div>

          <!-- APPOINTMENT HISTORY -->
        <div class="col-md-12 col-lg-6 ">
          <div class="boxes">
            <div class="boxes-heading">
              <h6 class="m-0">Appointment History</h6>

            </div>
            <div class="box-list-box">
            <div class="box-list">
              <div><strong>Lab Name</strong></div>
              <div><p class="m-0"><?php echo $appointment->b_name; ?></p></div>
            </div>
            <div class="box-list">
              <div><strong>Test Category</strong></div>
              <div><p class="m-0"><?php echo $appointment->c_name; ?></p></div>
            </div>
            <div class="box-list">
              <div><strong>Test</strong></div>
              <div><p class="m-0"><?php echo $appointment->t_name; ?> </p></div>
            </div>
            <div class="box-list">
              <div><strong>Date And Time</strong></div>
              <div><p class="m-0"><?php echo $appointment->ap_date_time; ?></p></div>
            </div>
            </div>
            
          </div>
        </div>

        <!-- ORDER HISTORY -->
        <div class="col-md-12  col-lg-6 ">
          <div class="boxes">
            <div class="boxes-heading">
              <h6 class="m-0">Order History</h6>

            </div>
            <div class="box-list-box">
            <div class="box-list">
              <div><strong>Order ID</strong></div>
              <div><p class="m-0"> <?php echo $appointment->ap_order_id; ?></p></div>
            </div>
            <div class="box-list">
              <div><strong>Payment Status</strong></div>
              <div><p class="m-0"><?php echo $appointment->ap_payment_mode; ?></p></div>
            </div>
            <div class="box-list">
              <div><strong>Payable Amount</strong></div>
              <div><p class="m-0"><?php echo $appointment->ap_payable_amount; ?> </p></div>
            </div>
          
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<!-- /page content -->
<?php $this->load->view('admin/footer-include'); ?>