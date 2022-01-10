<?php $this->load->view('home/header'); ?>
    <div class="other-page">
      <div class="other-heading text-center text-white">
        <h1>Contact</h1>
        <p>Home / Contact</p>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
 <div class="contact-us">
   <div class="container padding">
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
        <div class="contact-us-box">
          <div class="contact-us-heading text-center">
            <h4>Contact Us</h4>
            <hr class="green-hr mx-auto">
          </div>
          <?php
          if(!empty($this->session->flashdata('success')))
          {
          ?>
          <h6 class="text text-center text-success"><?php echo $this->session->flashdata('success'); ?></h6>
          <?php
          }
          ?>  
          <form action="<?php echo base_url('contact-us-post'); ?>" method="POST">
          <div class="row">
            <div class="col-md-6 mt-5">
              <div class="contact-input">
                <input type="text" placeholder="Your First Name" name="first_name" value="<?php echo set_value('first_name'); ?>">
                <div class="text text-danger"><?php echo form_error('first_name'); ?></div>
              </div>
            </div>
            <div class="col-md-6 mt-5 mb-5">
              <div class="contact-input">
                <input type="text" placeholder="Your Last Name" name="last_name" value="<?php echo set_value('last_name'); ?>">
                <div class="text text-danger"><?php echo form_error('last_name'); ?></div>
              </div>
            </div>
            <div class="col-md-6  mb-5">
              <div class="contact-input">
                <input type="text" placeholder="Your Mobile Number" name="mobile" value="<?php echo set_value('mobile'); ?>">
                <div class="text text-danger"><?php echo form_error('mobile'); ?></div>
              </div>
            </div>
            <div class="col-md-6  mb-5">
              <div class="contact-input">
                <input type="text" placeholder="Your Email ID" name="email" value="<?php echo set_value('email'); ?>">
                <div class="text text-danger"><?php echo form_error('email'); ?></div>
              </div>
            </div>
            <div class="col-md-12 mb-5">
              <div class="contact-input">
                <textarea name="message" rows="5" placeholder="Write Your Message Here"><?php echo set_value('message'); ?></textarea>
                <div class="text text-danger"><?php echo form_error('message'); ?></div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="contact-input">
                <input type="submit" name="send" value="Send Message" style="background-color:#70b544; color:#fff;cursor: pointer;">
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="contact-detail border-r">
              <div class="contact-icon">
                <span><a style="color: #70B544;" href="tel:408-458-9988"><i class="fas fa-phone"></i></a></span>
              </div>
              <div class="contact-info">
                <h4>408-458-9988</h4>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="contact-detail">
              <div class="contact-icon">
                <span><a style="color: #70B544;" href="mailto:info@mybio21.com"><i class="far fa-envelope"></i></a></span>
              </div>
              <div class="contact-info">
                <h4>info@mybio21.com</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
 </div>
</div>
<?php $this->load->view('home/footer'); ?>