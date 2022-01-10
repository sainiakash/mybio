<?php $this->load->view('krbranch/header-include'); ?>
          <!-- top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 ">
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
                elseif(!empty($this->session->flashdata('danger')))
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
                elseif(!empty($this->session->flashdata('warning')))
                {
                  ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <?php echo $this->session->flashdata('warning'); ?>
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
                    <h2>비밀번호 변경</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="<?php echo base_url('branch-change-password/').$profile->b_kr_id; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">기존 비밀번호<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="기존 비밀번호" name="old" value="<?php echo set_value('old'); ?>">
                          <div class="text text-danger"><?php echo form_error('old'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">새 비밀번호<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="new" class="form-control" placeholder="새 비밀번호" value="<?php echo set_value('new'); ?>">
                          <div class="text text-danger"><?php echo form_error('new'); ?></div>
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">비밀번호 확인<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="confirm" class="form-control" placeholder="비밀번호 확인" value="<?php echo set_value('confirm'); ?>">
                          <div class="text text-danger"><?php echo form_error('confirm'); ?></div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="submit" >취소</button>
                          <button class="btn btn-primary" type="submit">초기화</button>
                          <input type="submit" class="btn btn-success" name="changepassword" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!-- /top tiles -->

          <?php $this->load->view('krbranch/footer-include'); ?>