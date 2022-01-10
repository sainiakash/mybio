<?php $this->load->view('home/header1'); ?>
<div class="container-fluid padding2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9">
                <div class="logo">
                    <img src="<?php echo base_url('public/home/assets/images/logo.png'); ?>" alt="">
                  </div>
            </div>
            <div class="col-md-6 col-lg-3 text-right">
                <div class="iner-page-sign">
                    <div class="in-sign">
                    <a href="<?php echo base_url('user-dashboard'); ?>"><i class="fas fa-user"></i>Hello <?php echo $this->session->userdata('u_name'); ?>,</a>
                    </div>
                     <?php
                     $this->db->where('ca_user_id',$this->session->userdata('u_id'));
                     $select = $this->db->get('tbl_cart_en');
                     $num = $select->num_rows();
                     ?>
                     <div class="in-sign position-relative  border-left">
                        <a href="<?php echo base_url('cart'); ?>"><i class="fas fa-cart-plus"></i></a>
                        <div class="cart-badge">
                          <span><?php echo $num; ?></span>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container padding2">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-4">
            <div class="back-home d-flex">
                <div class="go-home">
                    <a href="<?php echo base_url('user-dashboard'); ?>"><i class="fas fa-long-arrow-alt-left mr-2"></i>My Page</a>
                </div>
                <div class="go-home">
                    <a href="<?php echo base_url(); ?>">/ Home</a>
                </div>
            </div>
        </div>
       
    </div>
