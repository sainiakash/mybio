<?php
$this->load->view('home/header');
?>
    <div class="other-page">
      <div class="other-heading text-center text-white">
        <h1>Shop</h1>
        <p>Home / Shop</p>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="product-section">
    <div class="container padding">
      <div class="product-gallery-heading text-center">
        <img src="<?= base_url('public/home/assets/images/favicon.png'); ?>');?>" alt="">
        <h1>Product Gallery</h1>
        <hr class="green-hr mx-auto">
      </div>
    
      <div class="product-search ">
        <div class="row pb-4">
          <div class="col-md-6">
            <div class="product-input">
              <input type="text" placeholder="Search Product">
              <div class="product-search-icon">
                <i class="fas fa-search"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 text-right">
            <div class="product-filter">
              <label for="">Sort By</label>
              <select name="" id="">
                <option value="">Sort</option>
                <option value="">Best Selling</option>
                <option value="">Popular</option>
              </select>
            </div>
          </div>
        </div>
        <hr>
      </div>
      <div class="container padding">
        <div class="row">
          <?php
          foreach($product as $values)
          {
          ?>
          <div class="col-md-3 col-lg-2">
            <div class="product-box text-center">
              <div class="product-img">
                <img src="<?php echo base_url('public/product/').$values['p_image']; ?>" alt="">
                <div class="product-offer">
                  <span>30% Off</span>
                </div>
              </div>
              <div class="product-desc">
                <h5><?php echo $values['p_name']; ?></h5>
                <p><?php echo substr_replace($values['p_description'], "...", 100); ?></p>
              </div>
              <div class="add-cart">
                <a href="<?php echo base_url('add-to-cart/').$values['p_slug']; ?>">Add to cart</a>
              </div>
            </div>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('home/footer'); ?>