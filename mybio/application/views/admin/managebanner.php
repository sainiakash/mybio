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
        <h2>Manage Banner
        </h2>
        <div class="clearfix">
        </div>
      </div>
      <div class="well" style="overflow: auto">
        <form method="POST" action="<?php echo base_url('managebanner'); ?>">
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
                    <th>Name
                    </th>
                    <th>Order
                    </th>
                    <th>Image
                    </th>
                    <th>Type
                    </th>
                    <th>Language
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
                if(set_value('language')=='EN' || set_value('language')=='')
                {
                ?>
                <tbody>
                  <?php
                  $count=1;
                  foreach($banner as $values)
                  {
                  ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                      <?php echo $values['b_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['b_order']; ?>
                    </td>
                    <td>
                      <?php
                      if(!empty($values['b_image']))
                      {
                      ?>
                      <a href="<?php echo base_url('public/banner/').$values['b_image']; ?>" target="_blank">View
                      </a>
                      <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo $values['b_type']; ?>
                    </td>
                    <td>
                      <?php echo $values['b_language']; ?>
                    </td>
                    <td>
                      <?php
                      if($values['b_status']==2)
                      { 
                      ?>
                      <h4>
                        <span class="badge badge-danger">Inactive
                        </span>
                      </h4>
                      <?php
                      }
                      elseif($values['b_status']==1)
                      {
                      ?>
                      <h4>
                        <span class="badge badge-success">Active
                        </span>
                      </h4>
                      <?php
                      }
                      else
                      { 
                      echo "";
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo $values['b_created_at']; ?>
                    </td>
                    <td>
                      <?php
                      if($values['b_status']==2)
                      {
                      ?>
                      <a title="Active" class="btn btn-success" href="<?php echo base_url('active/').$values['b_id'].'/Banner/'.$values['b_language']; ?>">
                        <i class="fa fa-pause">
                        </i>
                      </a>
                      <?php
                      }
                      elseif($values['b_status']==1)
                      {
                      ?>
                      <a title="Inactive" class="btn btn-warning" href="<?php echo base_url('inactive/').$values['b_id'].'/Banner/'.$values['b_language']; ?>">
                        <i class="fa fa-play">
                        </i>
                      </a>
                      <?php
                      }
                      else
                      {
                      echo "";
                      }
                      ?>
                      <a title="Edit" class="btn btn-info" href="<?php echo base_url('editbanner/').$values['b_id'].'/'.$values['b_language']; ?>">
                        <i class="fa fa-edit">
                        </i>
                      </a>
                      <a title="Delete" class="btn btn-danger" href="<?php echo base_url('deletebanner/').$values['b_id'].'/'.$values['b_language']; ?>" onclick="return msg();">
                        <i class="fa fa-trash">
                        </i>
                      </a>
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
                  foreach($banner as $values)
                  {
                  ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                      <?php echo $values['b_kr_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['b_kr_order']; ?>
                    </td>
                    <td>
                      <?php
                      if(!empty($values['b_kr_image']))
                      {
                      ?>
                      <a href="<?php echo base_url('public/banner/').$values['b_kr_image']; ?>" target="_blank">View
                      </a>
                      <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo $values['b_kr_type']; ?>
                    </td>
                    <td>
                      <?php echo $values['b_kr_language']; ?>
                    </td>
                    <td>
                      <?php
                      if($values['b_kr_status']==2)
                      { 
                      ?>
                      <h4>
                        <span class="badge badge-danger">Inactive
                        </span>
                      </h4>
                      <?php
                      }
                      elseif($values['b_kr_status']==1)
                      {
                      ?>
                      <h4>
                        <span class="badge badge-success">Active
                        </span>
                      </h4>
                      <?php
                      }
                      else
                      { 
                      echo "";
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo $values['b_kr_created_at']; ?>
                    </td>
                    <td>
                      <?php
                      if($values['b_kr_status']==2)
                      {
                      ?>
                      <a title="Active" class="btn btn-success" href="<?php echo base_url('active/').$values['b_kr_id'].'/Banner/'.$values['b_kr_language']; ?>">
                        <i class="fa fa-pause">
                        </i>
                      </a>
                      <?php
                      }
                      elseif($values['b_kr_status']==1)
                      {
                      ?>
                      <a title="Inactive" class="btn btn-warning" href="<?php echo base_url('inactive/').$values['b_kr_id'].'/Banner/'.$values['b_kr_language']; ?>">
                        <i class="fa fa-play">
                        </i>
                      </a>
                      <?php
                      }
                      else
                      {
                      echo "";
                      }
                      ?>
                      <a title="Edit" class="btn btn-info" href="<?php echo base_url('editbanner/').$values['b_kr_id'].'/'.$values['b_kr_language']; ?>">
                        <i class="fa fa-edit">
                        </i>
                      </a>
                      <a title="Delete" class="btn btn-danger" href="<?php echo base_url('deletebanner/').$values['b_kr_id'].'/'.$values['b_kr_language']; ?>" onclick="return msg();">
                        <i class="fa fa-trash">
                        </i>
                      </a>
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
<?php $this->load->view('admin/footer-include'); ?>
<script type="text/javascript">
  function msg()
  {
    return confirm('Are you sure you want to delete ?');
  }
</script>
