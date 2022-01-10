<?php $this->load->view('home/header1'); ?>
<div class="container-fluid padding2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-9">
                <div class="logo">
                    <img src="images/logo.png" alt="">
                  </div>
            </div>
            <div class="col-md-6 col-lg-3 text-right">
                <div class="iner-page-sign">
                    <div class="in-sign">
                        <a href="sign-in.html"><i class="fas fa-user"></i>Sign In</a>
                    </div>
                    <div class="in-sign border-left">
                        <a href="cart.html"><i class="fas fa-cart-plus"></i>Cart</a>
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
                    <a href="<?php echo base_url('user-dashboard') ?>"><i class="fas fa-long-arrow-alt-left mr-2"></i>My Page</a>
                </div>
                <div class="go-home">
                    <a href="<?php echo base_url(); ?>">/  Home</a>
                </div>
            </div>
        </div>
       
    </div>
</div>


<div class="container padding">
    <div class="row">
        <div class="col-md-12 mb-3 text-center">
            <div class="text-center reward-point">
                <h1>10</h1>
                <h6>REWARD POINTS</h6>
            </div>
        </div>
        <div class="col-md-6 offset-md-3 mb-4">
            <div class="reward-point-box">
                <div class="total-point">
                    <div class="point-icon mr-3">
                       <img src="images/icons8-prize-96.png" alt="">
                    </div>
                    <div class="point-text">
                        <h4>Total Points</h4>
                        <p class="text-muted">Use With Restrictions</p>
                    </div>
                </div>
                <div class="point-count">
                    <h4>10</h4>
                </div>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 mb-4">
            <div class="reward-transaction-box">
                <div class="reward-transaction">
                    <h4>Reward Transactions</h4>
                </div>
                <div class="reward-transaction-view">
                    <a href="<?php echo base_url('reward-history'); ?>">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('home/footer'); ?>