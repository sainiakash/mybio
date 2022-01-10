<?php $this->load->view('admin/header'); ?>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <?php $this->load->view('admin/sidebar'); ?>
      </div>
      <!-- top navigation -->
      <div class="top_nav">
        <?php $this->load->view('admin/top-header'); ?>
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
                <h2>Add Product
                </h2>
                <div class="clearfix">
                </div>
              </div>
              <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('addproduct'); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="last-name">Language
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="" selected disabled>Choose Language
                            </option>
                            <option value="EN">EN
                            </option>
                            <option value="KR">KR
                            </option>
                          </select>
                          <div class="text text-danger">
                            <?php echo form_error('language'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="first-name">Name
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo set_value('name'); ?>">
                          <div class="text text-danger">
                            <?php echo form_error('name'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="first-name">Category
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <select class="form-control" name="category">
                            <option selected disabled value="">Choose Category
                            </option>
                            <?php
                            foreach($category as $values)
                            {
                            ?>
                            <option value="<?php echo $values['c_id']; ?>">
                              <?php echo $values['c_name']; ?>
                            </option>
                            <?php
                            }
                            ?>
                          </select>
                          <div class="text text-danger">
                            <?php echo form_error('category'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="first-name">Sku Code
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Sku Code" name="sku_code" value="<?php echo set_value('sku_code'); ?>">
                          <div class="text text-danger">
                            <?php echo form_error('sku_code'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="first-name">Expiry Date
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="date" class="form-control" placeholder="Expiry Date" name="expiry_date" value="<?php echo set_value('expiry_date'); ?>">
                          <div class="text text-danger">
                            <?php echo form_error('expiry_date'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="first-name">Suggested Use
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <textarea class="form-control" name="suggested_use" placeholder="Suggested Use"><?php echo set_value('suggested_use'); ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('suggested_use'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="first-name">Description
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <textarea name="description" class="form-control"  placeholder="Description">
                            <?php echo set_value('description'); ?>
                          </textarea>
                          <div class="text text-danger">
                            <?php echo form_error('description'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 text-left">Price
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo set_value('price'); ?>">
                          <div class="text text-danger">
                            <?php echo form_error('price'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 text-left">MRP
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input class="form-control" type="text" name="mrp" placeholder="MRP" value="<?php echo set_value('mrp'); ?>">
                          <div class="text text-danger">
                            <?php echo form_error('mrp'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="last-name">Image
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="file" name="image" class="form-control" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left " for="first-name">Quantity
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text"  class="form-control" placeholder="Quantity" name="quantity" value="<?php echo set_value('quantity'); ?>">
                          <div class="text text-danger">
                            <?php echo form_error('quantity'); ?>
                          </div>
                        </div>
                      </div> 
                    </div>
                    <div class="col-md-6">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="first-name">Other Ingredients
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <textarea name="ingredients" class="form-control" placeholder="Other Ingredients">
                            <?php echo set_value('ingredients'); ?>
                          </textarea>
                          <div class="text text-danger">
                            <?php echo form_error('ingredients'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="first-name">Disclaimer
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <textarea name="disclaimer" class="form-control" placeholder="Disclaimer">
                            <?php echo set_value('disclaimer'); ?>
                          </textarea>
                          <div class="text text-danger">
                            <?php echo form_error('disclaimer'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 text-left" for="first-name">Warnings
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <textarea name="warnings" class="form-control" placeholder="Warnings">
                            <?php echo set_value('warnings'); ?>
                          </textarea>
                          <div class="text text-danger">
                            <?php echo form_error('warnings'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="ln_solid">
                  </div>
                  <div class="item form-group text-center">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <input class="btn btn-primary" type="submit" value="Cancel">
                      <input class="btn btn-primary" type="reset" value="Reset">
                      <input type="submit" class="btn btn-success" name="addproduct" value="Submit">
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
        CKEDITOR.replace('description');
        CKEDITOR.replace('suggested_use');
        CKEDITOR.replace('ingredients');
        CKEDITOR.replace('disclaimer');
        CKEDITOR.replace('warnings');
      </script>
      <?php $this->load->view('admin/footer'); ?>
    </div>
  </div>
