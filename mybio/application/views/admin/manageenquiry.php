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
        <h2>Manage Enquiry
        </h2>
        <div class="clearfix">
        </div>
      </div>
      <div class="well" style="overflow: auto">
        <form method="POST" action="<?php echo base_url('admin/manageenquiry'); ?>">
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
                    <th>First Name
                    </th>
                    <th>Last Name
                    </th>
                    <th>Email
                    </th>
                    <th>Mobile
                    </th>
                    <th>Message
                    </th>
                    <th>Date & Time
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
                  foreach($enquiry as $values)
                  {
                  ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                      <?php echo $values['uq_first_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['uq_last_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['uq_email']; ?>
                    </td>
                    <td>
                      <?php echo $values['uq_mobile']; ?>
                    </td>
                    <td>
                    <?php echo "<pre>" . wordwrap($values['uq_message'], 40) . "</pre>"; ?>
                  </td>
                  <td>
                    <?php echo $values['uq_created_at']; ?>
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
                  foreach($enquiry as $values)
                  {
                  ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                      <?php echo $values['uq_kr_first_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['uq_kr_last_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['uq_kr_email']; ?>
                    </td>
                    <td>
                      <?php echo $values['uq_kr_mobile']; ?>
                    </td>
                    <td>
                    <?php echo "<pre>" . wordwrap($values['uq_kr_message'], 40) . "</pre>"; ?>
                  </td>
                  <td>
                    <?php echo $values['uq_kr_created_at']; ?>
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