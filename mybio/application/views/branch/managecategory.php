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
        <h2>Category
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li>
            <a class="collapse-link">
              <i class="fa fa-chevron-up">
              </i>
            </a>
          </li>
          <li>
            <a class="close-link">
              <i class="fa fa-close">
              </i>
            </a>
          </li>
        </ul>
        <div class="clearfix">
        </div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>S.No
                    </th>
                    <th>Name
                    </th>
                    <th>Type
                    </th>
                    <th>Image
                    </th>
                    <th>Order
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
                  foreach($category as $values)
                  {
                  ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                      <?php echo $values['c_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['c_type']; ?>
                    </td>
                    <td>
                      <?php
                      if(!empty($values['c_image']))
                      {
                      ?>
                      <a href="<?php echo base_url('public/category/').$values['c_image']; ?>" target="_blank">View</a>
                      <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo $values['c_order']; ?>
                    </td>
                    <td><?php echo $values['c_language']; ?></td>
                    <td>
                    <?php
                    if($values['c_status']==2)
                    { 
                    ?>
                      <h4><span class="badge badge-danger">Inactive</span></h4>
                    <?php
                    }
                    elseif($values['c_status']==1)
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
                      <?php echo $values['c_created_at']; ?>
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
<?php $this->load->view('branch/footer-include'); ?>
<script type="text/javascript">
  function msg()
  {
    return confirm('Are you sure you want to delete ?');
  }
</script>
