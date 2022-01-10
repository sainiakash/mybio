          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('branch-dashboard')?>" class="site_title text-center pb-3 pr-3">
                <span> <img width="80px" src="<?php echo base_url('public/admin/images/Logo.png'); ?>"> </span></a>
            </div>
            <div class="clearfix"></div>
            <br/>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section active">
                <h3>Branch Controls</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url('branch-dashboard'); ?>"><i class="fa fa-home"></i>Home</a>
                  </li>
                  <li><a><i class="fas fa-cubes pr-2" style="font-size: 19px;"></i>Master<span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                       <li><a href="<?php echo base_url('branch-manage-test'); ?>">Test</a></li>
                       <li><a href="<?php echo base_url('branch-manage-kit'); ?>">Kit</a></li>
                       <li><a href="<?php echo base_url('branch-manage-category'); ?>">Category</a></li>
                       <li><a href="<?php echo base_url('branch-manage-product'); ?>">Products</a></li>
                       <li><a href="<?php echo base_url('branch-registered-user'); ?>">Registered Users</a></li>
                     </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i>Staff<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('branch-staff'); ?>">Add Staff</a></li>
                      <li><a href="<?php echo base_url('branch-manage-staff'); ?>">Manage Staff</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-calendar"></i>Timeslot<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('branch-timeslot'); ?>">Add Timeslot</a></li>
                      <li><a href="<?php echo base_url('branch-manage-timeslot'); ?>">Manage Timeslot</a></li>
                    </ul>
                  </li>
                  <li>
                    <a>
                      <i  class="fas fa-calendar-check pr-2" style="font-size: 19px;">
                      </i>Appointments History
                      <span class="fa fa-chevron-down">
                      </span>
                    </a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('branch-appointment-history'); ?>">Appointment History</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/0'); ?>">Appointment  Pending</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/1'); ?>">Appointment  Confirm</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/2'); ?>">Appointment  Processing</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/3'); ?>">Appointment  Cancel</a>
                      </li>
                        <li><a href="<?php echo base_url('branch-appointmenthistory/4'); ?>">Appointment  Completed</a>
                      </li>
                    </ul>
                  </li>
<!--                   <li>
                    <a>
                      <i  class="fa fa-truck pr-2" style="font-size: 19px;">
                      </i>Orders
                      <span class="fa fa-chevron-down">
                      </span>
                    </a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('branch-appointmenthistory/0'); ?>">Order Pending</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/1'); ?>">Order Confirm</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/2'); ?>">Order Processing</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/3'); ?>">Order Shipped</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointment-history'); ?>">Order Delivered</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointment-history'); ?>">Order Cancel</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/4'); ?>">Order Kit Recieved</a>
                      </li>
                    </ul>
                  </li> -->
                  <li><a><i class="fas fa-question-circle pr-2" style="font-size: 19px;"></i>Help Support<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('branch-ticket'); ?>">Add Ticket</a></li>
                      <li><a href="<?php echo base_url('branch-manage-ticket'); ?>">Manage Ticket</a></li>
                    </ul>
                  </li>
                  <li>
                    <a>
                      <i class="fas fa-user-cog pr-2" style="font-size: 19px;"></i>Branch Settings
                      <span class="fa fa-chevron-down">
                      </span>
                    </a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo base_url('branch-profile'); ?>">Profile Update
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('branch-password'); ?>">Change Password
                        </a>
                      </li>
                    </ul>
                  </li>
                  
                  <li>
                    <a href="<?php echo base_url('branch-logout'); ?>">
                      <i class="fa fa-sign-out">
                      </i>Log Out
                      </span>
                    </a>
                  </li>                   
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>