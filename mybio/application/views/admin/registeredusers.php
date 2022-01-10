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
        <h2>Registered User
        </h2>
        <div class="clearfix">
        </div>
      </div>
      <div class="well" style="overflow: auto">
        <form method="POST" action="<?php echo base_url('registereduser'); ?>">
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
                    <th>Token
                    </th>
                    <th>Status
                    </th>
                    <th>Date & Time
                    </th>
                    <th>Action
                    </th>
                  </tr>
                </thead>
                <?php
                if(set_value('language')=='EN')
                {
                ?>
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
                      <?php echo "<pre>" . wordwrap($values['u_street_address'].','.$values['u_city'].','.$values['u_state'].','.$values['u_postalcode'].','.$values['u_country'], 40) . "</pre>"; ?>
                    </td>
                    <td>
                      <?php echo $values['u_type']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_language']; ?>
                    </td>
                    <td>
                      <?php echo "<pre>" . wordwrap($values['u_token'], 40) . "</pre>"; ?>
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
                    <td>
                       <a title="View Product" class="btn btn-secondary" href="<?php echo base_url('viewuser/').$values['u_id']; ?>"><i class="fa fa-eye"></i></a>
                    <?php
                    if($values['u_status']==2)
                    {
                    ?>
                      <a title="Active" class="btn btn-success" href="<?php echo base_url('active/').$values['u_id'].'/User/'.$values['u_language']; ?>"><i class="fa fa-pause"></i></a>
                    <?php
                    }
                    elseif($values['u_status']==1)
                    {
                    ?>
                      <a title="Inactive" class="btn btn-warning" href="<?php echo base_url('inactive/').$values['u_id'].'/User/'.$values['u_language']; ?>"><i class="fa fa-play"></i></a>
                    <?php
                    }
                    else
                    {
                      echo "";
                    }
                    ?> 
                    </td>
                  </tr>
                  <?php
                  $count++;
                  }
                  ?>
                </tbody>
                <?php
                }
                elseif(set_value('language')=='KR')
                {
                ?>
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
                      <?php echo $values['u_kr_user_code']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_kr_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_kr_email']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_kr_decrypt_password']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_kr_mobile']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_kr_gender']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_kr_dob']; ?>
                    </td>
                    <td>
                      <?php
                      if($values['u_kr_image']!='')
                      {
                      ?>
                      <a href="<?php echo base_url('public/user/').$values['u_kr_image']; ?>" target="_blank">View
                      </a>
                      <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo "<pre>" . wordwrap($values['u_kr_street_address'].','.$values['u_kr_city'].','.$values['u_kr_state'].','.$values['u_kr_postalcode'].','.$values['u_kr_country'], 40) . "</pre>"; ?>
                    </td>
                    <td>
                      <?php echo $values['u_kr_type']; ?>
                    </td>
                    <td>
                      <?php echo $values['u_kr_language']; ?>
                    </td>
                    <td>
                      <?php echo "<pre>" . wordwrap($values['u_kr_token'], 40) . "</pre>"; ?>
                    </td>
                    <td>
                    <?php
                    if($values['u_kr_status']==2)
                    { 
                    ?>
                      <h4><span class="badge badge-danger">Inactive</span></h4>
                    <?php
                    }
                    elseif($values['u_kr_status']==1)
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
                      <?php echo $values['u_kr_created_at']; ?>
                    </td>
                    <td>
                       <a title="View Product" class="btn btn-secondary" href="<?php echo base_url('viewuser/').$values['u_kr_id']; ?>"><i class="fa fa-eye"></i></a>
                    <?php
                    if($values['u_kr_status']==2)
                    {
                    ?>
                      <a title="Active" class="btn btn-success" href="<?php echo base_url('active/').$values['u_kr_id'].'/User/'.$values['u_kr_language']; ?>"><i class="fa fa-pause"></i></a>
                    <?php
                    }
                    elseif($values['u_kr_status']==1)
                    {
                    ?>
                      <a title="Inactive" class="btn btn-warning" href="<?php echo base_url('inactive/').$values['u_kr_id'].'/User/'.$values['u_kr_language']; ?>"><i class="fa fa-play"></i></a>
                    <?php
                    }
                    else
                    {
                      echo "";
                    }
                    ?> 
                    </td>
                  </tr>
                  <?php
                  $count++;
                  }
                  ?>
                </tbody>
                <?php
                }
                else
                {
                  echo "";
                }
                ?>
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
