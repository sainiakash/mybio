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
                <h3>지점 통제</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url('branch-dashboard'); ?>"><i class="fa fa-home"></i>집</a>
                  </li>
                    <li><a><i class="fas fa-cubes pr-2" style="font-size: 19px;"></i>주인<span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                       <li><a href="<?php echo base_url('branch-manage-test'); ?>">테스트</a></li>
                       <li><a href="<?php echo base_url('branch-manage-kit'); ?>">전부</a></li>
                       <li><a href="<?php echo base_url('branch-manage-category'); ?>">범주</a></li>
                       <li><a href="<?php echo base_url('branch-manage-product'); ?>">제품</a></li>
                       <li><a href="<?php echo base_url('branch-registered-user'); ?>">등록 된 사용자들</a></li>
                     </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i>직원<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('branch-staff'); ?>">직원 추가</a></li>
                      <li><a href="<?php echo base_url('branch-manage-staff'); ?>">직원 관리
                    </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-calendar"></i>타임슬롯<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('branch-timeslot'); ?>">타임슬롯 추가</a></li>
                      <li><a href="<?php echo base_url('branch-manage-timeslot'); ?>">타임슬롯 관리</a></li>
                    </ul>
                  </li>
                  <li>
                    <a>
                      <i  class="fas fa-calendar-check pr-2" style="font-size: 19px;">
                      </i>약속 내역
                      <span class="fa fa-chevron-down">
                      </span>
                    </a>
                    <ul class="nav child_menu">
                       <li><a href="<?php echo base_url('branch-appointment-history'); ?>">약속 내역
                        </a>
                       </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/0'); ?>">약속 대기 중</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/1'); ?>">약속 확인
                      </a>
                      </li>
                        <li><a href="<?php echo base_url('branch-appointmenthistory/2'); ?>">약속 처리</a>
                      </li>
                      <li><a href="<?php echo base_url('branch-appointmenthistory/3'); ?>">약속 취소
                      </a>
                      </li>
                        <li><a href="<?php echo base_url('branch-appointmenthistory/4'); ?>">약속 완료
                      </a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fas fa-question-circle pr-2" style="font-size: 19px;"></i>도움말 지원
                  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('branch-ticket'); ?>">티켓 추가
                          </a></li>
                      <li><a href="<?php echo base_url('branch-manage-ticket'); ?>">티켓 관리</a></li>
                    </ul>
                  </li>
                  <li>
                    <a>
                      <i class="fas fa-user-cog pr-2" style="font-size: 19px;"></i>지점 설정
                      <span class="fa fa-chevron-down">
                      </span>
                    </a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo base_url('branch-profile'); ?>">프로필 업데이트
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('branch-password'); ?>">비밀번호 변경
                        </a>
                      </li>
                    </ul>
                  </li>
                  
                  <li>
                    <a href="<?php echo base_url('branch-logout'); ?>">
                      <i class="fa fa-sign-out">
                      </i>로그 아웃
                      </span>
                  </a>
                </li>                   
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>