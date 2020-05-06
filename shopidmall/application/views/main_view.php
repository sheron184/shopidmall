<!-- 
====  VERSION: 0.51  ==== 
====  SJ TECCH       ====
-->
<!DOCTYPE html>
<html>
    <head>
        <title>eBay</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/common.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/sell_view.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/store.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/footer.css">
        <link href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>/assets/jquery.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>/assets/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://checkout.stripe.com/checkout.js"></script>
        <script src="<?php echo base_url(); ?>/assets/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/myJs/common.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/myJs/stripe.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/myJs/store.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/myJs/buy.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/myJs/shop.js" type="text/javascript"></script>
    </head>
    <body>
       
        <div id="fade"></div>
        <div class="main-bar shadow-sm">
          <div class="container">
              <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <nav class="navbar navbar-expand-lg p-0 text-dark">
                                <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i style="font-size: 30px;" class="navbar-toggler-icon fa fa-navicon"></i>
                                </a>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <?php if(!$this->session->userdata('logged_in')): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url();?>users">Login</a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($this->session->userdata('logged_in')): ?>
                                        <li class="nav-item">
                                            <a class="nav-link text-danger" href="<?php echo base_url();?>users/logout">Logout</a>
                                        </li>
                                        <?php endif; ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url();?>">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url();?>sell">Sell</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url();?>shop">Shop</a>
                                        </li>
                                    </ul>
                                </div>
                              </nav>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
                            <nav class="navbar navbar-expand-lg p-0 text-dark">
                                <!--
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                -->
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url(); ?>dashboard">Dashboard<span class="sr-only"></span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url(); ?>buy">WishList</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url(); ?>store">Store</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=""><i class="fa fa-bell" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url(); ?>cart">
                                                <i class="fa fa-shopping-cart" aria-hidden="true">
                                                    <p class="badge badge-danger position-absolute my_badge">
                                                        <?php if($this->session->userdata('logged_in')): ?>
                                                        <?php echo $cart_items; ?>
                                                        <?php endif; ?>
                                                    </p>
                                                </i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div>
            <?php if($this->session->flashdata('register')): ?>
                <div class="alert alert-success"> 
                    <?php echo $this->session->flashdata('register'); ?>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('login')): ?>
                <div class="alert alert-success"> 
                    <?php echo $this->session->flashdata('login'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php $this->load->view($view); ?>
    <section class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 pt-3 pb-3 column_p">
                    <div class="list_header"><h6 class="text-white footer_text">Users</h6></div>
                    <ul class="list-group mylist pt-2">
                        <li class=""><a href="#">Dashboard</a></li>
                        <li class=""><a href="#">Shop</a></li>
                        <?php if($this->session->userdata('logged_in')): ?>
                           <li class=""><a href="#">Logout</a></li>
                           <?php else: ?>
                            <li class=""><a href="#">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 pt-3 pb-3 column_p">
                    <div class="list_header"><h6 class="text-white footer_text">Categories</h6></div>
                        <ul class="list-group mylist pt-2">
                            <?php foreach($categories as $category): ?>
                                <li><a href="#"><?php echo $category->category_name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 pt-3 pb-3 column_p">
                    <div class="list_header"><h6 class="text-white footer_text">Store</h6></div>
                    <ul class="list-group mylist pt-2">
                        <li class=""><a href="#">Items</a></li>
                        <li class=""><a href="#">Sold</a></li>
                        <li class=""><a href="#">Stocks</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 pt-3 pb-3 column_p">
                    <div class="list_header"><h6 class="text-white footer_text">Contact us</h6></div>
                    <ul class="list-group mylist pt-2">
                        <li class="text-white"><a>companyemail@gmail.com</a></li>
                        <li class="text-white"><a>+987743890</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center"><p class="text-center text-white m-0"><i class="fa fa-copyright text-white fa1"></i><i class="i_text">All rights recevied.</i> <i class="i_text">Designed and created by SJ Technologies</i></p></div>
                
            </div>
        </div>
    </section>
    </body>
</html>