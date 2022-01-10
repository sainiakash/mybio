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
      <span aria-hidden="true">&times;</span>
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
      <span aria-hidden="true">&times;</span>
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
        <h2>Manage Coupon</h2>
        <div class="clearfix"></div>
      </div>
      <div class="well" style="overflow: auto">
        <form method="POST" action="<?php echo base_url('admin/managecoupon'); ?>">
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
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Coupon Code</th>
                    <th>Coupon Type</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>Expiry Date</th>
                    <th>Language</th>
                    <th>Status</th>
                    <th>Date & Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                if(set_value('language')=='EN' || set_value('language')=='')
                {
                ?>
                <tbody>
                  <?php
                  $count=1;
                  foreach($coupon as $values)
                  {
                  ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $values['co_name']; ?></td>
                    <td><?php echo $values['co_code']; ?></td>
                    <td><?php echo $values['co_coupon_type']; ?></td>
                    <td><?php echo "<pre>" . wordwrap($values['co_description'], 40) . "</pre>"; ?></td>
                    <td><?php echo $values['co_start_date']; ?></td>
                    <td><?php echo $values['co_expiry_date']; ?></td>
                    <td><?php echo $values['co_language']; ?></td>
                    <td>
                      <?php
                      if($values['co_status']==2)
                      {
                      ?>
                      <h4><span class="badge badge-danger">Inactive</span></h4>
                      <?php
                      }
                      elseif($values['co_status']==1)
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
                    <td><?php echo $values['co_created_at']; ?></td>
                    <td>
                      <?php
                      if($values['co_status']==2)
                      {
                      ?>
                      <a title="Active" class="btn btn-success" href="<?php echo base_url('active/').$values['co_id'].'/Coupon/'.$values['co_language']; ?>"><i class="fa fa-pause"></i></a>
                      <?php
                      }
                      elseif($values['co_status']==1)
                      {
                      ?>
                      <a title="Inactive" class="btn btn-warning" href="<?php echo base_url('inactive/').$values['co_id'].'/Coupon/'.$values['co_language']; ?>"><i class="fa fa-play"></i></a>
                      <?php
                      }
                      else
                      {
                      echo "";
                      }
                      ?>
                      <a title="Edit Coupon" class="btn btn-info" href="<?php echo base_url('editcoupon/').$values['co_id'].'/'.$values['co_language']; ?>"><i class="fa fa-edit"></i></a>
                      <a title="Delete Coupon" class="btn btn-danger" href="<?php echo base_url('deletecoupon/').$values['co_id'].'/'.$values['co_language']; ?>" onclick="return msg();"><i class="fa fa-trash"></i></a>
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
                  foreach($coupon as $values)
                  {
                  ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $values['co_kr_name']; ?></td>
                    <td><?php echo $values['co_kr_code']; ?></td>
                    <td><?php echo $values['co_kr_coupon_type']; ?></td>
                    <td><?php echo "<pre>" . wordwrap($values['co_kr_description'], 40) . "</pre>"; ?></td>
                    <td><?php echo $values['co_kr_start_date']; ?></td>
                    <td><?php echo $values['co_kr_expiry_date']; ?></td>
                    <td><?php echo $values['co_kr_language']; ?></td>
                    <td>
                      <?php
                      if($values['co_kr_status']==2)
                      {
                      ?>
                      <h4><span class="badge badge-danger">Inactive</span></h4>
                      <?php
                      }
                      elseif($values['co_kr_status']==1)
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
                    <td><?php echo $values['co_kr_created_at']; ?></td>
                    <td>
                      <?php
                      if($values['co_kr_status']==2)
                      {
                      ?>
                      <a title="Active" class="btn btn-success" href="<?php echo base_url('active/').$values['co_kr_id'].'/Coupon/'.$values['co_kr_language']; ?>"><i class="fa fa-pause"></i></a>
                      <?php
                      }
                      elseif($values['co_kr_status']==1)
                      {
                      ?>
                      <a title="Inactive" class="btn btn-warning" href="<?php echo base_url('inactive/').$values['co_kr_id'].'/Coupon/'.$values['co_kr_language']; ?>"><i class="fa fa-play"></i></a>
                      <?php
                      }
                      else
                      {
                      echo "";
                      }
                      ?>
                      <a title="Edit Coupon" class="btn btn-info" href="<?php echo base_url('editcoupon/').$values['co_kr_id'].'/'.$values['co_kr_language']; ?>"><i class="fa fa-edit"></i></a>
                      <a title="Delete Coupon" class="btn btn-danger" href="<?php echo base_url('deletecoupon/').$values['co_kr_id'].'/'.$values['co_kr_language']; ?>" onclick="return msg();"><i class="fa fa-trash"></i></a>
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