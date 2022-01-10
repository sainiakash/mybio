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
    ?>
    <div class="x_panel">
      <div class="x_title">
        <h2>Order History
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
      <div class="well" style="overflow: auto">
        <form method="POST" action="<?php echo base_url('order-history'); ?>">
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
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>S.No
                    </th>
                    <th>Billing Address
                    </th>
                    <th>Shipping Address
                    </th>
                   <!--  <th>Product History
                    </th> -->
                    <th>Order History
                    </th>
                    <th>Order Status
                    </th>
                    <th>Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $count=1;
                  foreach($order_history as $values)
                  {
                    $status = $values['o_status'];
                  ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                      <span>Name:</span>
                      <b>
                        <?php echo $values['u_name']; ?>
                      </b>
                      <br/>
                      <span>Email: 
                      </span>
                      <b>
                        <?php echo $values['u_email']; ?>
                      </b>
                      <br/>
                      <span>Mobile :
                      </span>
                      <b>
                        <?php echo $values['u_mobile']; ?>
                      </b>
                      <br/> 
                    </td>
                    <td>
                      <span>Name : John
                      </span>
                      <b>
                       
                      </b>
                      <br/>
                      <span>Email: john@gmail.com
                      </span>
                      <b>
                       
                      </b>
                      <br/>
                      <span>Mobile : (330) 889-3919
                      </span>
                      <b>
                     
                      </b>
                      <br/> 
                      <span>Address : 1872 Hyde Shaffer Rd NW, Bristolville, OH, 44402
                      </span>
                      <b>
                       
                      </b>
                      <br/>
                      <span>Date :
                      </span>
                      <b>
                        <?php echo $values['d_created_at']; ?>
                      </b>
                      <br/>
                    </td>
              <!--       <td>
                      <span>Name : 
                      </span>
                      <b>
                        <?php echo $values['p_title']; ?>
                      </b>
                      <br/>
                      <span>Price : 
                      </span>
                      <b>
                        <?php echo $values['p_price']; ?>
                      </b>
                      <br/>
                      <span>Pack Size :
                      </span>
                      <b>
                        <?php echo $values['p_pack_size']; ?>
                      </b>
                      <br/>
                    </td> -->
                    <td>
                      <span>Order No : 
                      </span>
                      <b>
                        <?php echo $values['o_order_id']; ?>
                      </b>
                      <br/>
                      <span>Payment Type : 
                      </span>
                      <b>
                        <?php echo $values['o_payment_type']; ?>
                      </b>
                      <br/>
                      <span>Grand Total :
                      </span>
                      <b>
                        <?php echo $values['o_payment_amount']; ?>
                      </b>
                      <br/>
                      <span>Order Date:
                      </span>
                      <b>
                        <?php echo $values['o_created_at']; ?>
                      </b>
                      <br/>
                    </td>
                    <td>
                    <?php
                    if($status == '0')
                    {
                    ?>
                      <h4><span class="badge badge-success">Order Pending</span></h4>
                      <?php
                    }
                    elseif($status == '1')
                    {
                    ?>
                      <h4><span class="badge badge-primary">Order Confirmed</span></h4>
                    <?php
                    }
                    elseif($status == '2') 
                    {
                    ?>
                      <h4><span class="badge badge-warning">Order Processing</span></h4>
                    <?php
                    }
                    elseif($status == '3')
                    {
                    ?>
                      <h4><span class="badge badge-dark">Order Shipped</span></h4>
                    <?php
                    }
                    elseif($status == '4') 
                    {
                    ?>
                      <h4><span class="badge badge-info">Order Delivered</span></h4>
                    <?php
                    }
                    elseif($status == '5')
                    {
                    ?>
                      <h4><span class="badge badge-danger">Order Cancelled</span></h4>
                    <?php
                    }
                    elseif($status == '6') 
                    {
                    ?>
                      <h4><span class="badge badge-secondary">Kit Received</span></h4>
                    <?php
                    }
                    else
                    {
                      echo "";
                    }

                    if($status=='4')
                    {
                    ?>
                    </td>
                    <td>
                      <a title="Change Order Status" class="btn btn-info" href="<?php echo base_url('change-order-status/').$values['o_id']; ?>" onclick="return msg(); "><i class="fa fa-edit"></i></a>
                    </td>
                    <?php
                    }
                    else
                    {
                      ?>
                      <td>
                        <a title="Change Order Status" class="btn btn-info" disabled><i class="fa fa-edit"></i></a>
                      </td>
                      <?php
                    }
                    ?>
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
<?php $this->load->view('admin/footer-include'); ?>
