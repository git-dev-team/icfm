<?php 
use Illuminate\Support\Str;
?>
<!-- Carousel ================================================== -->
<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($banner as $bnr) {
            ?>
            <li data-target="#myCarousel" class="<?php if ($i == 0) {
                echo 'active';
            } ?>" data-slide-to="<?= $i++; ?>"></li>
        <?php } ?>
    </ol>
    <div class="carousel-inner">
        <?php
        $i = 1;
        foreach ($banner as $bnr) {
            ?>
            <div class="item <?php if ($i == 1) {
                echo 'active';
            } ?>">
                <img src="{{ asset('').$bnr->image }}" class="img-responsive">
                <div class="container">
                    <div class="carousel-caption">
                        <h2>{{ $bnr->title }} </h2>
                        <h5>{{ Str::of($bnr->description)->words(10, ' >>>') }}</h5>
                        <p><a target="_blank" class="btn btn-large btn-primary" href="{{ $bnr->b_link }}">Learn more</a></p>
                    </div>
                </div>
            </div>
            <?php $i++;
        } ?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>
<!-- /.carousel -->
<!-- AFTER SLIDER -->
<section id="after-slider" class="after-slider section">
    <div class="awe-color bg-color-1"></div>
    <div class="after-slider-bg-2"></div>
    <div class="container">
        <div class="after-slider-content tb">
            <div class="inner tb-cell">
                <h4>Find your course</h4>
                <div class="course-keyword">
                    <input type="text" placeholder="Course keyword">
                </div>
                <div class="mc-select-wrap">
                    <div class="mc-select">
                        <select class="select" name="" id="all-categories">
                            <option value="" selected>All categories</option>
                            <option value="">2</option>
                        </select>
                    </div>
                </div>
                <div class="mc-select-wrap">
                    <div class="mc-select">
                        <select class="select" name="" id="beginner-level">
                            <option value="" selected>Beginner level</option>
                            <option value="">Beginner level 2</option>
                            <option value="">Beginner level 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="tb-cell text-right">
                <div class="form-actions">
                    <input type="submit" value="Find Course" class="mc-btn btn-style-1">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / AFTER SLIDER -->
<!-- SECTION 1 -->
<section id="mc-section-1" class="mc-section-1 section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="testimonial" class="text-center ">
                    <h1>Stock Market Courses Details</h1>
                    <div class="border"></div>
                    <div class="feature-course">
                        <div class="row">
                            <div class="stock-slider">
                                <?php foreach ($cources as $course) { ?>
                                    <div class="testimonial card">
                                        <a target="_blank" href="{{ url('course').'/'.$course->url_slug }}">
                                            <img src="{{ asset('').$course->image }}" alt="">
                                            <div class="name">{{ $course->title }}</div>
                                            <p>{{ Str::of($course->short_description)->words(30, ' >>>') }}</p>
                                        </a>
                                    </div>
                                <?php } ?>
                              
                            </div>
                            <a target="_blank" href="{{ route('course') }}" class="mc-btn btn-style-1">View all</a>
                        </div>
                    </div>
                    <!-- END / FEATURE -->
                </div>
            </div>
            <div class="col-md-4">
                <!-- EDU2 SEARCH WRAP START -->
                <div class="kf_edu2_search_wrap">
                    <div class="kf_edu2_heading1">
                        <h3>About ICFM</h3>
                    </div>
                    <a href="campus.php"><img src="{{ asset('assets/front/images/about/visit-our-campus.webp') }}"
                            alt="ICFM Campus" class="mb-2"></a>
                    <a href="student.php"><img src="{{ asset('assets/front/images/about/meet-our-student.webp') }}"
                            alt="icfmindia student" class="mb-2"></a>
                    <a href="faculty.php"><img src="{{ asset('assets/front/images/about/meet-our-faculty.webp') }}"
                            alt="ICFM Faculty"></a>
                    <div class="text-center">
                        <a href="https://www.icfmindia.com/calculator.php" class="mc-btn btn-style-1">MCX Gold
                            Calculator</a>
                    </div>
                </div>
                <!-- EDU2 SEARCH WRAP END -->
            </div>
        </div>
    </div>
