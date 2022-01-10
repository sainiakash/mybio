<?php $this->load->view('branch/header-include'); ?>
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
        <h2>User
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
                    <th>User Code
                    </th>
                    <th>Name
                    </th>
                    <th>Email
                    </th>
                    <th>Password
                    </th>
                    <th>Mobile
                    </th>
                    <th>Gender
                    </th>
                    <th>DOB
                    </th>
                    <th>Profile Image
                    </th>
                    <th>Address
                    </th>
                    <th>Type
                    </th>
                    <th>Language
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
                  foreach($user as $values)
                  {
                  ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                      <?php echo $values['u_user_code']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_email']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_decrypt_password']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_mobile']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_gender']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_dob']; ?>
                    </td>
                    <td>
                      <?php
                      if($values['u_image']!='')
                      {
                      ?>
                      <a href="<?php echo base_url('public/user/').$values['u_image']; ?>" target="_blank">View
                      </a>
                      <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo "<pre>" . wordwrap($values['u_address'], 40) . "</pre>"; ?>
                    </td>
                    <td>
                      <?php echo $values['u_type']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_language']; ?>
                    </td>
                    <td>
                    <?php
                    if($values['u_status']==2)
                    { 
                    ?>
                      <h4><span class="badge badge-danger">Inactive</span></h4>
                    <?php
                    }
                    elseif($values['u_status']==1)
                    {
                    ?>
                      <h4><span class="badge badge-success">Active</span></h4>
                    <?php
                    }
                    else
                    { 
                      echo "";
                    }
                    ?>
                    </td>
                    <td>
                      <?php echo $values['u_created_at']; ?>
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
<?php $this->load->view('branch/footer-include'); ?>
