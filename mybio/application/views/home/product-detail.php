<?php $this->load->view('home/header1'); ?>
<div class="container-fluid padding2">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 col-lg-9">
        <div class="logo">
          <img src="<?php echo base_url('public/admin/images/mybio23-01.png'); ?>" alt="">
        </div>
      </div>
      <div class="col-md-6 col-lg-3 text-right">
        <div class="iner-page-sign">
          <?php
          if(!empty($this->session->userdata('u_id')))
          {
          ?>
          <div class="in-sign">
            <a href="<?php echo base_url('user-dashboard'); ?>">
              <i class="fas fa-user">
              </i>Hello 
              <?php echo $this->session->userdata('u_name'); ?>,
            </a>
          </div>
          <?php
          }
          else
          {
          ?>
          <div class="in-sign">
            <a href="<?php echo base_url('signin'); ?>">
              <i class="fas fa-user">
              </i>Sign In
            </a>
          </div>
          <?php
          }
          ?>
          <div class="in-sign border-left">
            <a href="<?php echo base_url('cart'); ?>">
              <i class="fas fa-cart-plus">
              </i>
            </a>
            <div class="cart-badge">
              1
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container padding2">
  <div class="row align-items-center">
    <div class="col-md-4 col-lg-2">
      <div class="back-home d-flex">
        <div class="go-home">
          <a href="<?php echo base_url('/'); ?>">
            <i class="fas fa-long-arrow-alt-left mr-2">
            </i>Home
          </a>
        </div>
        <div class="go-home">
          <a href="#">/  product Kit
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container padding">
  <div class="text-center mb-5">
    <h4>About Product
    </h4>
    <hr class="green-hr mx-auto">
  </div>
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="more-box ">
        <div class="more-heading">
          <h4 class="m-0">
            <?php echo $product->p_name; ?>
          </h4>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="know-mr-img p-2">
              <img class="img-fluid" width="100%" height="500px" src="<?php echo base_url('public/product/').$product->p_image; ?>"  alt="">
            </div>
          </div>
          <div class="col-md-7">
            <div class="more-content p-3">
              <h5 class="m-0 text-muted">
                <?php echo $product->p_description; ?>
              </h5>
            </div>
            <div class="p-3">
              <h6 class="">SKU : (
                <span class="clr">
                  <?php echo $product->p_sku_code; ?>
                </span>)
              </h6>
              <div class="more-price d-flex">
                <h6> Price : 
                </h6>
                <p class="m-0  mr-2">
                  <del>
                    <?php echo '$'. $product->p_mrp; ?>
                  </del>
                </p>
                <h5 class="clr">
                  <?php echo '$'. $product->p_price; ?>
                </h5>
              </div>
              <?php
              $user_id = $this->session->userdata('u_id');
              
              if(!empty($user_id))
              {
                $this->db->select('*');
                $this->db->order_by('ca_id','desc');
                $this->db->where('ca_user_id',$user_id);
                $select = $this->db->get('tbl_cart_en');
                $cart_value = $select->row();
                $num = $select->num_rows();

                if($num!=0)
                {
                  if($cart_value->ca_type=='T')
                  {
                  ?>
                  <div class="more-btn mt-4 mb-3">
                    <a href=""  data-toggle="modal" data-target="#exampleModalCenter">Add to Cart
                    </a>
                  </div> 
                  <?php
                  }
                  else
                  {
                    ?>
                  <div class="more-btn mt-4 mb-3">
                    <a href="<?php echo base_url('add-to-cart/').$product->p_slug.'/P'.'/'.$product->p_language; ?>">Add to Cart
                    </a>
                  </div> 
                    <?php
                  }
                }
                else
                {
                  ?>
                  <div class="more-btn mt-4 mb-3">
                    <a href="<?php echo base_url('add-to-cart/').$product->p_slug.'/P'.'/'.$product->p_language; ?>">Add to Cart
                    </a>
                  </div> 
                  <?php
                }
              }
              else
              {
                ?>
                <div class="more-btn mt-4 mb-3">
                  <a href="<?php echo base_url('add-to-cart/').$product->p_slug.'/P'.'/'.$product->p_language; ?>">Add to Cart
                  </a>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div> 
    </div>
    <div class="container padding">
      <div class="more-box">
        <div class="row p-3">
          <div class="col-md-2">
            <p>
              <a class="btn btn-success1" data-toggle="collapse" href="#Description" role="button" aria-expanded="false" aria-controls="Description">
                Description
                <i class="fas fa-caret-right">
                </i>
              </a>
            </p>
          </div>
          <div class="col-md-10">
            <div class="collapse show" id="Description">
              <div class="card card-body"  >
                <?php echo $product->p_description; ?>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <p>
              <a class="btn btn-success1" data-toggle="collapse" href="#Disclaimer" role="button" aria-expanded="false" aria-controls="Disclaimer">
                Disclaimer
                <i class="fas fa-caret-right">
                </i>
              </a>
            </p>
          </div>
          <div class="col-md-10">
            <div class="collapse" id="Disclaimer">
              <div class="card card-body"  >
                <?php echo $product->p_disclaimer; ?>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <p>
              <a class="btn btn-success1" data-toggle="collapse" href="#Suggested" role="button" aria-expanded="false" aria-controls="Suggested">
                Suggested Use
                <i class="fas fa-caret-right">
                </i>
              </a>
            </p>
          </div>
          <div class="col-md-10">
            <div class="collapse" id="Suggested">
              <div class="card card-body"  >
                <?php echo $product->p_suggested_use; ?>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <p>
              <a class="btn btn-success1" data-toggle="collapse" href="#Ingredents" role="button" aria-expanded="false" aria-controls="Ingredents">
                Other Ingredents
                <i class="fas fa-caret-right">
                </i>
              </a>
            </p>
          </div>
          <div class="col-md-10">
            <div class="collapse" id="Ingredents">
              <div class="card card-body"  >
                <?php echo $product->p_other_ingredents; ?>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <p>
              <a class="btn btn-success1" data-toggle="collapse" href="#Warnings" role="button" aria-expanded="false" aria-controls="Warnings">
                Warnings
                <i class="fas fa-caret-right">
                </i>
              </a>
            </p>
          </div>
          <div class="col-md-10">
            <div class="collapse" id="Warnings">
              <div class="card card-body"  >
                <?php echo $product->p_warnings; ?>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Item already in Cart
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>
      <div class="modal-body">
        Your cart contains Test from a different lab .Would you like to reset your cart before browsing this product ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No
        </button>

        <button type="button" class="btn more-btn"><a href="<?php echo base_url('replace-cart-item/').$product->p_slug.'/P'.'/'.$product->p_language; ?>">Yes</a>
        </button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('home/footer'); ?>