</section>
<!-- END / SECTION 1 -->
<!--  -->
<!-- ------------second type chart--------------------- -->
<!-- TradingView Widget BEGIN -->
<!--<section id="mc-section-1" class="mc-section-1 section">-->
<!--    <div class="container">-->
<!--        <div class="tradingview-widget-container">-->
<!--            <div class="tradingview-widget-container__widget"></div>-->
<!--            <script type="text/javascript"-->
<!--                src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>-->
<!--                    {-->
<!--                        "symbols": [-->
<!--                            [-->
<!--                                "BSE:SENSEX|1D"-->
<!--                            ],-->
<!--                            [-->
<!--                                "CME_MINI:NQ1!|1D"-->
<!--                            ],-->
<!--                            [-->
<!--                                "SPREADEX:NIKKEI|1D"-->
<!--                            ],-->
<!--                            [-->
<!--                                "SPREADEX:FTSE|1D"-->
<!--                            ]-->
<!--                        ],-->
<!--                            "chartOnly": false,-->
<!--                                "width": 550,-->
<!--                                    "height": 400,-->
<!--                                        "locale": "en",-->
<!--                                            "colorTheme": "dark",-->
<!--                                                "autosize": false,-->
<!--                                                    "showVolume": false,-->
<!--                                                        "showMA": false,-->
<!--                                                            "hideDateRanges": false,-->
<!--                                                                "hideMarketStatus": false,-->
<!--                                                                    "hideSymbolLogo": false,-->
<!--                                                                        "scalePosition": "right",-->
<!--                                                                            "scaleMode": "Normal",-->
<!--                                                                                "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",-->
<!--                                                                                    "fontSize": "10",-->
<!--                                                                                        "noTimeScale": false,-->
<!--                                                                                            "valuesTracking": "1",-->
<!--                                                                                                "changeMode": "price-and-percent",-->
<!--                                                                                                    "chartType": "area",-->
<!--                                                                                                        "maLineColor": "#2962FF",-->
<!--                                                                                                            "maLineWidth": 1,-->
<!--                                                                                                                "maLength": 9,-->
<!--                                                                                                                    "lineWidth": 2,-->
<!--                                                                                                                        "lineType": 0,-->
<!--                                                                                                                            "dateRanges": [-->
<!--                                                                                                                                "1d|1",-->
<!--                                                                                                                                "1m|30",-->
<!--                                                                                                                                "3m|60",-->
<!--                                                                                                                                "12m|1D",-->
<!--                                                                                                                                "60m|1W",-->
<!--                                                                                                                                "all|1M"-->
<!--                                                                                                                            ]-->
<!--                    }-->
<!--                </script>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- TradingView Widget END -->
<!-- ------------second type chart--------------------- -->
<!--  -->
<section id="mc-section-3" class="mc-section-3 section bg-grey rproduct">
    <div class="container">
        <!-- FEATURE -->
        <div class="feature-course">
            <h4 class="title-box text-uppercase">Featured Products</h4>
            <a href="#" class="all-course mc-btn btn-style-1">View all</a>
            <div class="row">
                <div class="feature-slider">
                    <div class="box-product box-product-outer mc-item mc-item-1">
                        <div class="img-wrapper">
                            <a href="detail.html">
                                <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                            </a>
                            <div class="tags">
                                <span class="label-tags"><span class="label label-danger">Sale</span></span>
                                <span class="label-tags"><span class="label label-info">Featured</span></span>
                                <span class="label-tags"><span class="label label-warning">Polo</span></span>
                            </div>
                            <div class="option">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                            </div>
                        </div>
                        <h6><a href="detail.html">IncultGeo Print Polo T-Shirt</a></h6>
                        <div class="price">
                            <div>$16.59<span class="price-down">-10%</span></div>
                            <span class="price-old">$15.00</span>
                        </div>
                        <div class="rating">
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star-half-o"></i>
                            <a href="#">(2 reviews)</a>
                        </div>
                    </div>
                    <div class="box-product box-product-outer mc-item mc-item-1">
                        <div class="img-wrapper">
                            <a href="detail.html">
                                <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                            </a>
                            <div class="tags">
                                <span class="label-tags"><span class="label label-danger">Sale</span></span>
                                <span class="label-tags"><span class="label label-success">Collection</span></span>
                            </div>
                            <div class="option">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                            </div>
                        </div>
                        <h6><a href="detail.html">PhosphorusGrey Melange Printed V Neck T-Shirt</a></h6>
                        <div class="price">
                            <div>$5.25<span class="price-down">-10%</span></div>
                            <span class="price-old">$15.00</span>
                        </div>
                        <div class="rating">
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star-half-o"></i>
                            <i class="ace-icon fa fa-star-o"></i>
                            <a href="#">(5 reviews)</a>
                        </div>
                    </div>
                    <div class="box-product box-product-outer mc-item mc-item-1">
                        <div class="img-wrapper">
                            <a href="#">
                                <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar3.png">
                            </a>
                            <div class="tags">
                                <span class="label-tags"><span class="label label-danger">Sale</span></span>
                                <span class="label-tags"><span class="label label-info">Featured</span></span>
                                <span class="label-tags"><span class="label label-warning">Polo</span></span>
                            </div>
                            <div class="option">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                            </div>
                        </div>
                        <h6><a href="detail.html">WranglerNavy Blue Solid Polo T-Shirt</a></h6>
                        <div class="price">
                            <div>$25.59<span class="price-down">-10%</span></div>
                            <span class="price-old">$15.00</span>
                        </div>
                        <div class="rating">
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star-half-o"></i>
                            <a href="#">(4 reviews)</a>
                        </div>
                    </div>
                    <div class="box-product box-product-outer mc-item mc-item-1">
                        <div class="img-wrapper">
                            <a href="detail.html">
                                <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar5.png">
                            </a>
                            <div class="tags">
                                <span class="label-tags"><span class="label label-danger">Sale</span></span>
                                <span class="label-tags"><span class="label label-info">Featured</span></span>
                                <span class="label-tags"><span class="label label-warning">Polo</span></span>
                            </div>
                            <div class="option">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                            </div>
                        </div>
                        <h6><a href="detail.html">NikeAs Matchup -Pq Grey Polo T-Shirt</a></h6>
                        <div class="price">
                            <div>$15.79<span class="price-down">-10%</span></div>
                            <span class="price-old">$15.00</span>
                        </div>
                        <div class="rating">
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star-half-o"></i>
                            <a href="#">(5 reviews)</a>
                        </div>
                    </div>
                    <div class="box-product box-product-outer mc-item mc-item-1">
                        <div class="img-wrapper">
                            <a href="detail.html">
                                <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                            </a>
                            <div class="tags">
                                <span class="label-tags"><span class="label label-danger">Sale</span></span>
                                <span class="label-tags"><span class="label label-success">Collection</span></span>
                            </div>
                            <div class="option">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                            </div>
                        </div>
                        <h6><a href="detail.html">PhosphorusGrey Melange Printed V Neck T-Shirt</a></h6>
                        <div class="price">
                            <div>$5.25<span class="price-down">-10%</span></div>
                            <span class="price-old">$15.00</span>
                        </div>
                        <div class="rating">
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star"></i>
                            <i class="ace-icon fa fa-star-half-o"></i>
                            <i class="ace-icon fa fa-star-o"></i>
                            <a href="#">(5 reviews)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END / FEATURE -->
    </div>
