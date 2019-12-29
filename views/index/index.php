<!-- banner part start-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/jquery-3.3.1.slim.min.js"></script>

    <script src="public/js/bootstrap.min.js"></script>
</head>
<body>

<div id="demo" class="carousel" style="margin-top: 60px"  data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active mt-4">
            <img src="public/img/slider1.jpg" alt="آکادمی" style="background-size: cover" width="100%" >
        </div>
        <div class="carousel-item">
            <img src="public/img/slider2.jpg" alt="علیزاده" style="background-size: cover" width="100%" >
        </div>
        <div class="carousel-item">
            <img src="public/img/slider3.jpg" alt="باشگاه"  style="background-size: cover"width="100%">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>

<!-- banner part start-->
<!--::exclusive_item_part start::-->
<section class="our_offer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-5">
                <div class="section_tittle">
                    <h2>امکانات آکادمی علیزاده</h2>

                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="single_offer_part">
                    <div>
                        <img src="<?=URL?>/public/img/offer_img_1.jpg" >

                    </div>
                </div>
                <div class="single_offer_part">
                    <div>
                        <img src="<?=URL?>/public/img/offer_img_2.jpg" alt="offer_img_1">

                    </div>
                </div>
                <div class="single_offer_part">
                    <div>
                        <img src="<?=URL?>/public/img/offer_img_3.jpg" alt="offer_img_1">

                    </div>
                </div>
                <div class="single_offer_part">
                    <div>
                        <img src="<?=URL?>/public/img/offer_img_4.jpg" alt="offer_img_1">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::review_part end::-->

<!--::exclusive_item_part start::-->
<section class="team_member_section section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div class="section_tittle">
                    <p>تیم ما</p>
                    <h2>مربیان باشگاه</h2>

                </div>
            </div>
        </div>
        <div class="row d-flex align-items-center">
            <div class="col-sm-6 col-lg-4">
                <div class="single_blog_item">
                    <div class="single_blog_img">
                        <img src="<?=URL?>public/img/team/team_1.png" alt="">

                    </div>
                    <div class="single_blog_text">
                        <h3><a href="../../index.php">Anderew Eletch</a></h3>
                        <p>  میکائیل</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="single_blog_item">
                    <div class="single_blog_img">
                        <img src="<?=URL?>public/img/team/team_2.png" alt="">

                    </div>
                    <div class="single_blog_text">
                        <h3><a href="../../index.php">Mathew Edene</a></h3>
                        <p>هادی علیزاده</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="single_blog_item">
                    <div class="single_blog_img">
                        <img src="<?=URL?>public/img/team/team_3.png" alt="">

                    </div>
                    <div class="single_blog_text">
                        <h3><a href="../../index.php">Anderew Eletch</a></h3>
                        <p>مهدی علیزداه</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::exclusive_item_part end::-->


<!-- jquery plugins here-->
<!-- jquery -->
<script src="<?=URL?>public/js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="<?=URL?>public/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="<?=URL?>public/js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="<?=URL?>public/js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="<?=URL?>public/js/swiper.min.js"></script>
<!-- swiper js -->
<script src="<?=URL?>public/js/masonry.pkgd.js"></script>
<!-- particles js -->
<script src="<?=URL?>public/js/owl.carousel.min.js"></script>
<!-- swiper js -->
<script src="<?=URL?>public/js/slick.min.js"></script>
<script src="<?=URL?>public/js/gijgo.min.js"></script>
<script src="<?=URL?>public/js/jquery.nice-select.min.js"></script>
<!-- custom js -->
<script src="<?=URL?>public/js/custom.js"></script>
</body>

</html>