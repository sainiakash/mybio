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
        <h2>Product</h2>
    <div class="clearfix"></div>
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
                <th>Category</th>
                <th>Sku Code</th>
                <th>Price</th>
                <th>Description</th>
                <th>Mrp</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Slug</th>
                <th>Expiry date</th>
                <th>Language</th>
                <th>Status</th>
                <th>Date & Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count=1;
              foreach($product as $values)
              {
              ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo "<pre>" . wordwrap($values['p_name'], 40) . "</pre>"; ?></td>
                <td><?php echo $values['c_name']; ?></td>
                <td><?php echo $values['p_sku_code']; ?></td>
                <td><?php echo "$", $values['p_price']; ?></td>
                <td><?php echo "<pre>" . wordwrap($values['p_description'], 40) . "</pre>"; ?></td>
                <td><?php echo "$", $values['p_mrp']; ?></td>
                <td>
                  <?php
                  if(!empty($values['p_image']))
                  {
                  ?>
                  <a href="<?php echo base_url('public/product/').$values['p_image']; ?>" target="_blank">View</a>
                  <?php
                  }
                  ?>
                </td>
                <td><?php echo $values['p_quantity']; ?></td>
                <td><?php echo $values['p_slug']; ?></td>
                <td><?php echo $values['p_expiry_date']; ?></td>
                <td><?php echo $values['p_language']; ?></td>
                <td>
                <?php
                if($values['p_status']==2)
                { 
                ?>
                  <h4><span class="badge badge-danger">Inactive</span></h4>
                <?php
                }
                elseif($values['p_status']==1)
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
                <td><?php echo $values['p_created_at']; ?></td>
                <td> <a title="View Product" class="btn btn-secondary" href="<?php echo base_url('branch-view-product/').$values['p_id']; ?>"><i class="fa fa-eye"></i></a></td>
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