</section>
<!--start our feature  -->
<section id="mc-section-3" class="mc-section-3 section our-feature">
    <div class="container">
        <!-- FEATURE -->
        <div class="feature-course">
            <h4 class="title-box text-uppercase">OUR FEATURE</h4>
            <a href="#" class="all-course mc-btn btn-style-1">View all</a>
            <div class="row">
                <div class="feature-slider">
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                        </div>
                    </div>
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                        </div>
                    </div>
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                        </div>
                    </div>
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                        </div>
                    </div>
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END / FEATURE -->
    </div>
</section>
<!--end our feature  -->
<!--start OUR WORKS  -->
<section id="mc-section-3" class="mc-section-3 section bg-grey OUR-WORKS">
    <div class="container">
        <!-- FEATURE -->
        <div class="feature-course">
            <h4 class="title-box text-uppercase">OUR WORKS</h4>
            <a href="#" class="all-course mc-btn btn-style-1">View all</a>
            <div class="row">
                <div class="feature-slider">
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                            <a href="#" class="all-course mc-btn btn-style-1 mt-2">View all</a>
                        </div>
                    </div>
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                            <a href="#" class="all-course mc-btn btn-style-1 mt-2">View all</a>
                        </div>
                    </div>
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                            <a href="#" class="all-course mc-btn btn-style-1 mt-2">View all</a>
                        </div>
                    </div>
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                            <a href="#" class="all-course mc-btn btn-style-1 mt-2">View all</a>
                        </div>
                    </div>
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                            <a href="#" class="all-course mc-btn btn-style-1 mt-2">View all</a>
                        </div>
                    </div>
                    <div class="mc-item mc-item-1">
                        <div class="image-heading">
                            <img src="{{ asset('assets/front/images/feature/img-1.jpg') }}" alt="">
                        </div>
                        <div class="content-item ft-item">
                            <div class="name-author mt-0 mb-2">
                                By <a href="#">Digital Photography Course</a>
                            </div>
                            <h4><a href="#">The Complete Digital Photography Course Amazon Top
                                    Seller</a></h4>
                            <a href="#" class="all-course mc-btn btn-style-1 mt-2">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END / FEATURE -->
    </div>
