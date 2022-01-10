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
                    <h2>티켓 수정</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('updateproduct/').$product->p_id; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">이름<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" name="name" value="<?php echo $product->p_name; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('name'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">가격<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="price" value="<?php echo $product->p_price; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('price'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">설명<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="description" class="form-control"><?php echo $product->p_description; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('description'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">MRP<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="mrp" value="<?php echo $product->p_mrp; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('mrp'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">영상<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="image" class="form-control" value="">
                          <input type="hidden" name="image" value="<?php echo $product->p_image; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">수량<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  class="form-control" placeholder="수량" name="quantity" value="<?php echo $product->p_quantity; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('quantity'); ?>
                          </div>
                        </div>
                      </div> 
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="취소">
                          <input type="submit" class="btn btn-success" name="updateproduct" value="제출하다">
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
        <?php $this->load->view('branch/footer-include'); ?>
      </div>
    </div>