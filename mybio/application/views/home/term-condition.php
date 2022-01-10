<?php $this->load->load->view('home/header1'); ?>
<div class="container-fluid padding2">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12 text-center">
        <div class="logo">
          <img src="images/logo.png" alt="">
        </div>
      </div>
      <div class="col-md-3 text-right">
      </div>
    </div>
  </div>
</div>
<div class="container padding">
  <div class="row">
    <div class="col-lg-8 offset-lg-2 col-md-12">
      <div class="privacy-policy">
        <?php echo $terms->tc_message; ?>
      </div>
    </div>
  </div>
</div>
<?php $this->load->load->view('home/footer'); ?>