</section>
<!--end OUR WORKS  -->
<!-- start radd -->
<!-- <section class="rproduct">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="title"><span>Featured Products</span></div>
            <div class="col-sm-4 col-md-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                        </a>
                        <div class="tags">
                            <span class="label-tags"><span class="label label-danger">Sale</span></span>
                            <span class="label-tags"><span class="label label-info">Featured</span></span>
                            <span class="label-tags"><span class="label label-warning">Polo</span></span>
                        </div>
                        <div class="option">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="detail.html">IncultGeo Print Polo T-Shirt</a></h6>
                    <div class="price">
                        <div>$16.59<span class="price-down">-10%</span></div>
                        <span class="price-old">$15.00</span>
                    </div>
                    <div class="rating">
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star-half-o"></i>
                        <a href="#">(2 reviews)</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 hidden-xs box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                        </a>
                        <div class="tags">
                            <span class="label-tags"><span class="label label-danger">Sale</span></span>
                            <span class="label-tags"><span class="label label-info">Featured</span></span>
                            <span class="label-tags"><span class="label label-warning">Polo</span></span>
                        </div>
                        <div class="option">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="detail.html">Tommy HilfigerNavy Blue Printed Polo T-Shirt</a></h6>
                    <div class="price">
                        <div>$45.27<span class="price-down">-10%</span></div>
                        <span class="price-old">$15.00</span>
                    </div>
                    <div class="rating">
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star-half-o"></i>
                        <a href="#">(3 reviews)</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 hidden-xs box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar3.png">
                        </a>
                        <div class="tags">
                            <span class="label-tags"><span class="label label-danger">Sale</span></span>
                            <span class="label-tags"><span class="label label-info">Featured</span></span>
                            <span class="label-tags"><span class="label label-warning">Polo</span></span>
                        </div>
                        <div class="option">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="detail.html">WranglerNavy Blue Solid Polo T-Shirt</a></h6>
                    <div class="price">
                        <div>$25.59<span class="price-down">-10%</span></div>
                        <span class="price-old">$15.00</span>
                    </div>
                    <div class="rating">
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star-half-o"></i>
                        <a href="#">(4 reviews)</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 hidden-sm hidden-xs box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar5.png">
                        </a>
                        <div class="tags">
                            <span class="label-tags"><span class="label label-danger">Sale</span></span>
                            <span class="label-tags"><span class="label label-info">Featured</span></span>
                            <span class="label-tags"><span class="label label-warning">Polo</span></span>
                        </div>
                        <div class="option">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="detail.html">NikeAs Matchup -Pq Grey Polo T-Shirt</a></h6>
                    <div class="price">
                        <div>$15.79<span class="price-down">-10%</span></div>
                        <span class="price-old">$15.00</span>
                    </div>
                    <div class="rating">
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star-half-o"></i>
                        <a href="#">(5 reviews)</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="title"><span>V-Neck Collection</span></div>
            <div class="col-sm-4 col-md-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                        </a>
                        <div class="tags">
                            <span class="label-tags"><span class="label label-danger">Sale</span></span>
                            <span class="label-tags"><span class="label label-success">Collection</span></span>
                        </div>
                        <div class="option">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="detail.html">PhosphorusGrey Melange Printed V Neck T-Shirt</a></h6>
                    <div class="price">
                        <div>$5.25<span class="price-down">-10%</span></div>
                        <span class="price-old">$15.00</span>
                    </div>
                    <div class="rating">
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star-half-o"></i>
                        <i class="ace-icon fa fa-star-o"></i>
                        <a href="#">(5 reviews)</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 hidden-xs box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar5.png">
                        </a>
                        <div class="tags">
                            <span class="label-tags"><span class="label label-danger">Sale</span></span>
                            <span class="label-tags"><span class="label label-success">Collection</span></span>
                        </div>
                        <div class="option">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="detail.html">United Colors of BenettonNavy Blue Solid V Neck T Shirt</a></h6>
                    <div class="price">
                        <div>$13.57<span class="price-down">-10%</span></div>
                        <span class="price-old">$15.00</span>
                    </div>
                    <div class="rating">
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star-half-o"></i>
                        <i class="ace-icon fa fa-star-o"></i>
                        <a href="#">(5 reviews)</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 hidden-xs box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar3.png">
                        </a>
                        <div class="tags">
                            <span class="label-tags"><span class="label label-danger">Sale</span></span>
                            <span class="label-tags"><span class="label label-success">Collection</span></span>
                        </div>
                        <div class="option">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="detail.html">WranglerBlack V Neck T Shirt</a></h6>
                    <div class="price">
                        <div>$12.00<span class="price-down">-10%</span></div>
                        <span class="price-old">$15.00</span>
                    </div>
                    <div class="rating">
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star-half-o"></i>
                        <i class="ace-icon fa fa-star-o"></i>
                        <a href="#">(5 reviews)</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 hidden-sm hidden-xs box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                        </a>
                        <div class="tags">
                            <span class="label-tags"><span class="label label-danger">Sale</span></span>
                            <span class="label-tags"><span class="label label-success">Collection</span></span>
                        </div>
                        <div class="option">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="detail.html">Tagd New YorkGrey Printed V Neck T-Shirts</a></h6>
                    <div class="price">
                        <div>$8.09<span class="price-down">-10%</span></div>
                        <span class="price-old">$15.00</span>
                    </div>
                    <div class="rating">
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star"></i>
                        <i class="ace-icon fa fa-star-half-o"></i>
                        <i class="ace-icon fa fa-star-o"></i>
                        <a href="#">(5 reviews)</a>
                    </div>
                </div>
            </div>
        </div>
          </div>
          </div>
        </section> -->
