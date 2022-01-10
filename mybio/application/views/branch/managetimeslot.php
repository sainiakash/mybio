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
        <h2>Manage Time Slot</h2>
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
                <th>Start day & Time</th>
                <th>End day & Time</th>
                <th>Status</th>
                <th>Language</th>
                <th>Date & Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count=1;
              foreach($timeslot as $values)
              {
              ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $values['ts_start_day'].'-'.$values['ts_start_time']; ?> </td>
                <td><?php echo $values['ts_end_day'].'-'.$values['ts_end_time']; ?></td>
                <td>
                <?php
                if($values['ts_status']==2)
                { 
                ?>
                  <h4><span class="badge badge-danger">Inactive</span></h4>
                <?php
                }
                elseif($values['ts_status']==1)
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
                <td><?php echo $values['ts_language']?></td>
                <td><?php echo $values['ts_created_at']; ?></td>
                <td>
                  <?php
                  if($values['ts_status']==2)
                  {
                  ?>
                    <a title="Active" class="btn btn-success" href="<?php echo base_url('branch-active/').$values['ts_id'].'/Timeslot'; ?>"><i class="fa fa-pause"></i></a>
                  <?php
                  }
                  elseif($values['ts_status']==1)
                  {
                  ?>
                    <a title="Inactive" class="btn btn-warning" href="<?php echo base_url('branch-inactive/').$values['ts_id'].'/Timeslot'; ?>"><i class="fa fa-play"></i></a>
                  <?php
                  }
                  else
                  {
                    echo "";
                  }
                  ?> 
                  <a title="Edit Timeslot" class="btn btn-info" href="<?php echo base_url('branch-edit-timeslot/').$values['ts_id']; ?>"><i class="fa fa-edit"></i></a>
                  <a title="Delete Timeslot" class="btn btn-danger" href="<?php echo base_url('branch-delete-timeslot/').$values['ts_id']; ?>" onclick="return msg();"><i class="fa fa-trash"></i></a>
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