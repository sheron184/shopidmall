<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/home.css">
       <div class="container header-search">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <nav class="navbar navbar-expand-lg p-0 text-dark d-flex align-items-center">
                       
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                             <ul class="navbar-nav mr-auto after-header-ul w-100">
                                <li class="nav-item">
                                    <!--<a class="nav-link" href="test/indox"><img src="<?php echo base_url(); ?>/assets/images/ebay-logo.png"></a>-->
                                </li>
                                
                                <li class="nav-item">
                                    <form class="d-flex flex-row align-items-center" action="<?php echo base_url() ?>main/search" method="POST">
                                        <div class="form-group mb-0 d-flex align-items-center">
                                          <input type="text" class="form-control" name="search_query">
                                        </div>
                                        <div class="form-grou mb-0 d-flex align-items-center ml-1">
                                          <input class="btn search_btn" type="submit" name="search" value="Search">
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid shadow">
          <div class="row">
            <div class="col-xl-6 col-md-12 col-lg-6 col-sm-12 col-12 shop-now-sec">
                <div class="d-flex flex-row">
                  <div>
                    <h4 class="mb-3 banner-text">A World of<br> Vehicles</h4>
                    <h6 class="mb-3 banner-para">Find the parts you need for cars,<br>motobikes and more.</h6>
                    <a href="<?php echo base_url() ?>shop" class="btn btn-danger mybtn">Shop Now</a>
                  </div>
                  <div>
                    <img class="shopping-img-1" src="<?php echo base_url(); ?>/assets/images/shopping-elec-edited.jpeg">
                  </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-lg-3 col-sm-3 col-3 second-column"></div>
            <div class="col-xl-3 col-md-3 col-lg-3 col-sm-3 col-3 third-column"></div>
          </div>
        </div>
        <div class="container mt-3">
          <div class="row">
              <div class="col-xl-12">
                  <div class="p-3 mt-3">
                    <h4><a>Our Categories</a></h4>
                  </div>
              </div>
              <?php foreach ($categories as $category): ?>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="p-3">
                    <div class="card shadow-sm">
                      <div class="card-header">
                        <h4 class="header-title text-center category_title"><?php echo $category->category_name; ?></h4>
                      </div>
                      <div class="card-body p-0">
                          <img class="category_img" src="<?php echo base_url(); ?>uploads/categories/<?php echo $category->category_pic; ?>">
                      </div>
                      <div class="card-footer d-flex justify-content-center">
                        <a href="<?php echo base_url(); ?>shop/shop_category/<?php echo $category->id; ?>" class="btn mybtn btn-danger">Shop Now</a>
                      </div>
                    </div>
                  </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="container mt-3">
          <div class="row">
              <div class="col-xl-12">
                <div class="p-3 mt-3">
                  <h4><a>Most viewed</a></h4>
                </div>
              </div>
             <?php for ($i=0; $i <4 ; $i++): ?>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="p-3">
                  <div class="card shadow-sm">
                    <div class="card-header">
                      <h4 class="header-title text-center category_title"><?php echo $most_viewed_items[$i][0]->name; ?></h4>
                    </div>
                    <div class="card-body p-0">
                     <img class="category_img" src="<?php echo base_url(); ?>uploads/<?php echo $most_viewed_items[$i][0]->item_pic; ?>">
                    </div>
                    <div class="d-flex justify-content-center card-footer">
                      <a href="#" class="btn"><i class="fa fa-shopping-cart"></i></a>
                  
                      <a href="#" class="btn"><i class="fa fa-heart-o"></i></a>
                 
                  <a href="#" class="btn"><i class="fa fa-credit-card"></i></a>
                </div>
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>

        <div class="container">
          <div class="p-3"><h5 align="center">Why eBay..?</h5></div>
          <div class="row d-flex justify-content-center">
            <div class="col-12 d-flex flex-xl-row flex-lg-row flex-sm-column flex-column flex-md-column justify-content-center">
                <div class="p-4 d-flex justify-content-center flex-column ml-xl-auto mr-xl-auto">
                    <div class="whyebay d-flex justify-content-center align-items-center mr-auto ml-auto"><i class="fa fa-shield"></i></div>
                    <h6 class="mt-3" align="center">Money Back<br> Guarantee</h6>
                </div>
                <div class="p-4 d-flex justify-content-center flex-column ml-xl-auto mr-xl-auto">
                    <div class="whyebay d-flex justify-content-center align-items-center mr-auto ml-auto"><i class="fa fa-diamond"></i></div>
                    <h6 class="mt-3" align="center">Best Service</h6>
                </div>
                <div class="p-4 d-flex justify-content-center flex-column ml-xl-auto mr-xl-auto">
                    <div class="whyebay d-flex justify-content-center align-items-center mr-auto ml-auto"><i class="fa fa-rocket"></i></div>
                    <h6 class="mt-3" align="center">Fast Service</h6>
                </div>
            </div>
          </div>
        </div>
          