<!-- end radd -->
<!-- SECTION 2 -->
<section id="mc-section-2" class="mc-section-2 section">
    <div class="awe-parallax bg-section1-demo"></div>
    <div class="overlay-color-1"></div>
    <div class="container">
        <div class="section-2-content">
            <div class="row">
                <div class="col-md-5">
                    <div class="ct">
                        <h2 class="big">Learning online is easier than ever before</h2>
                        <p class="mc-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        <a href="#" class="mc-btn btn-style-3">See how it work</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="image">
                        <img src="{{ asset('assets/front/images/image.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / SECTION 2 -->
<!-- start  testimonials-->
<section id="mc-section-3" class="mc-section-3 section bg-grey">
    <div class="container">
        <!-- FEATURE -->
        <div id="testimonial" class="text-center ps">
            <h1>Testimonial</h1>
            <div class="border"></div>
            <div class="feature-course">
                <div class="row">
                    <div class="testimonial-slider">
                        <div class="testimonial">
                            <img src="https://images.pexels.com/photos/3585325/pexels-photo-3585325.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                alt="">
                            <div class="name">John Waddrob</div>
                            <div class="stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque repellat
                                aspernatur temporibus assumenda sint odio minima. Voluptate alias possimus
                                aspernatur voluptates excepturi placeat iusto cupiditate.</p>
                        </div>
                        <div class="testimonial">
                            <img src="https://images.pexels.com/photos/2690323/pexels-photo-2690323.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                alt="">
                            <div class="name">John Waddrob</div>
                            <div class="stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque repellat
                                aspernatur temporibus assumenda sint odio minima. Voluptate alias possimus
                                aspernatur voluptates excepturi placeat iusto cupiditate!</p>
                        </div>
                        <div class="testimonial">
                            <img src="https://images.pexels.com/photos/3211476/pexels-photo-3211476.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                alt="">
                            <div class="name">John Waddrob</div>
                            <div class="stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque repellat
                                aspernatur temporibus assumenda sint odio minima. Voluptate alias possimus
                                aspernatur voluptates excepturi placeat iusto cupiditate.</p>
                        </div>
                        <div class="testimonial">
                            <img src="https://images.pexels.com/photos/3585325/pexels-photo-3585325.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                alt="">
                            <div class="name">John Waddrob</div>
                            <div class="stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque repellat
                                aspernatur temporibus assumenda sint odio minima. Voluptate alias possimus
                                aspernatur voluptates excepturi placeat iusto cupiditate.</p>
                        </div>
                        <div class="testimonial">
                            <img src="https://images.pexels.com/photos/2690323/pexels-photo-2690323.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                alt="">
                            <div class="name">John Waddrob</div>
                            <div class="stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque repellat
                                aspernatur temporibus assumenda sint odio minima. Voluptate alias possimus
                                aspernatur voluptates excepturi placeat iusto cupiditate!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END / FEATURE -->
        </div>
    </div>
