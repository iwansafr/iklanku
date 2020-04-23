<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
  <?php $this->load->view('meta') ?>
  <style>
    #whatsapp-chat a {
      position: relative;
      display: block;
      width: 100%;
      height: 100%;
    }
    #whatsapp-chat {
      position: fixed;
      right: 60px;
      bottom: 25px;
      z-index: 9999;
      width: 55px;
      height: 55px;
      opacity: 1;
      border-radius: 50%;
      text-align: center;
      /*font-size: 21px;*/
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="loder"></div>
  <div class="wrapper">
    <div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
      <div class="newsletter-popup"> <img class="offer" src="<?php echo base_url('templates/dark/') ?>images/newsbg.jpg" alt="offer">
        <div class="newsletter-popup-static newsletter-popup-top">
          <div class="popup-text">
            <div class="popup-title">50% <span>off</span></div>
            <div class="popup-desc">
              <div>Sign up and get 50% off your next Order</div>
            </div>
          </div>
          <form onsubmit="return  validatpopupemail();" method="post">
            <div class="form-group required">
              <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email" class="form-control input-lg" required />
              <button type="submit" class="btn btn-default btn-lg" id="email-popup-submit">Subscribe</button>
              <label class="checkme">
                <input type="checkbox" value="" id="checkme" /> Dont show again</label>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- =====  HEADER START  ===== -->
    <header id="header">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="header-top-left">
                <div class="contact"><span class="hidden-xs hidden-sm hidden-md">Days a week from 9:00 am to 7:00 pm</span></div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-8">
              <ul class="header-top-right text-right">
                <li class="account"><a href="login.html">Akun Saya</a></li>
                <!-- <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Language <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">German</a></li>
                  </ul>
                </li>
                <li class="currency dropdown"> <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Currency <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                    <li><a href="#">€ Euro</a></li>
                    <li><a href="#">£ Pound Sterling</a></li>
                    <li><a href="#">$ US Dollar</a></li>
                  </ul>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="main-search mt_40">
                <input id="search-input" name="search" value="" placeholder="Search" class="form-control input-lg" autocomplete="off" type="text">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
              </span> </div>
            </div>
            <div class="navbar-header col-xs-6 col-sm-4"> <a class="navbar-brand" href="index.html"> <img alt="themini" src="<?php echo image_module('config','logo/'.$logo['image']); ?>"> </a> </div>
            <div class="col-xs-6 col-sm-4 shopcart">
              <div id="cart" class="btn-group btn-block mtb_40">
                <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true"><span id="shippingcart">cart</span><span id="cart-total">items (0)</span> </button>
              </div>
              <div id="cart-dropdown" class="cart-menu collapse">
                <ul>
                  <li>
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td class="text-center"><a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/category/billboard.jpg" alt="iPod Classic" title="iPod Classic"></a></td>
                          <td class="text-left product-name"><a href="#">Billboard</a> <span class="text-left price">Rp 1.5000.000</span>
                            <input class="cart-qty" name="product_quantity" min="1" value="1" type="number">
                          </td>
                          <td class="text-center"><a class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                        </tr>
                        <tr>
                          <td class="text-center"><a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/category/billboard.jpg" alt="iPod Classic" title="iPod Classic"></a></td>
                          <td class="text-left product-name"><a href="#">Billboard</a> <span class="text-left price">Rp 1.5000.000</span>
                            <input class="cart-qty" name="product_quantity" min="1" value="1" type="number">
                          </td>
                          <td class="text-center"><a class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                        </tr>
                      </tbody>
                    </table>
                  </li>
                  <li>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Sub-Total</strong></td>
                          <td class="text-right">Rp 3.000.0000</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right">Rp 3.0000.000</td>
                        </tr>
                      </tbody>
                    </table>
                  </li>
                  <li>
                    <form action="cart_page.html">
                      <input class="btn pull-left mt_10" value="View cart" type="submit">
                    </form>
                    <form action="checkout_page.html">
                      <input class="btn pull-right mt_10" value="Checkout" type="submit">
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <nav class="navbar">
            <p>menu</p>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
            <div class="collapse navbar-collapse js-navbar-collapse">
              <ul id="menu" class="nav navbar-nav">
                <li> <a href="index.html">Home</a></li>
                <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Media </a>
                  <ul class="dropdown-menu mega-dropdown-menu row">
                    <li class="col-md-3">
                      <ul>
                        <!-- <li class="dropdown-header">Women's</li> -->
                        <li><a href="#">Billboard</a></li>
                        <li><a href="#">Baliho</a></li>
                        <li><a href="#">JPO (Pedestrian Bridge)</a></li>
                        <li><a href="#">Videotron</a></li>
                        <li><a href="#">Road Sign</a></li>
                        <li><a href="#">Midi Board</a></li>
                        <li><a href="#">Indoor</a></li>
                        <li><a href="#">Lainnya</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li> <a href="#">Tentang Kami</a></li>
                <li> <a href="#">Cara Beriklan</a></li>
                <li> <a href="#">Hubungi Kami</a></li>
                <li> <a href="#">Blog</a></li>
                <li> <a href="#">Login</a></li>
              </ul>
            </div>
            <!-- /.nav-collapse -->
          </nav>
        </div>
      </div>
    </header>
    <!-- =====  HEADER END  ===== -->
    <!-- =====  BANNER STRAT  ===== -->
    <div class="banner">
      <div class="main-banner owl-carousel">
        <div class="item"><a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/slider/slider-1.jpg" style="object-fit: cover; max-height: 420px;" alt="Main Banner" class="img-responsive" /></a></div>
        <div class="item"><a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/slider/slider-2.jpeg" style="object-fit: cover; max-height: 420px;" alt="Main Banner" class="img-responsive" /></a></div>
      </div>
    </div>
    <!-- =====  BANNER END  ===== -->
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <!-- =====  SUB BANNER  STRAT ===== -->
      <div class="row">
        <div class="col-sm-3 col-xs-6 mt_20 cms-icon ">
          <div class="ptb_30 " style="text-align: center;">
            <div class="Shipping"></div>
            <h6>Beragam Jenis Media</h6>
            <p>Pilihan kategori media promosi indoor maupun outdoor.</p>
          </div>
        </div>
        <div class="col-sm-3 col-xs-6 mt_20 cms-icon ">
          <div class="ptb_30 " style="text-align: center;">
            <div class="Order"></div>
            <h6>Promosi Media Sosial</h6>
            <p>Branding gratis berupa posting konten di sosial media Iklanku.</p>
          </div>
        </div>
        <div class="col-sm-3 col-xs-6 mt_20 cms-icon ">
          <div class="ptb_30 " style="text-align: center;">
            <div class="Save"></div>
            <h6>Harga Terbaik</h6>
            <p>Harga spesial dari kami cukup ajukan penawaran anda.</p>
          </div>
        </div>
        <div class="col-sm-3 col-xs-6 mt_20 cms-icon ">
          <div class="ptb_30 " style="text-align: center;">
            <div class="Safe"></div>
            <h6>Garansi Pasti Tayang</h6>
            <p>Apabila tidak tayang jaminan uang kembali 100%.</p>
          </div>
        </div>
      </div>
      <div class="row ">
        <div class="col-sm-12 mt_30">
          <!-- =====  PRODUCT TAB  ===== -->
          <div id="product-tab" class="mt_10">
            <div class="heading-part mb_10 ">
              <h2 class="main_title">Media Promosi di Kota Besar</h2>
            </div>
            <div class="tab-content clearfix box">
              <div class="tab-pane active">
                <div class="nArrivals owl-carousel">
                  <div class="product-grid">
                    <div class="item">
                      <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="<?php echo base_url('templates/dark/') ?>images/kota/jakarta.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="<?php echo base_url('templates/dark/') ?>images/kota/jakarta.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                          <!-- <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                          </div> -->
                        </div>
                        <div class="caption product-detail text-center">
                          <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div> -->
                          <!-- <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">Jakarta</a></h6> -->
                          <span class="price">Jakarta</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-grid">
                    <div class="item">
                      <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="<?php echo base_url('templates/dark/') ?>images/kota/surabaya.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="<?php echo base_url('templates/dark/') ?>images/kota/surabaya.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                          <!-- <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                          </div> -->
                        </div>
                        <div class="caption product-detail text-center">
                          <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div> -->
                          <!-- <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">Surabaya</a></h6> -->
                          <span class="price">Surabaya</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-grid">
                    <div class="item">
                      <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="<?php echo base_url('templates/dark/') ?>images/kota/bali.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="<?php echo base_url('templates/dark/') ?>images/kota/bali.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                          <!-- <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                          </div> -->
                        </div>
                        <div class="caption product-detail text-center">
                          <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div> -->
                          <!-- <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">Bali</a></h6> -->
                          <span class="price">Bali</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-grid">
                    <div class="item">
                      <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="<?php echo base_url('templates/dark/') ?>images/kota/makassar.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="<?php echo base_url('templates/dark/') ?>images/kota/makassar.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                          <!-- <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                          </div> -->
                        </div>
                        <div class="caption product-detail text-center">
                          <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div> -->
                          <!-- <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">Makassar</a></h6> -->
                          <span class="price">Makassar</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-grid">
                    <div class="item">
                      <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="<?php echo base_url('templates/dark/') ?>images/kota/bandung.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="<?php echo base_url('templates/dark/') ?>images/kota/bandung.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                          <!-- <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                          </div> -->
                        </div>
                        <div class="caption product-detail text-center">
                          <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div> -->
                          <!-- <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">Bandung</a></h6> -->
                          <span class="price">Bandung</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-grid">
                    <div class="item">
                      <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="<?php echo base_url('templates/dark/') ?>images/kota/palembang.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="<?php echo base_url('templates/dark/') ?>images/kota/palembang.png" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                          <!-- <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                          </div> -->
                        </div>
                        <div class="caption product-detail text-center">
                          <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div> -->
                          <!-- <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">Palembang</a></h6> -->
                          <span class="price">Palembang</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- =====  PRODUCT TAB  END ===== -->
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 mtb_10">
          <!-- =====  Blog ===== -->
          <div id="Blog" class="mt_50">
            <div class="heading-part mb_10 ">
              <h2 class="main_title">Promo</h2>
            </div>
            <div class="blog-contain box">
              <div class="blog owl-carousel ">
                <div class="item">
                  <div class="box-holder">
                    <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('templates/dark/') ?>images/category/billboard.jpg" alt="themini"> </a>
                      <!-- <div class="date-time text-center">
                        <div class="day"> 11</div>
                        <div class="month">Aug</div>
                      </div> -->
                      <div class="post-image-hover"> </div>
                      <div class="post-info">
                        <h6 class="mb_10 text-uppercase"> <a href="#">Promo Billboard</a> </h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias tempora iusto numquam nemo, quis nesciunt cum, quae asperiores similique amet magni nobis architecto mollitia sequi temporibus esse officia, recusandae molestias.</p>
                        <div class="view-blog">
                          <!-- <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div> -->
                          <!-- <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="box-holder">
                    <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('templates/dark/') ?>images/category/billboard.jpg" alt="themini"> </a>
                      <!-- <div class="date-time text-center">
                        <div class="day"> 11</div>
                        <div class="month">Aug</div>
                      </div> -->
                      <div class="post-image-hover"> </div>
                      <div class="post-info">
                        <h6 class="mb_10 text-uppercase"> <a href="#">Promo Billboard</a> </h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias tempora iusto numquam nemo, quis nesciunt cum, quae asperiores similique amet magni nobis architecto mollitia sequi temporibus esse officia, recusandae molestias.</p>
                        <div class="view-blog">
                          <!-- <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div> -->
                          <!-- <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="box-holder">
                    <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('templates/dark/') ?>images/category/billboard.jpg" alt="themini"> </a>
                      <!-- <div class="date-time text-center">
                        <div class="day"> 11</div>
                        <div class="month">Aug</div>
                      </div> -->
                      <div class="post-image-hover"> </div>
                      <div class="post-info">
                        <h6 class="mb_10 text-uppercase"> <a href="#">Promo Billboard</a> </h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias tempora iusto numquam nemo, quis nesciunt cum, quae asperiores similique amet magni nobis architecto mollitia sequi temporibus esse officia, recusandae molestias.</p>
                        <div class="view-blog">
                          <!-- <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div> -->
                          <!-- <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- =====  Blog end ===== -->
          </div>
        </div>
      </div>
      <!-- =====  SUB BANNER END  ===== -->
      <div id="brand_carouse" class="ptb_60 text-center">
        <div class="type-01">
          <div class="heading-part mb_10 ">
            <h2 class="main_title">Mitra Kami</h2>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="brand owl-carousel ptb_20">
                <div class="item text-center"> <a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="<?php echo base_url('templates/dark/') ?>images/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->
    <!-- =====  FOOTER START  ===== -->
    <div class="footer pt_60">
      <div class="container">
        <div class="newsletters mt_30 mb_50">
          <div class="row">
            <div class="col-sm-6">
              <div class="news-head pull-left">
                <h2>Newsletter</h2>
                <div class="new-desc">Ingin mendapatkan tentang info-info terbaru dari kami, silahkan berlangganan dengan subscribe disini.</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="news-form pull-right">
                <form onsubmit="return validatemail();" method="post">
                  <div class="form-group required">
                    <input name="email" id="email" placeholder="Email Anda" class="form-control input-lg" required="" type="email">
                    <button type="submit" class="btn btn-default btn-lg">Subscribe</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Contact</h6>            
            <ul>
              <li><h6 style="font-size: 16px;">Follow <a href=""><i class="fa fa-twitter"></i></a> <a href=""><i class="fa fa-facebook"></i></a> <a href=""><i class="fa fa-instagram"></i></a></h6></li>
              <li>Jl Merdeka No 123</li>
              <li>Tulakan, Kec. Donorojo, Jepara</li>
              <li>Jawa Tengah 59454</li>
              <!-- <li><a href="http://www.iklanku.com/">www.iklanku.com</a></li> -->
            </ul>
          </div>
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Iklanku</h6>
            <ul>
              <li><a href="#">Tentang Iklanku</a></li>
              <li><a href="#">Blog Iklanku</a></li>
              <li><a href="#">Career Iklanku</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Panduan</h6>
            <ul>
              <li><a href="#">Cara Daftar</a></li>
              <li><a href="#">Cara Pencarian Media</a></li>
              <li><a href="#">Cara Bertransaksi</a></li>
              <li><a href="#">Mengecek Status Transaksi</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Hubungi Kami</h6>
            <ul>
              <li><a href="#"><i class="fa fa-phone"></i> 085000000000</a></li>
              <li><a href="#"><i class="fa fa-envelope"></i> cs@iklanku.com</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom mt_60 ptb_20">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <!-- <div class="social_icon">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-google"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div> -->
            </div>
            <div class="col-sm-4">
              <div class="copyright-part text-center">@ 2020 All Rights Reserved iklanku</div>
            </div>
            <div class="col-sm-4">
              <!-- <div class="payment-icon text-right">
                <ul>
                  <li><i class="fa fa-cc-paypal "></i></li>
                  <li><i class="fa fa-cc-visa"></i></li>
                  <li><i class="fa fa-cc-discover"></i></li>
                  <li><i class="fa fa-cc-mastercard"></i></li>
                  <li><i class="fa fa-cc-amex"></i></li>
                </ul>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- =====  FOOTER END  ===== -->
  </div>
  <div id="whatsapp-chat">
    <a href="https://wa.me/6285290335332?text=Hi%20Iklanku" target="_blank"><img style="object-fit:cover; width:80px;height: 80px;" src="<?php echo base_url('images')?>/wa.png"></a>
  </div>
  <a id="scrollup"></a>
  <script src="<?php echo base_url('templates/dark/') ?>js/jQuery_v3.1.1.min.js"></script>
  <script src="<?php echo base_url('templates/dark/') ?>js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url('templates/dark/') ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('templates/dark/') ?>js/jquery.magnific-popup.js"></script>
  <script src="<?php echo base_url('templates/dark/') ?>js/jquery.firstVisitPopup.js"></script>
  <script src="<?php echo base_url('templates/dark/') ?>js/custom.js"></script>
</body>

</html>