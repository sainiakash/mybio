<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="<?php echo base_url('dashboard'); ?>" class="site_title">
      <span><img width="80px" class="ml-5" src="<?php echo base_url('public/admin/images/Logo.png');?>">
      </span>
    </a>
  </div>
  <div class="clearfix">
  </div>
  <br/>
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section active">
      <h3>Admin Controls
      </h3>
      <ul class="nav side-menu">
        <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="fa fa-home">
            </i>Home
          </a>
        </li>
        <li>
          <a>
            <i class="fa fa-cubes">
            </i>Master 
            <span class="fa fa-chevron-down">
            </span>
          </a>
          <ul class="nav child_menu">
            <li>
              <a>Banner
                <span class="fa fa-chevron-down">
                </span>
              </a>
              <ul class="nav child_menu">
                <li>
                  <a href="<?php echo base_url('banner'); ?>">Add Banner
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url('managebanner'); ?>">Manage Banner
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a>Category
                <span class="fa fa-chevron-down">
                </span>
              </a>
              <ul class="nav child_menu">
                <li>
                  <a href="<?php echo base_url('category'); ?>">Add Category
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url('managecategory'); ?>">Manage Category
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a>News
                <span class="fa fa-chevron-down">
                </span>
              </a>
              <ul class="nav child_menu">
                <li>
                  <a href="<?php echo base_url('news'); ?>">Add News
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url('managenews'); ?>">Manage News
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a>Location
                <span class="fa fa-chevron-down">
                </span>
              </a>
              <ul class="nav child_menu">
                <li>
                  <a href="<?php echo base_url('location'); ?>">Add Location
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url('managelocation'); ?>">Manage Location
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a>Testimonials
                <span class="fa fa-chevron-down">
                </span>
              </a>
              <ul class="nav child_menu">
                <li>
                  <a href="<?php echo base_url('testimonial'); ?>">Add Testimonials
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url('managetestimonial'); ?>">Manage Testimonials
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="<?php echo base_url('privacypolicy'); ?>">Privacy Policy
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('termsconditions'); ?>">Terms & Condition
              </a>
            </li>
          </ul> 
        </li> 
        <li>
          <a>
            <i class="fas fa-vial pr-2" style="font-size: 20px;">
            </i> Test
            <span class="fa fa-chevron-down">
            </span>
          </a>
          <ul class="nav child_menu">
            <li>
              <a href="<?php echo base_url('test'); ?>">Add Test
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('managetest'); ?>">Manage Test
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a>
            <i class="fa fa-medkit">
            </i>Kit
            <span class="fa fa-chevron-down">
            </span>
          </a>
          <ul class="nav child_menu">
            <li>
              <a href="<?php echo base_url('kit'); ?>">Add Kit
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('managekit'); ?>">Manage Kit
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a>
            <i class="fas fa-archive pr-2" style="font-size: 19px;">
            </i> Product
            <span class="fa fa-chevron-down">
            </span>
          </a>
          <ul class="nav child_menu">
            <li>
              <a href="<?php echo base_url('product'); ?>">Add Product
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('manageproduct'); ?>">Manage Product
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a>
            <i class="fa fa-sitemap">
            </i>Branch
            <span class="fa fa-chevron-down">
            </span>
          </a>
          <ul class="nav child_menu">
            <li>
              <a href="<?php echo base_url('branch'); ?>">Add Branch
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('managebranch'); ?>">Manage Branch
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a>
           <i class="fas fa-badge-percent pr-2" style="font-size: 19px;">
             </i> Coupon
            <span class="fa fa-chevron-down">
            </span>
          </a>
          <ul class="nav child_menu">
            <li>
              <a href="<?php echo base_url('coupon'); ?>">Add Coupon
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('managecoupon'); ?>">Manage Coupon
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a>
           <i class="fas fa-sitemap pr-2" style="font-size: 19px;">
             </i> Subscription Plan
            <span class="fa fa-chevron-down">
            </span>
          </a>
          <ul class="nav child_menu">
            <li>
              <a href="<?php echo base_url('subscription'); ?>">Add Subscription
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('managesubscription'); ?>">Manage Subscription
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a>
            <i class="fa fa-line-chart">
            </i>Reports
            <span class="fa fa-chevron-down">
            </span>
          </a> 
          <ul class="nav child_menu"> 
            <li>
              <a href="<?php echo base_url('registereduser'); ?>">Registered User
                </span>
            </a>
            </li>
            <li>
              <a href="<?php echo base_url('manageenquiry'); ?>">Manage Enquiry
                </span>
            </a>
            </li> 
            <li>
              <a href="<?php echo base_url('appointment-history'); ?>">Appointment History
                </span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('order-history'); ?>">Order History
                </span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('timeslot'); ?>">Branch Timeslot
                </span>
              </a>
            </li>
            </ul> 
          </li>
          <li>
            <a>
              <i class="fas fa-calendar-check pr-2" style="font-size: 19px;">                
              </i> Appointments History
              <span class="fa fa-chevron-down">
              </span>
            </a>
            <ul class="nav child_menu">
              <li>
                <a href="<?php echo base_url('appointmenthistory/0'); ?>">Apointment Pending
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('appointmenthistory/1'); ?>">Apointment Confirm
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('appointmenthistory/2'); ?>">Apointment Processing
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('appointmenthistory/3'); ?>">Apointment Cancel
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('appointmenthistory/4'); ?>">Apointment Completed
                </a>
              </li>
            </ul>
          </li>
          <li><a><i class="fa fa-truck"></i>Orders<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('orderhistory/0'); ?>">Order Pending</a></li>
              <li><a href="<?php echo base_url('orderhistory/1'); ?>">Order Confirmed</a></li>
              <li><a href="<?php echo base_url('orderhistory/2'); ?>">Order Processing</a></li>
              <li><a href="<?php echo base_url('orderhistory/3'); ?>">Order Shipped</a></li>
              <li><a href="<?php echo base_url('orderhistory/4'); ?>">Order Delivered</a></li>
              <li><a href="<?php echo base_url('orderhistory/5'); ?>">Order Cancel</a></li>
              <li><a href="<?php echo base_url('orderhistory/4'); ?>">Order Kit Received</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-dollar"></i>Payment<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('payment/Home'); ?>">Home</a></li>
              <li><a href="<?php echo base_url('payment/Lab'); ?>">Lab</a></li>
            </ul>
          </li>
          <li>
            <a>
              <i class="fa fa-user">
              </i>Admin Settings
              <span class="fa fa-chevron-down">
              </span>
            </a>
            <ul class="nav child_menu">
              <li>
                <a href="<?php echo base_url('editprofile'); ?>">Profile Update
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('changepassword'); ?>">Change Password
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="<?php echo base_url('logout'); ?>">
              <i class="fa fa-sign-out">
              </i>Log Out
              </span>
          </a>
          </li>                   
        </ul>
      </div>
    </div>
</div>
