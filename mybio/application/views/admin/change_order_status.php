<?php $this->load->view('admin/header-include'); ?>
          <!-- top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Order Status</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" novalidate="" action="<?php echo base_url('admin/change_order_status/').$order->o_id; ?>">
                      <?php
                      if($order->o_status=='0')
                      {
                      ?>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Order Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="status">
                            <option value="" disabled selected>Change Order Status</option>
                            <option value="1">Order Confirmed</option>
                            <option value="5">Order Cancelled</option>
                          </select>
                        </div>
                      </div>
                      <?php
                      }
                      elseif($order->o_status=='1')
                      {
                      ?>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Order Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="status">
                            <option value="" disabled selected>Change Order Status</option>
                            <option value="2">Order Processing</option>
                            <option value="5">Order Cancelled</option>
                          </select>
                        </div>
                      </div>
                      <?php
                      }
                      elseif($order->o_status=='2')
                      {
                      ?>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Order Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="status">
                            <option value="" disabled selected>Change Order Status</option>
                            <option value="4">Order Delivered</option>
                            <option value="5">Order Cancelled</option>
                          </select>
                        </div>
                      </div>
                      <?php
                      }
                     
                      else
                      {
                        echo "";
                      }
                      ?>



                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <input type="submit" class="btn btn-success" name="change_order_status" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!-- /top tiles -->

          <?php $this->load->view('admin/footer-include'); ?>