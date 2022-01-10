<?php $this->load->view('branch/header'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <?php $this->load->view('branch/sidebar'); ?>
      </div>
      <!-- top navigation -->
      <div class="top_nav">
        <?php $this->load->view('branch/top-header'); ?>
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
                <span aria-hidden="true">&times;
                </span>
              </button>
            </div>
            <?php
            }
            ?>
            <div class="x_panel">
              <div class="x_title">
                <h2>Add Timeslot
                </h2>
                <div class="clearfix">
                </div>
              </div>
              <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('branch-add-timeslot'); ?>">
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Language<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <select class="form-control" name="language">
                        <option value="" selected disabled>Choose Language</option>
                        <option value="EN">EN</option>
                        <option value="KR">KR</option>
                      </select>
                      <div class="text text-danger">
                        <?php echo form_error('language'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Start Time
                      <span class="required">*
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <div class='input-group date' id='datetimepicker1'>
                        <select class="form-control mr-3" name="start_day">
                          <option disabled selected value="">Choose Day
                          </option>
                          <option value="Sun">Sunday
                          </option>
                          <option value="Mon">Monday
                          </option>
                          <option value="Tue">Tuesday
                          </option>
                          <option value="Wed">Wednesday
                          </option>
                          <option value="Thu">Thursday
                          </option>
                          <option value="Fri">Friday
                          </option>
                          <option value="Sat">Saturday
                          </option>
                        </select>
                        <input type='text' class="form-control" name="start_time" value="<?php echo set_value('start_time'); ?>">
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
                          <option disabled selected value="">Choose Day
                          </option>
                          <option value="Sun">Sunday
                          </option>
                          <option value="Mon">Monday
                          </option>
                          <option value="Tue">Tuesday
                          </option>
                          <option value="Wed">Wednesday
                          </option>
                          <option value="Thu">Thursday
                          </option>
                          <option value="Fri">Friday
                          </option>
                          <option value="Sat">Saturday
                          </option>
                        </select>
                        <input type='text' class="form-control" name="end_time" value="<?php echo set_value('end_time'); ?>">
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
                      <input type="submit" class="btn btn-primary" value="Cancel">
                      <input type="submit" class="btn btn-primary" value="Reset">
                      <input type="submit" class="btn btn-success" name="addtimeslot" value="Submit">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js">
      </script>
      <script>    
        CKEDITOR.replace( 'description' );
      </script>
      <?php $this->load->view('branch/footer'); ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js">
      </script>
      <script>
        $(function()
        {
          $('#datetimepicker1').datetimepicker({
            format: 'HH:mm' 
          });
        });
      </script>
    </div>
  </div>
