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
        <h2>직원 관리
        </h2>
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
                <th>직원 ID</th>
                <th>프로필 이미지</th>
                <th>이름</th>
                <th>이메일</th>
                <th>핸드폰</th>
                <th>생일</th>
                <th>위치</th>
                <th>도</th>
                <th>학위 이미지</th>
                <th>경험</th>
                <th>주민등록번호</th>
                <th>날짜 시간</th>
                <th>동작</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count=1;
              foreach($staff as $values)
              {
              ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $values['st_kr_staff_id']; ?> </td>
                <td>
                  <?php
                  if(!empty($values['st_kr_image']))
                  {
                  ?>
                  <a href="<?php echo base_url('public/staff/').$values['st_kr_image']; ?>" target="_blank">보다</a>
                  <?php
                  }
                  ?>
                </td>
                <td><?php echo $values['st_kr_name']; ?></td>
                <td><?php echo $values['st_kr_email']; ?></td>
                <td><?php echo $values['st_kr_phone']; ?></td>
                <td><?php echo $values['st_kr_dob']; ?></td>
                <td><?php echo $values['st_kr_position']; ?></td>
                <td><?php echo $values['st_kr_degree']; ?></td>
                <td>
                  <?php
                  if(!empty($values['st_image']))
                  {
                  ?>
                  <a href="<?php echo base_url('public/staff/').$values['st_degree_photo']; ?>" target="_blank">보다</a>
                  <?php
                  }
                  ?>
                </td>
                <td><?php echo $values['st_kr_experience']; ?></td>
                <td><?php echo $values['st_kr_ssn']; ?></td>
                <td><?php echo $values['st_kr_created_at']; ?></td>
                <td>
                  <a title="Edit Staff" class="btn btn-info" href="<?php echo base_url('branch-edit-staff/').$values['st_kr_id']; ?>"><i class="fa fa-edit"></i></a>
                  <a title="Delete Staff" class="btn btn-danger" href="<?php echo base_url('branch-delete-staff/').$values['st_kr_id']; ?>" onclick="return msg();"><i class="fa fa-trash"></i></a>
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
return confirm('삭제하시겠습니까?');
}
</script>
<?php $this->load->view('krbranch/footer-include'); ?>