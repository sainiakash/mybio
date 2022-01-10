<?php $this->load->view('admin/header-include'); ?>
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
        <h2>Edit Product
        </h2>
        <div class="clearfix">
        </div>
      </div>
      <div class="x_content">
        <br>
        <?php
        $lang = $this->uri->segment('3');
        if($lang=='EN')
        {
        ?>
        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('updateproduct/').$product->p_id.'/'.$lang; ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 text-left" for="last-name">Language
                  <span class="required">*
                  </span>
                </label>
                <div class="col-md-9 col-sm-6 ">
                  <select class="form-control" name="language">
                    <option value="<?php echo $product->p_language; ?>" selected>
                      <?php echo $product->p_language; ?>
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
                  <input type="text" class="form-control" name="update_name" value="<?php echo $product->p_name; ?>">
                  <div class="text text-danger">
                    <?php echo form_error('update_name'); ?>
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
                    <option selected value="<?php echo $product->c_id; ?>"><?php echo $product->c_name; ?>
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
                  <input type="text" class="form-control" name="sku_code" value="<?php echo $product->p_sku_code; ?>">
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
                  <input type="date" class="form-control" name="expiry_date" value="<?php echo $product->p_expiry_date; ?>">
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
                  <textarea name="suggested_use" class="form-control">
                    <?php echo $product->p_suggested_use; ?>
                  </textarea>
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
                    <?php echo $product->p_description; ?>
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
                  <input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo $product->p_price; ?>">
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
                  <input class="form-control" type="text" name="mrp" placeholder="MRP" value="<?php echo $product->p_mrp; ?>">
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
                  <input type="hidden" name="image" value="<?php echo $product->p_image; ?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 text-left " for="first-name">Quantity
                  <span class="required">*
                  </span>
                </label>
                <div class="col-md-9 col-sm-6 ">
                  <input type="text"  class="form-control" placeholder="Quantity" name="quantity" value="<?php echo $product->p_quantity; ?>">
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
                  <textarea name="ingredients" class="form-control">
                    <?php echo $product->p_other_ingredents; ?>
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
                    <?php echo $product->p_disclaimer; ?>
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
                  <textarea name="warnings" class="form-control">
                    <?php echo $product->p_warnings; ?>
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
              <input type="submit" class="btn btn-success" name="updateproduct" value="Submit">
            </div>
          </div>
        </form>
        <?php
        }
        elseif($lang=='KR')
        {
        ?>
          <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('updateproduct/').$product->p_kr_id.'/'.$lang; ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 text-left" for="last-name">Language
                  <span class="required">*
                  </span>
                </label>
                <div class="col-md-9 col-sm-6 ">
                  <select class="form-control" name="language">
                    <option value="<?php echo $product->p_kr_language; ?>" selected>
                      <?php echo $product->p_kr_language; ?>
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
                  <input type="text" class="form-control" name="update_name" value="<?php echo $product->p_kr_name; ?>">
                  <div class="text text-danger">
                    <?php echo form_error('update_name'); ?>
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
                    <option selected value="<?php echo $product->c_id; ?>"><?php echo $product->c_name; ?>
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
                  <input type="text" class="form-control" name="sku_code" value="<?php echo $product->p_kr_sku_code; ?>">
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
                  <input type="date" class="form-control" name="expiry_date" value="<?php echo $product->p_kr_expiry_date; ?>">
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
                  <textarea name="suggested_use" class="form-control">
                    <?php echo $product->p_kr_suggested_use; ?>
                  </textarea>
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
                    <?php echo $product->p_kr_description; ?>
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
                  <input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo $product->p_kr_price; ?>">
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
                  <input class="form-control" type="text" name="mrp" placeholder="MRP" value="<?php echo $product->p_kr_mrp; ?>">
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
                  <input type="hidden" name="image" value="<?php echo $product->p_kr_image; ?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 text-left " for="first-name">Quantity
                  <span class="required">*
                  </span>
                </label>
                <div class="col-md-9 col-sm-6 ">
                  <input type="text"  class="form-control" placeholder="Quantity" name="quantity" value="<?php echo $product->p_kr_quantity; ?>">
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
                  <textarea name="ingredients" class="form-control">
                    <?php echo $product->p_kr_other_ingredents; ?>
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
                    <?php echo $product->p_kr_disclaimer; ?>
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
                  <textarea name="warnings" class="form-control">
                    <?php echo $product->p_kr_warnings; ?>
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
              <input type="submit" class="btn btn-success" name="updateproduct" value="Submit">
            </div>
          </div>
        </form>
        <?php
        }
        else
        {
          echo "";
        }
        ?>
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
<?php $this->load->view('admin/footer-include'); ?>
</div>
</div>
