<?php $this->load->view('branch/header-include'); ?>
<div class="container mt-5">
  <div class="row ">
    <div class="col-md-12 col-lg-12 col-sm-12">
      <div class="appointment-box">
        <div class="appointment-main-heading">
          <h5 class="m-0">Product View
          </h5>
        </div>
        <div class="row p-3">
          <div class="col-md-6 col-lg-4">
            <div class="product-view-box">
              <div class="product-img-boxes text-center">
                <div class="product-imgs">
                  <?php
                  if(empty($product->p_image))
                  {
                  ?>
                  <img src="<?php echo base_url('public/test-kit.jpg'); ?>" alt="">
                  <?php
                  }
                  else
                  {
                  ?>
                  <img src="<?php echo base_url('public/product/').$product->p_image; ?>" width="300px" alt="">
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-8">
            <div class="product-details-box">
              <div class="box-list-box">
                <div class="box-list">
                  <div>
                    <strong>Product Name
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $product->p_name; ?>
                    </p>
                  </div>
                </div>
                <div class="box-list">
                  <div>
                    <strong>Product Category
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $product->c_name; ?>
                    </p>
                  </div>
                </div>
                <div class="box-list">
                  <div>
                    <strong>Sku Code
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $product->p_sku_code; ?>
                    </p>
                  </div>
                </div>
                <div class="box-list">
                  <div>
                    <strong>Product Price
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $product->p_price; ?>
                    </p>
                  </div>
                </div>
                <div class="box-list">
                  <div>
                    <strong>Product MRP
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $product->p_mrp; ?>
                    </p>
                  </div>
                </div>
                <div class="box-list">
                  <div>
                    <strong>Product Quantity
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $product->p_quantity; ?>
                    </p>
                  </div>
                </div>
                <div class="box-list">
                  <div>
                    <strong>Slug
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $product->p_slug; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12 col-lg-12 ">
          <div class="navigation-tab">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Suggested Use
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Other Ingredients
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="disclaimer-tab" data-toggle="tab" href="#disclaimer" role="tab" aria-controls="disclaimer" aria-selected="false">Disclaimer
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="warning-tab" data-toggle="tab" href="#warning" role="tab" aria-controls="warning" aria-selected="false">Warning
                </a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container p-3">
                  <div class="row">
                    <div class="col-md-12 col-lg-12 p-2">
                      <p class="m-0">
                      <h4 class="text-dark">Description
                      </h4>
                      <?php echo $product->p_description; ?>
                      </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="container p-3">
                <div class="row">
                  <div class="col-md-12 col-lg-12 p-2">
                    <p class="m-0">
                    <h4 class="text-dark">Suggested Use
                    </h4>
                    <?php echo $product->p_suggested_use; ?>
                    </p>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="container p-3">
              <div class="row">
                <div class="col-md-12 col-lg-12 p-2">
                  <p class="m-0">
                  <h4 class="text-dark">Other Ingredients
                  </h4>
                  <?php echo $product->p_other_ingredents; ?>
                  </p>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="disclaimer" role="tabpanel" aria-labelledby="disclaimer-tab">
          <div class="container p-3">
            <div class="row">
              <div class="col-md-12 col-lg-12 p-2">
                <p class="m-0">
                <h4 class="text-dark">Disclaimer
                </h4>
                <?php echo $product->p_disclaimer; ?>
                </p>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="warning" role="tabpanel" aria-labelledby="warning-tab">
        <div class="container p-3">
          <div class="row">
            <div class="col-md-12 col-lg-12 p-2">
              <p class="m-0">
              <h4 class="text-dark">Warning
              </h4>
              <?php echo $product->p_warnings; ?>
              </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->
<?php $this->load->view('branch/footer-include'); ?>
