<?php $this->load->view('krbranch/header-include'); ?>
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
        <h2>약속 내역
        </h2>
        <div class="clearfix">
        </div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
                <thead>
                  <tr>
                    <th>S.아니요
                    </th>
                    <th>사용자 이름
                    </th>
                    <th>주문 아이디
                    </th>
                    <th>연구실 이름
                    </th>
                    <th>테스트 이름
                    </th>
                    <th>약속 날짜 및 시간
                    </th>
                    <th>결제 모드
                    </th>
                    <th>지불 금액
                    </th>
                    <th>상태
                    </th>
                    <th>만든 시간
                    </th>
                    <th>업데이트 날짜
                    </th>
                    <th>동작
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $count=1;
                  foreach($appointment as $values)
                  {
                    $status = $values['ap_status'];
                  ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                      <?php echo $values['u_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['ap_order_id']; ?>
                    </td>
                    <td>
                      <?php echo $values['b_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['t_name']; ?>
                    </td>
                    <td>
                      <?php echo $values['ap_date_time']; ?>
                    </td>
                    <td>
                      <?php echo $values['ap_payment_mode']; ?>
                    </td>
                    <td>
                      <?php echo $values['ap_payable_amount']; ?>
                    </td>
                    <td>
                    <?php
                    if($status == '1')
                    {
                    ?>
                      <h4><span class="badge badge-success">Confirm</span></h4>
                      <?php
                    }
                    elseif($status == '2')
                    {
                    ?>
                      <h4><span class="badge badge-danger">Processing</span></h4>
                    <?php
                    }
                    elseif($status == '3') 
                    {
                    ?>
                      <h4><span class="badge badge-primary">Cancel/Failed</span></h4>
                    <?php
                    }
                     elseif($status == '4') 
                    {
                    ?>
                      <h4><span class="badge badge-primary">Completed</span></h4>
                    <?php
                    }
                     elseif($status == '0') 
                    {
                    ?>
                      <h4><span class="badge badge-primary">Pending</span></h4>
                    <?php
                    }
                    else
                    {
                      echo "";
                    }
                    ?>
                    </td>
                    <td>
                      <?php echo $values['ap_created_at']; ?>
                    </td>
                     <td>
                      <?php echo $values['ap_updated_at']; ?>
                    </td>
                  <!--   <td>
                      <a title="View Appointment" class="btn btn-secondary" href="<?php echo base_url('change-appointment-status/').$values['ap_id']; ?>">
                        <i class="fa fa-eye">
                        </i>
                      </a>
                    </td> -->
                    <?php
                    if($status=='3' || $status=='4')
                    { 
                    ?>
                    <td>
                      <a title="Edit Appointment" class="btn btn-info" disabled>
                        <i class="fa fa-edit">
                        </i>
                      </a>
                    </td> 
                    <?php
                    }
                    else
                    {
                      ?>
                      <td>
                      <a title="Edit Appointment" class="btn btn-info" href="<?php echo base_url('branch-change-appointment-status/').$values['ap_id']; ?>">
                        <i class="fa fa-edit">
                        </i>
                      </a>
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
<script type="text/javascript">
  function msg()
  {
    return confirm('삭제하시겠습니까?');
  }
</script>
<?php $this->load->view('krbranch/footer-include'); ?>