</section>
<!--end  testimonials-->
<!--start News &  Events  -->
<section id="mc-section-3" class="mc-section-3 section">
    <div id="testimonial" class="text-center">
        <h1>News & Events</h1>
        <div class="border"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <div id="news-slider" class="owl-carousel">
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1596265371388-43edbaadab94?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1564979268369-42032c5ca998?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=300&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=500"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1576659531892-0f4991fca82b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1586083702768-190ae093d34d?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=305&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=505"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1484656551321-a1161420a2a0?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=306&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=506"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end News &  Events  -->
<!--start Our Blogs  -->
<section id="mc-section-3" class="mc-section-3 section bg-grey">
    <div id="testimonial" class="text-center">
        <h1>Our Blogs</h1>
        <div class="border"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <div id="blogs-slider" class="owl-carousel">
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1596265371388-43edbaadab94?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1564979268369-42032c5ca998?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=300&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=500"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1576659531892-0f4991fca82b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1586083702768-190ae093d34d?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=305&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=505"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1484656551321-a1161420a2a0?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=306&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=506"
                                    alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                    necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->
 <section id="clients">
            <div class="container">
                <div class="wrap">
                    <h3 class="text-center">OUR MEDIA PARTNERS</h3>
                    <div class="border"></div>
                    <div id="testimonial" class="text-center icfm">
                        <div class="feature-course">
                            <div class="row">
                                 <div class="clients-slider">
                        <a href=""><img
                                src="{{ asset('assets/front/images/media/hindustan-times-logo-trade-brains.jpg') }}"
                                alt=""></a>
                        <a href=""><img src="{{ asset('assets/front/images/media/Dailyhunt-Logo.png') }}"
                                alt=""></a>
                        </li>
                        <a href=""><img src="{{ asset('assets/front/images/media/Latestly_Logo.jpg') }}" alt=""></a>
                        <a href=""><img src="{{ asset('assets/front/images/media/ZEE5_logo.png') }}" alt=""></a>
                        <a href=""><img src="{{ asset('assets/front/images/media/logo-black.png') }}" alt=""></a>
                    </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
          </section>
