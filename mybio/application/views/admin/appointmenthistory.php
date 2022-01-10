<?php $this->load->view('admin/header-include'); ?>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
      <?php
      if(!empty($this->session->flashdata('danger')))
      {
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('danger'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>
      <?php
      }
      elseif(!empty($this->session->flashdata('success')))
      {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>
      <?php
      }
      else
      {
      echo "";
      }
      ?>
    <div class="x_panel">
      <div class="x_title">
        <h2>Appointment History
        </h2>
        <div class="clearfix">
        </div>
      </div>
      <div class="well" style="overflow: auto">
        <form method="POST" action="<?php echo base_url('appointment-history'); ?>">
          <div class="col-md-3"></div>
          <div class="col-md-4">
            <label>Language
            </label>
            <select class="form-control" name="language">
              <?php
              if(set_value('language'))
              {
              ?>
              <option value="<?php echo set_value('language'); ?>" selected><?php echo set_value('language'); ?></option>
              <?php
              }
              else
              {
              ?>
              <option value="" selected disabled>Choose Language</option>
              <?php
              }
              ?>
              <option value="EN">EN</option>
              <option value="KR">KR</option>
            </select>
            <div class="text text-danger"><?php echo form_error('language'); ?></div>
          </div>
          <div class="col-md-3">
            <input type="submit" class="btn btn-success" name="search" value="Search" style="margin-top:25px;">
          </div>
          <div class="col-md-2"></div>
        </form>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
                <thead>
                  <tr>
                    <th>S.No
                    </th>
                    <th>User Name
                    </th>
                    <th>Order Id
                    </th>
                    <th>Lab Name
                    </th>
                    <th>Test Name
                    </th>
                    <th>Appointment Date & Time
                    </th>
                    <th>Payment Mode
                    </th>
                    <th>Payable Amount
                    </th>
                    <th>Status
                    </th>
                    <th>Created At
                    </th>
                    <th>Updated At
                    </th>
                    <th>Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $count=1;
                  foreach($appointment as $values)
                  {
                    $status = $values['ap_status'];
                  ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                      <?php echo $values['u_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['ap_order_id']; ?>
                    </td>
                    <td>
                      <?php echo $values['b_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['t_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['ap_date_time']; ?>
                    </td>
                    <td>
                      <?php echo $values['ap_payment_mode']; ?>
                    </td>
                    <td>
                      <?php echo $values['ap_payable_amount']; ?>
                    </td>
                    <td>
                    <?php
                    if($status == '1')
                    {
                    ?>
                      <h4><span class="badge badge-success">Confirm</span></h4>
                      <?php
                    }
                    elseif($status == '2')
                    {
                    ?>
                      <h4><span class="badge badge-danger">Processing</span></h4>
                    <?php
                    }
                    elseif($status == '3') 
                    {
                    ?>
                      <h4><span class="badge badge-primary">Cancel/Failed</span></h4>
                    <?php
                    }
                     elseif($status == '0') 
                    {
                    ?>
                      <h4><span class="badge badge-primary">Pending</span></h4>
                    <?php
                    }
                    else
                    {
                      echo "";
                    }
                    ?>
                    </td>
                    <td>
                      <?php echo $values['ap_created_at']; ?>
                    </td>
                     <td>
                      <?php echo $values['ap_updated_at']; ?>
                    </td>
                    <td>
                      <a title="View Appointment" class="btn btn-secondary" href="<?php echo base_url('view-appointment/').$values['ap_id']; ?>">
                        <i class="fa fa-eye">
                        </i>
                      </a>
                    </td> 
                  </tr>
                  <?php
                  $count++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function msg()
  {
    return confirm('Are you sure you want to delete ?');
  }
</script>
<?php $this->load->view('admin/footer-include'); ?>