</div>
<div class="container padding">
    <div class="row">
        <div class="col-md-8">
            <?php
            $lang='EN';
            $id = $this->session->userdata('u_id');
            foreach($cart as $values)
            {
                if($values['ca_type']=='P')
                {
                    $data = $this->AD->edit_product($values['ca_product_id'],$lang);
                ?>
                    <div class="cart-item mt-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="cart-product-img-box text-center">
                                    <img src="<?php echo base_url('public/product/').$data->p_image; ?>" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-item-box">
                                    <div class="product-name">
                                        <h4><?php echo $data->p_name; ?><sup>&reg;</sup></h4>
                                        <p class="text-muted mb-0">Sku Code: <?php echo $data->p_sku_code; ?></p>
                                    </div>
                                    <div class="product-pricing mt-2">
                                        <div class="new-price mr-3">
                                            <p class="font-weight-bold">$ <?php echo $data->p_price; ?></p>
                                        </div>
                                        <div class="old-price mr-3">
                                            <p class="text-muted small"><del>$ <?php echo $data->p_mrp; ?></del></p>
                                        </div>
                                    </div>
                                    <div class="qty-box">
                                        <select id="qty<?php echo $data->p_id; ?>" onchange="updateQty('<?php echo $data->p_id; ?>')">
                                            <option values="" selected disabled>
                                                Qty : <?php echo $values['ca_qty']; ?>
                                            </option>
                                            <option values="1">
                                                Qty : 1
                                            </option>
                                            <option value="2">
                                                Qty : 2
                                            </option>
                                            <option value="3">
                                                Qty : 3
                                            </option>
                                            <option value="4">
                                                Qty : 4
                                            </option>
                                            <option value="5">
                                                Qty : 5
                                            </option>
                                            <option value="6">
                                                Qty : 6
                                            </option>
                                            <option value="7">
                                                Qty : 7
                                            </option>
                                            <option value="8">
                                                Qty : 8
                                            </option>
                                            <option value="9">
                                                Qty : 9
                                            </option>
                                            <option value="10">
                                                Qty : 10
                                            </option>
                                        </select>
                                    </div>
                                    <div class="del-date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="close">
                                    <span title="Remove" id="close" onclick="removeItem('<?php echo $data->p_id; ?>')"><i class="fas fa-times"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                elseif($values['ca_type']=='T')
                {
                    $data = $this->AD->edit_test($values['ca_product_id'],$lang);
                    ?>
                    <div class="cart-item mt-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="cart-product-img-box text-center">
                                    <img src="<?php echo base_url('public/test/').$data->t_image; ?>" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-item-box">
                                    <div class="product-name">
                                        <h4><?php echo $data->t_name; ?><sup>&reg;</sup></h4>
                                        <p class="text-muted mb-0">Sku Code: <?php echo $data->t_code; ?></p>
                                    </div>
                                    <div class="product-pricing mt-2">
                                        <div class="new-price mr-3">
                                            <p class="font-weight-bold">$ <?php echo $data->t_price; ?></p>
                                        </div>
                                        <div class="old-price mr-3">
                                            <p class="text-muted small"><del>$ <?php echo $data->t_mrp; ?></del></p>
                                        </div>
                                    </div>
                                    <div class="qty-box">
                                        <select id="qty<?php echo $data->t_id; ?>" onchange="updateQty('<?php echo $data->t_id; ?>')">
                                            <option values="" selected disabled>
                                                Qty : <?php echo $values['ca_qty']; ?>
                                            </option>
                                            <option values="1">
                                                Qty : 1
                                            </option>
                                            <option value="2">
                                                Qty : 2
                                            </option>
                                            <option value="3">
                                                Qty : 3
                                            </option>
                                            <option value="4">
                                                Qty : 4
                                            </option>
                                            <option value="5">
                                                Qty : 5
                                            </option>
                                            <option value="6">
                                                Qty : 6
                                            </option>
                                            <option value="7">
                                                Qty : 7
                                            </option>
                                            <option value="8">
                                                Qty : 8
                                            </option>
                                            <option value="9">
                                                Qty : 9
                                            </option>
                                            <option value="10">
                                                Qty : 10
                                            </option>
                                        </select>
                                    </div>
                                    <div class="del-date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="close">
                                    <span title="Remove" id="close" onclick="removeItem('<?php echo $data->t_id; ?>')"><i class="fas fa-times"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                elseif($values['ca_type']=='K')
                {
                    $data = $this->AD->edit_kit($values['ca_product_id'],$lang);
                    ?>
                    <div class="cart-item mt-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="cart-product-img-box text-center">
                                    <img src="<?php echo base_url('public/kit/').$data->k_image; ?>" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-item-box">
                                    <div class="product-name">
                                        <h4><?php echo $data->p_name; ?><sup>&reg;</sup></h4>
                                        <p class="text-muted mb-0">Sku Code: <?php echo $data->k_sku_code; ?></p>
                                    </div>
                                    <div class="product-pricing mt-2">
                                        <div class="new-price mr-3">
                                            <p class="font-weight-bold">$ <?php echo $data->k_price; ?></p>
                                        </div>
                                        <div class="old-price mr-3">
                                            <p class="text-muted small"><del>$ <?php echo $data->k_mrp; ?></del></p>
                                        </div>
                                    </div>
                                    <div class="qty-box">
                                        <select id="qty<?php echo $data->p_id; ?>" onchange="updateQty('<?php echo $data->k_id; ?>')">
                                            <option values="" selected disabled>
                                                Qty : <?php echo $values['ca_qty']; ?>
                                            </option>
                                            <option values="1">
                                                Qty : 1
                                            </option>
                                            <option value="2">
                                                Qty : 2
                                            </option>
                                            <option value="3">
                                                Qty : 3
                                            </option>
                                            <option value="4">
                                                Qty : 4
                                            </option>
                                            <option value="5">
                                                Qty : 5
                                            </option>
                                            <option value="6">
                                                Qty : 6
                                            </option>
                                            <option value="7">
                                                Qty : 7
                                            </option>
                                            <option value="8">
                                                Qty : 8
                                            </option>
                                            <option value="9">
                                                Qty : 9
                                            </option>
                                            <option value="10">
                                                Qty : 10
                                            </option>
                                        </select>
                                    </div>
                                    <div class="del-date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="close">
                                    <span title="Remove" id="close" onclick="removeItem('<?php echo $data->k_id; ?>')"><i class="fas fa-times"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else
                {
                    echo "Your Cart ie empty !";
                }
            }
            
            ?>
        </div> 
        <div class="col-md-4">
            <?php
            $subtotal=0;
            $grandtotal=0;

            foreach($cart as $values)
            {
                if($values['ca_type']=='P')
                {
                    // Get grand total
                    $this->db->select('*');
                    $this->db->order_by('ca_id','desc');
                    $this->db->where('ca_user_id',$id);
                    $this->db->join('tbl_product_en','tbl_product_en.p_id = tbl_cart_en.ca_product_id');
                    $select = $this->db->get('tbl_cart_en');
                    $total = $select->result_array();

                    foreach($total as $values)
                    {
                        $subtotal = $values['p_price']*$values['ca_qty'];
                        $grandtotal+=$subtotal;
                    }
                }
                elseif($values['ca_type']=='T')
                {
                    // Get grand total
                    $this->db->select('*');
                    $this->db->order_by('ca_id','desc');
                    $this->db->where('ca_user_id',$id);
                    $this->db->join('tbl_test_en','tbl_test_en.t_id = tbl_cart_en.ca_product_id');
                    $select = $this->db->get('tbl_cart_en');
                    $total = $select->result_array();

                    foreach($total as $values)
                    {
                        $subtotal = $values['t_price']*$values['ca_qty'];
                        $grandtotal+=$subtotal;
                    }
                }
                elseif($values['ca_type']=='K')
                {
                    // Get grand total
                    $this->db->select('*');
                    $this->db->order_by('ca_id','desc');
                    $this->db->where('ca_user_id',$id);
                    $this->db->join('tbl_kit_en','tbl_kit_en.p_id = tbl_cart_en.ca_product_id');
                    $select = $this->db->get('tbl_cart_en');
                    $total = $select->result_array();

                    foreach($total as $values)
                    {
                        $subtotal = $values['k_price']*$values['ca_qty'];
                        $grandtotal+=$subtotal;
                    }
                }
                else
                {
                    echo "";
                }
            }
            ?>
            <div class="cart-price-box2 mt-4">
              <div class="border-bottom py-3">
                <div class="row">
                  <div class="col-md-6">
                    <h5 class="text-muted">Subtotal</h6>
                  </div>
                  <div class="col-md-6 text-right">
                    <h5 class="clr"><?php echo "$", $grandtotal; ?></h6>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <h6 class="clr">Total Payable</h6>
                </div>
                <div class="col-md-6 text-right">
                  <h5 class="clr"><?php echo "$", $grandtotal; ?></h5>
                </div>
                <div class="col-md-12 mt-2">
                  <div class="pay-btn text-center">
                    <a href="<?php echo base_url('home/checkout'); ?>"><button>PROCEED TO PAY</button></a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('home/footer'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
  function updateQty(id)
  {
    var qty = $('#qty'+id).val();

    $.ajax({
      method:'POST',
      data:{product_id:id,quantity:qty},
      url:"<?php echo base_url(); ?>home/updatecartproduct",
      success:function(data)
      {
        location.reload();
      } 
    }
    );
  } 
  function removeItem(id)
  {
    $.ajax({
      method:'POST',
      data:{product_id:id},
      url:"<?php echo base_url(); ?>home/removecartproduct/",
      success:function(data)
      {
        location.reload();
      }
    }
    );
  }
 
</script>