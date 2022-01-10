<?php $this->load->view('krbranch/header'); ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php $this->load->view('krbranch/sidebar');
          ?>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <?php $this->load->view('krbranch/top-header');
          ?>
        </div>
        <div class="right_col" role="main">
             <div class="row">
              <div class="col-md-12 col-sm-12">
                <?php
                  if(!empty($this->session->flashdata('success')))
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
                ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>직원 편집</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('branch-update-staff/').$staff->st_id; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">직원 ID<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" name="staff_id" value="<?php echo $staff->st_staff_id; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('staff_id'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">영상<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="image" class="form-control" value="">
                          <input type="hidden" name="image" value="<?php echo $staff->st_image; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">이름<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $staff->st_name; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('name'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">이메일<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $staff->st_email; ?>">
                          <div class="text text-danger"><?php echo form_error('email'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">핸드폰<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="phone" placeholder="Phone" class="form-control" value="<?php echo $staff->st_phone; ?>">
                          <div class="text text-danger"><?php echo form_error('phone'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">생후<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="date" name="dob" value="<?php echo $staff->st_dob; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('dob'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">위치<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  class="form-control" name="position" value="<?php echo $staff->st_position; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('position'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">도<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  class="form-control" name="degree" value="<?php echo $staff->st_degree; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('degree'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">학위 이미지<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="degree_image" class="form-control" value="">
                          <input type="hidden" name="degree_image" value="<?php echo $staff->st_degree_photo; ?>">
                        </div>
                      </div>  
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">경험<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  class="form-control" name="experience" value="<?php echo $staff->st_experience; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('experience'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">주민등록번호<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  class="form-control" name="ssn" value="<?php echo $staff->st_ssn; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('ssn'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="취소">
                           
                          <input type="submit" class="btn btn-success" name="updatestaff" value="제출하다">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <?php $this->load->view('krbranch/footer'); ?>
      </div>
    </div>