<!---->
<!--  -->
<section id="mc-section-3" class="mc-section-3 section bg-grey">
    <div class="container">
    <div class="wrap">
          <h3 class="text-center">ICFM IN NEWS</h3>
        <div class="border"></div>
        <div class="container">
            <marquee behavior="scroll" direction="up" scrollamount="2" onmouseover="this.stop()"
                onmouseout="this.start()" height="200px">
                <a href="https://www.hindustantimes.com/brand-stories/icfm-to-expand-the-roof-of-financial-market-awareness-with-100-more-new-branches-101672739239083.html"
                    target="_blank"><strong>ICFM to Expand the Roof of Financial Market Awareness With 100 More
                        New Branches</strong></a>
                <hr style="margin:0px 0px 10px;">
                <a href="https://m.dailyhunt.in/news/india/english/ani67917250816496966-epaper-anieng/icfm+aims+to+expand+the+roof+of+financial+market+awareness+with+100+more+new+branches+in+the+country-newsid-n458384488?listname=newspaperLanding&amp;topic=business&amp;index=0&amp;topicIndex=4&amp;mode=pwa&amp;action=click"
                    target="_blank"><strong>ICFM aims to expand the roof of financial market awareness with 100
                        more new branches in the country</strong></a>
                <hr style="margin:0px 0px 10px;">
                <a href="https://www.latestly.com/agency-news/business-news-icfm-aims-to-expand-the-roof-of-financial-market-awareness-with-100-more-new-branches-in-the-country-4666189.html"
                    target="_blank"><strong>Business News | ICFM Aims to Expand the Roof of Financial Market
                        Awareness with 100 More New Branches in the Country</strong></a>
                <hr style="margin:0px 0px 10px;">
                <a href="https://www.zee5.com/articles/icfm-aims-to-expand-the-roof-of-financial-market-awareness-with-100-more-new-branches-in-the-country"
                    target="_blank"><strong>ICFM aims to expand the roof of financial market awareness with 100
                        more new branches in the country</strong></a>
                <hr style="margin:0px 0px 10px;">
                <a href="https://aninews.in/news/business/business/icfm-aims-to-expand-the-roof-of-financial-market-awareness-with-100-more-new-branches-in-the-country20230103153814/"
                    target="_blank"><strong>ICFM aims to expand the roof of financial market awareness with 100
                        more new branches in the country</strong></a>
                <hr style="margin:0px 0px 10px;">
            </marquee>
        </div>
    </div>
    </div>
</section>
<!--  -->
<!-- start Social Media -->
<section class="bg-yellow py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="edu2_ft_topbar_des">
                    <h4 class="my-0">Get in Touch With Our Social Media Network
                    </h4>
                </div>
            </div>
            <div class="col-md-5">
                <ul class="home_social justify-content-center">
                    <li><a href="https://www.youtube.com/channel/UCs36AA7UBP7FxzzqnCZ_ZQQ/videos" target="_blank"><i
                                class="fa fa-youtube-play"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/icfm-institute/" target=""><i
                                class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://www.instagram.com/icfm_institute/" target=""><i
                                class="fa fa-instagram"></i></a></li>
                    <li><a href="https://twitter.com/icfm_institute" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="https://www.facebook.com/icfminstitute/" target=""><i class="fa fa-facebook"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--end Social Media  -->
