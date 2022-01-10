<?php $this->load->view('krbranch/header-include'); ?>

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
                    <h2>프로필</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('branch-update-profile/').$profile->b_id; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">이름<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" name="name" value="<?php echo $profile->b_kr_name; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('name'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">이메일<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="email" name="email" class="form-control" value="<?php echo $profile->b_kr_email; ?>">
                          <div class="text text-danger"><?php echo form_error('email'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">비밀번호<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" name="password" value="<?php echo $profile->b_kr_password; ?>">
                          <div class="text text-danger"><?php echo form_error('password'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">주소<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="address" class="form-control"><?php echo $profile->b_address; ?></textarea>
                          <div class="text text-danger"><?php echo form_error('address'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">주민등록번호<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="ssn"  class="form-control" value="<?php echo $profile->b_ssn; ?>">
                          <div class="text text-danger"><?php echo form_error('ssn'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">주민등록번호 영상<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="ssn_image" class="form-control" value="">
                          <input type="hidden" name="ssn_image" value="<?php echo $profile->b_ssn_image; ?>">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">프로필 사진<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="profile" class="form-control" value="">
                          <input type="hidden" name="profile" value="<?php echo $profile->b_image; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">전화<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="telephone" class="form-control" value="<?php echo $profile->b_telephone; ?>">
                          <div class="text text-danger"><?php echo form_error('telephone'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">계좌 번호<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="account_number" class="form-control" value="<?php echo $profile->b_account_number; ?>">
                          <div class="text text-danger"><?php echo form_error('account_number'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">라우팅 번호<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="routing_number" class="form-control" value="<?php echo $profile->b_routing_number; ?>">
                          <div class="text text-danger"><?php echo form_error('routing_number'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">계정 이름<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="account_name" class="form-control" value="<?php echo $profile->b_account_name; ?>">
                          <div class="text text-danger"><?php echo form_error('account_name'); ?></div>
                        </div>
                      </div>
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">계정 휴대폰 번호<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="account_mobile_number" class="form-control" value="<?php echo $profile->b_account_mobile_number; ?>">
                          <div class="text text-danger"><?php echo form_error('account_mobile_number'); ?></div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input class="btn btn-primary" type="submit" value="취소">
                          <input type="submit" class="btn btn-success" name="updateprofile" value="제출하다
">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php $this->load->view('krbranch/footer-include'); ?>
      </div>
    </div>