<?php $this->load->view('home/header1'); ?>


<div class="container-fluid padding2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9">
                <div class="logo">
                    <img src="images/logo.png" alt="">
                  </div>
            </div>
            <div class="col-md-3 text-right">
                <div class="iner-page-sign">
                    <div class="in-sign">
                        <a href="<?php echo base_url('signin'); ?>"><i class="fas fa-user"></i>Sign In</a>
                    </div>
                    <div class="in-sign border-left">
                        <a href="<?php echo base_url('cart'); ?>"><i class="fas fa-cart-plus"></i>Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container padding2">
    <div class="row align-items-center">
        <div class="col-md-2">
            <div class="back-home d-flex">
                <div class="go-home">
                    <a href="<?php echo base_url('/'); ?>"><i class="fas fa-long-arrow-alt-left mr-2"></i>Home</a>
                </div>
                <div class="go-home">
                    <a href="">/  Test Kit</a>
                </div>
            </div>
        </div>
       
    </div>
</div>
<div class="container-fluid">
    <div class="container padding">
        <div class="row">
            <div class="col-md-12">
                <div class="lab-report-box">
                    <div class="book-know-new-btn">
                        <a href="<?php echo base_url('home/branchcategory');?>">
                            <div >
                                <p class="m-0 text-white">Book Now</p>
                            </div>
                            <div class="book-know-new-arrow">
                                <span>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="lab-report-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="lab-report-name">
                                    <h5 class="m-0 text-white pb-2"><?php echo $lab->b_name; ?></h5>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="lab-report-text-box">
                                <div class="lab-report-btn">
                                    <button>Lab Report</button>
                                </div>
                                <div class="lab-report-text pt-4">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa voluptatibus harum temporibus ad nihil at, dolores illum eaque tempora eveniet ullam vero quisquam ratione atque consequuntur obcaecati nam beatae sint inventore sapiente voluptates ea! Animi voluptatibus ducimus inventore impedit explicabo modi, ab numquam dignissimos pariatur! Ratione dicta in aut ducimus, explicabo ut deserunt veritatis enim deleniti nam amet neque ipsum quae officia, minus impedit non ipsam facere assumenda ab dolores. Perferendis in dolor inventore corrupti officia a velit quod nihil fugit assumenda cumque nulla sint iure consequatur beatae repudiandae sapiente incidunt, earum voluptatum nesciunt tempora id, eum reprehenderit! Unde, quia?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container padding">
<!--     <div class="text-center">
        <h4>Most Searched DNA Test</h4>
        <hr class="black-hr mx-auto">
    </div> -->
    <div class="bbb_main_container">
                    <div class="bbb_viewed_title_container">
                       <div class="test-us1">
                          <h4>Most Searched DNA Test</h4>
                          </div>
                        <div class="bbb_viewed_nav_container">
                            <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>
                    <div class="bbb_viewed_slider_container">
                        <div class="owl-carousel owl-theme bbb_viewed_slider">
                            <?php
                            foreach($test as $values)
                            {
                            ?>
                            <div class="owl-item test-box3">
                                <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="bbb_viewed_image">
                                     <img src="<?php echo base_url('public/test/').$values['t_image']; ?>"  alt="">
                                    </div>
                                    <div class="bbb_viewed_content text-center">
                                        <div class="bbb_viewed_price"><?php echo $values['t_price']; ?><span><?php echo $values['t_mrp']; ?></span></div>
                                        <div class="bbb_viewed_name mb-2"><a href="#"><?php echo $values['t_name']; ?></a></div>
                                       <div class="know-more-btn2"><a href="<?php echo base_url('test-detail/').$values['t_id']; ?>">Know More</a></div>
                                        </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
</div>
<?php $this->load->view('home/footer'); ?>