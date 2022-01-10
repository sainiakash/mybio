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
        <h2>테스트</h2>
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
                <th>이름</th>
                <th>범주</th>
                <th>가격</th>
                <th>설명</th>
                <th>씨</th>
                <th>영상</th>
                <th>언어</th>
                <th>상태</th>
                <th>날짜 시간</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count=1;
              foreach($test as $values)
              {
              ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo "<pre>" . wordwrap($values['t_kr_name'], 40) . "</pre>"; ?></td>
                <td><?php echo $values['c_kr_name']; ?></td>
                <td><?php echo '$',$values['t_kr_price']; ?></td>
                <td><?php echo "<pre>" . wordwrap($values['t_kr_description'], 40) . "</pre>"; ?></td>
                <td><?php echo '$',$values['t_kr_mrp']; ?></td>
                <td>
                  <?php
                  if(!empty($values['t_kr_image']))
                  {
                  ?>
                  <a href="<?php echo base_url('public/test/').$values['t_kr_image']; ?>" target="_blank">보다</a>
                  <?php
                  }
                  ?>
                </td>
                <td><?php echo $values['t_kr_language']; ?></td>
                <td>
                <?php
                if($values['t_kr_status']==2)
                { 
                ?>
                  <h4><span class="badge badge-danger">비활성</span></h4>
                <?php
                }
                elseif($values['t_kr_status']==1)
                {
                ?>
                  <h4><span class="badge badge-success">활동적인</span></h4>
                <?php
                }
                else
                { 
                  echo "";
                }
                ?>
                </td>
                <td><?php echo $values['t_kr_created_at']; ?></td>
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