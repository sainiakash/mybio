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
                    <h2>타임슬롯 수정</h2>
                    <div class="clearfix"></div>
                  </div><div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('branch-update-timeslot/').$timeslot->ts_kr_id; ?>">
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">언어<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <select class="form-control" name="language">
                        <option selected value="<?php echo $timeslot->ts_kr_language; ?>"><?php echo $timeslot->ts_kr_language; ?></option>
                        <option value="EN">KO</option>
                        <option value="KR">한국</option>
                      </select>
                      <div class="text text-danger">
                        <?php echo form_error('language'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">시작 시간

                      <span class="required">*
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <div class='input-group date' id='datetimepicker1'>
                        <select class="form-control mr-3" name="start_day">
                          <option disabled selected value=""><?php echo $timeslot->ts_kr_start_day; ?>
                          </option>
                          <option value="Sun">일요일
                          </option>
                          <option value="Mon">월요일
                          </option>
                          <option value="Tue">화요일
                          </option>
                          <option value="Wed">수요일
                          </option>
                          <option value="Thu">목요일
                          </option>
                          <option value="Fri">금요일
                          </option>
                          <option value="Sat">토요일
                          </option>
                        </select>
                        <input type='text' class="form-control" name="start_time" value="<?php echo $timeslot->ts_kr_start_time; ?>">
                        <span class="input-group-addon">
                          <span class="fas fa-clock pt-1">
                          </span>
                        </span>
                      </div>
                         <div class="text text-danger float-left">
                          <?php echo form_error('start_day'); ?>
                          </div>
                        <div class="text text-danger float-right">
                          <?php echo form_error('start_time'); ?>
                        </div>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">End Time
                      <span class="required">*
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <div class='input-group date' id='datetimepicker2'>
                        <select class="form-control mr-3" name="end_day">
                          <option disabled selected value=""><?php echo $timeslot->ts_kr_end_day; ?>
                          </option>
                          <option value="Sun">일요일
                          </option>
                          <option value="Mon">월요일
                          </option>
                          <option value="Tue">화요일
                          </option>
                          <option value="Wed">수요일
                          </option>
                          <option value="Thu">목요일
                          </option>
                          <option value="Fri">금요일
                          </option>
                          <option value="Sat">토요일
                          </option>
                        </select>
                        <input type='text' class="form-control" name="end_time" value="<?php echo $timeslot->ts_kr_end_time; ?>">
                        <span class="input-group-addon">
                          <span class="fas fa-clock pt-1">
                          </span>
                        </span>
                      </div>
                        <div class="text text-danger float-left"><?php echo form_error('end_day'); ?></div> 
                        <div class="text text-danger float-right">
                          <?php echo form_error('end_time'); ?>
                        </div>
                    </div>
                  </div>
                  <div class="ln_solid">
                  </div>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <input type="submit" class="btn btn-primary" value="취소">
                        <input type="submit" class="btn btn-success" name="updatetimeslot" value="제출하다">
                    </div>
                  </div>
                </form>
              </div>
                </div>
              </div>
            </div>
          </div>
          <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
          <script>
            CKEDITOR.replace( 'description' );
          </script>
         <?php $this->load->view('krbranch/footer'); ?>
      </div>
    </div>