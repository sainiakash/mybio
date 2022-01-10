<?php $this->load->view('admin/header-include'); ?> 
<!-- page content -->
<div class="" role="main">
  <div class="">
    <div class="clearfix">
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
            <section class="content invoice">
              <!-- title row -->
              <div class="row">
                <div class="  invoice-header">
                </div>
                <div style="margin-left: 369px; margin-bottom:42px;">
                  <h5>
                    <b>Lab Payment Collection
                    </b>
                  </h5>
                </div>
                <!-- /.col -->
              </div>
              <br/>
              <div class="well" style="overflow: auto">
                <form method="POST" action="<?php echo base_url('payment/Lab'); ?>">
                  <div class="col-md-4">
                    <label>Lab
                    </label>
                    <select class="form-control" name="lab">
                      <option value="" selected disabled>Choose Lab</option>
                      <?php
                      foreach($branch as $values)
                      {
                        ?> 
                        <option value="<?php echo $values['b_id']; ?>"><?php echo $values['b_name']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                    <div class="text text-danger"><?php echo form_error('search'); ?></div>
                  </div>
                  <div class="col-md-3">
                    <label>From Date
                    </label>
                    <input type="date" class="form-control" name="from_date" value="<?php echo set_value('from_date'); ?>">
                    <div class="text text-danger"><?php echo form_error('from_date'); ?></div>
                  </div>
                  <div class="col-md-3">
                    <label>To Date
                    </label>
                    <input type="date" class="form-control" name="to_date" value="<?php echo set_value('to_date'); ?>">
                    <div class="text text-danger"><?php echo form_error('to_date'); ?></div>
                  </div>
                  <div class="col-md-2">
                    <input type="submit" class="btn btn-success" name="search" value="Search" style="margin-top: 25px;">
                  </div>
                </form>
              </div>
              <div class="row">
                <div class="  table">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>S.NO
                        </th>
                        <th>Order Id
                        </th>
                        <th>User Name
                        </th>
                        <th>Lab Name
                        </th>
                        <th>Amount
                        </th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count=1;
                        foreach($payment as $values)
                        {
                        ?>
                      <tr>
                        <td>
                          <?php echo $count; ?>
                        </td>
                        <td>
                          <?php echo $values['ps_order_id']; ?>
                        </td>
                        <td>
                          <?php echo $values['u_name']; ?>
                        </td>
                        <td>
                          <?php echo $values['b_name']; ?>
                        </td>
                        <td>
                          <?php echo "$", $values['ps_total_amount']; ?>
                        </td>
                        <td>
                          <?php echo $values['ps_created_at']; ?>
                        </td>
                      </tr>
                      <?php
                      $count++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row --> 
              <div class="row mt-5">
                <!-- accepted payments column -->
                <div class="col-md-6">
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <?php
                        $subtotal=0;
                        $grandtotal=0;
                        foreach($payment as $values)
                        {
                        $subtotal = $values['ps_total_amount'];
                        $grandtotal+=$subtotal;
                        }
                        ?>
                        <tr>
                          <th>Total: 
                          </th>
                          <td>
                            <?php echo "$", $grandtotal; ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php $this->load->view('admin/footer-include'); ?>
