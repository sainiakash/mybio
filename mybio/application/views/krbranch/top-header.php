
<div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <div id="google_translate_element"></div>

               <!--  <script type="text/javascript">
                function googleTranslateElementInit() {
                  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                }
                </script>

                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

              <?php
              $id = $this->session->userdata('b_kr_id');
              $lang = $this->session->userdata('b_kr_language');
              $data = $this->BM->edit_profile($id,$lang);
              ?>
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <?php
                  if($lang=='EN')
                  {
                  ?>
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <?php
                      if($data->b_image!='')
                      {
                      ?>
                      <img src="<?php echo base_url('public/branch/').$data->b_image; ?>" alt=""><?php echo $this->session->userdata('b_name'); ?>
                      <?php
                      }
                      else
                      {
                      ?>
                        <img src="<?php echo base_url('public/admin/images/img.jpg'); ?>" alt=""><?php echo $this->session->userdata('b_name'); ?>
                      <?php
                      }
                      ?>
                    </a>
                  <?php
                  }
                  elseif($lang=='KR')
                  {
                    
                    ?>
                     <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <?php
                      if($data->b_kr_image!='')
                      {
                      ?>
                      <img src="<?php echo base_url('public/branch/').$data->b_kr_image; ?>" alt=""><?php echo $this->session->userdata('b_kr_name'); ?>
                      <?php
                      }
                      else
                      {
                      ?>
                        <img src="<?php echo base_url('public/boy.png'); ?>" alt=""><?php echo $this->session->userdata('b_kr_name'); ?>
                      <?php
                      }
                      ?>
                    </a>
                    <?php
                  }
                  else
                  {
                    echo "";
                  }
                  ?>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url('branch-profile'); ?>">프로필</a>
                      <a class="dropdown-item" href="<?php echo base_url('branch-password'); ?>">비밀번호 변경</a>
                    <a class="dropdown-item" href="<?php echo base_url('branch-logout'); ?>"><i class="fa fa-sign-out pull-right"></i> 로그 아웃</a>
                  </div>
                </li> 
              </ul>
            </nav>
          </div>