<!-- start  icfm-->
<section id="mc-section-3" class="mc-section-3 section bg-grey">
    <div class="container">
        <!-- FEATURE -->
        <div id="testimonial" class="text-center icfm">
            <h1>ICFM advantage</h1>
            <div class="border"></div>
            <h4 class="text-dark">Why icfm is considered as the most prefered learning centre for professional
                stock market traders</h4>
            <div class="feature-course">
                <div class="row">
                    <div class="features-slider">
                        <div class="testimonial card">
                            <img src="{{ asset('assets/front/images/icfm/experienced_4_11zon.webp') }}" alt="">
                            <div class="name">Experienced Faculty</div>
                            <p>Combined faculty experience of 50+ years</p>
                        </div>
                        <div class="testimonial card">
                            <img src="{{ asset('assets/front/images/icfm/stock-trading_9_11zon.webp') }}" alt="">
                            <div class="name">International stock trading</div>
                            <p>We offer training in international stock market with our own proprietory desk</p>
                        </div>
                        <div class="testimonial card">
                            <img src="{{ asset('assets/front/images/icfm/practical_8_11zon.webp') }}" alt="">
                            <div class="name">Practical approach</div>
                            <p>We focus on delivering practical training that is why our students sits with the
                                personal pc from the very first day</p>
                        </div>
                        <div class="testimonial card">
                            <img src="{{ asset('assets/front/images/icfm/infra_7_11zon.webp') }}" alt="">
                            <div class="name">Infrastructure</div>
                            <p>Best infrastructure with latest softwares required to learn stock trading</p>
                        </div>
                        <div class="testimonial card">
                            <img src="{{ asset('assets/front/images/icfm/support_10_11zon.webp') }}" alt="">
                            <div class="name">Best Support</div>
                            <p>Our online programs comes with the direct support from our faculty members</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END / FEATURE -->
        </div>
    </div>
</section>
<!--end  icfm-->
<!--end Our Blogs  -->
<section id="clients">
            <div class="container">
                <div class="wrap">
                    <h3 class="text-center">OUR TRAINING AND ACADEMIC PARTNERS</h3>
                    <div class="border"></div>
                    <div id="testimonial" class="text-center icfm">
                        <div class="feature-course">
                            <div class="row">
                                <div class="clients-slider">
                            <a href=""><img src="{{ asset('assets/front/images/british1_3_11zon.webp') }}"
                                    alt=""></a>
                            <a href=""><img src="{{ asset('assets/front/images/bearstreetpng_2_11zon.webp') }}"
                                    alt=""></a>
                            <a href=""><img src="{{ asset('assets/front/images/aos1_1_11zon.webp') }}" alt=""></a>
                        </div>
                            </div>
                        </div>
                        <!-- END / FEATURE -->
                    </div>
                </div>
            </div>
          </section>
<!-- BEFORE FOOTER -->
<section id="before-footer" class="before-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="mc-count-item">
                    <h4>Courses</h4>
                    <p><span class="countup">2536,556</span></p>
                </div>
                <div class="mc-count-item">
                    <h4>Teachers</h4>
                    <p><span class="countup">10,389</span></p>
                </div>
                <div class="mc-count-item">
                    <h4>Students</h4>
                    <p><span class="countup">34,177</span></p>
                </div>
                <div class="mc-count-item">
                    <h4>Tuition Paid</h4>
                    <p>$ <span class="countup">793,361,890</span></p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="before-footer-link">
                    <a href="#" class="mc-btn btn-style-2">join learner programs</a>
                    <a href="#" class="mc-btn btn-style-1">join traders programs</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / BEFORE FOOTER -->