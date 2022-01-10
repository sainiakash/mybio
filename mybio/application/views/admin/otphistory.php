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
        <h2>OTP History
        </h2>
        <div class="clearfix">
        </div>
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
                    <th>Mobile Number
                    </th>
                    <th>OTP
                    </th>
                    <th>Source
                    </th>
                    <th>Type
                    </th>
                    <th>Status
                    </th>
                    <th>Date & Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $count=1;
                  foreach($otp as $values)
                  {
                    $status = $values['o_status'];
                  ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                      <?php echo $values['u_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['o_mobile_number']; ?>
                    </td>
                    <td>
                      <?php echo $values['o_otp']; ?>
                    </td>
                    <td>
                      <?php echo $values['o_source']; ?>
                    </td>
                    <td>
                      <?php echo $values['o_type']; ?>
                    </td>
                    <td>
                      <?php
                      if($status==1)
                      {
                        ?>
                         <h4><span class="badge badge-success">Verified</span></h4>
                        <?php
                      }
                      elseif($status==0)
                      {
                        ?>
                         <h4><span class="badge badge-danger">Not Verified</span></h4>
                        <?php
                      }
                      else
                      {
                        echo "";
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo $values['o_created_at']; ?>
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
<?php $this->load->view('admin/footer-include'); ?>
