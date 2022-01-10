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
        <h2>티켓 관리</h2>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <div class="row">
      <div class="col-sm-12">
        <div class="card-box table-responsive">
           <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
            <thead>
              <tr>
                <th>S.아니요</th>
                <th>제목</th>
                <th>이름</th>
                <th>이메일</th>
                <th>핸드폰</th>
                <th>메세지</th>
                <th>날짜 시간</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              $count=1;
              foreach($ticket as $values)
              {
              ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $values['hs_title']; ?></td>
                <td><?php echo $values['hs_name']; ?></td>
                <td><?php echo $values['hs_email']; ?></td>
                <td><?php echo $values['hs_phone']; ?></td>
                <td><?php echo "<pre>" . wordwrap($values['hs_message'], 40) . "</pre>"; ?></td>
                <td><?php echo $values['hs_created_at']; ?></td>
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