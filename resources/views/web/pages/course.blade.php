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
   <!--start OUR COURSES  -->
        <section id="mc-section-3" class="mc-section-3 section bg-grey">
            <div id="testimonial" class="text-center">
                <h2>OUR COURSES</h2>
                <h5 class="text-dark">We Offer Following Stock Trading Courses</h5>
                <div class="border"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <div id="news-slider" class="owl-carousel">

                                <?php foreach($cources as $course){ ?> 
                                <div class="post-slide">
                                    <div class="post-img">
                                        <img src="{{ asset('').$course->image }}"
                                            alt="">
                                            <p class="best_top" style="background:#e90e10">Bestseller </p>
                                        <a href="{{ url('course').'/'.$course->url_slug }}" target="_blank"  class="over-layer"><i class="fa fa-link"></i></a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="{{ url('course').'/'.$course->url_slug }}"  target="_blank" >{{ Str::of($course->title)->words(4, ' >>>') }}</a>
                                        </h3>
                                        <p class="post-description">{{ Str::of($course->short_description)->words(25, ' >>>') }}</p>
                                            <div class="lister">
                                                <div class="stars mb-0">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                         <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                   <p class="mb-0">
                                                      <i class="fa fa-user"> &nbsp;</i>8000
                                                   </p>
                                             
                                                </div>
                                        <span class="post-date rbottom"><h6 class="text-dark bold my-0">₹{{ $course->special_fees }} + GST</h6><span class="line-through">₹{{ $course->total_fees }} + GST</span></span>
                                        <a href="{{ url('course').'/'.$course->url_slug }}" target="_blank" class="read-more">Subscribe Now</a>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="post-slide">
                                    <div class="post-img">
                                        <img src="https://images.unsplash.com/photo-1484656551321-a1161420a2a0?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=306&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=506"
                                            alt="">
                                            <p class="best_top" style="background:#6eb8bf">Exclusive </p>
                                        <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="#">Lorem ipsum dolor sit amet.</a>
                                        </h3>
                                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium
                                            necessitatibus neque quae tempora......</p>
                                            <div class="lister">
                                                <div class="stars mb-0">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                         <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                   <p class="mb-0">
                                                      <i class="fa fa-user"> &nbsp;</i>1000
                                                   </p>
                                             
                                                </div>
                                        <span class="post-date rbottom"><h6 class="text-dark bold my-0">₹15000 + GST</h6><span class="line-through">20,000 + GST</span></span>
                                        <a href="#" class="read-more">Subscribe Now</a>
                                    </div>
                                </div>

                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end OUR COURSES  -->
                <!-- start  Features-->
        <section id="mc-section-3" class="mc-section-3 section">
            <div class="container">
                <!-- FEATURE -->
                <div id="testimonial" class="text-center ps icfm">
                    <h1>Features</h1>
                    <div class="border"></div>
                    <div class="feature-course">
                        <div class="row">
                            <div class="features-slider features">

                                <div class="testimonial card">
                                    <img src="{{ asset('assets/front/images/feture/f1.png') }}" alt="">
                                    <p>Learning opportunities direct from experienced professional traders</p>
                                </div>

                                <div class="testimonial card">
                                    <img src="{{ asset('assets/front/images/feture/f2.png') }}" alt="">
                                    <p>100% real-time and practical training</p>
                                </div>
                                <div class="testimonial card">
                                    <img src="{{ asset('assets/front/images/feture/f3.png') }}" alt="">
                                   <p>Brain Storming Session with Directors and some leading Brokers and Traders.</p>
                                </div>

                                <div class="testimonial card">
                                    <img src="{{ asset('assets/front/images/feture/f4.png') }}" alt="">
                                    <p>Individual Attention ( Not more than 10 students in a batch)</p>
                                </div>

                                <div class="testimonial card">
                                    <img src="{{ asset('assets/front/images/feture/f5.png') }}" alt="">
                                     <p>Mentorship under the experts' guidance.</p>
                                </div>
                                <div class="testimonial card">
                                    <img src="{{ asset('assets/front/images/feture/f6.png') }}" alt="">
                                     <p>Trading on live account</p>
                                </div>
                                <div class="testimonial card">
                                    <img src="{{ asset('assets/front/images/feture/f7.png') }}" alt="">
                                     <p>Library Facilities</p>
                                </div>
                                <div class="testimonial card">
                                    <img src="{{ asset('assets/front/images/feture/f8.png') }}" alt="">
                                     <p>PG Facilities</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END / FEATURE -->
                </div>

            </div>
        </section>

        <!--end  Features-->
     
        <section class="work-porcess-area section">
            <div class="container">


        <div class="section-header">
          
                            <h2>Our Process</h2>
          <p>Lorem Ipsum is simply dummy text of the printing.</p>
        </div>
                <div class="process-info">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="single-process first text-center">
                                <i class="fa fa-search"></i>
                                <h4>Discover</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single-process secend text-center">
                                <i class="fa fa-cog"></i>
                                <h4>Discover</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single-process thard text-center">
                                <i class="fa fa-globe"></i>
                                <h4>Discover</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single-process last text-center">
                                <i class="fa fa-users"></i>
                                <h4>Discover</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  -->
        <section id="questions" class="questions">
            <div class="container">
                <h2 class="text-center">Course Highlights</h2>
                <div class="border"></div>
                <div id="accordion" class="panel-group">
                
                    <!-- PANEL -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#question-1" class="collapsed">
                                    1 . What is benefit if I become a teacher?
                                </a>
                            </h4>
                        </div>
                        <div id="question-1" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                <h5 class="sm black bold">Goal of course</h5>
                                <ul class="list-disc">
                                    <li>
                                        <p>sed diam nonummy nibh euismod tincidunt ut laoreet</p>
                                    </li>
                                    <li>
                                        <p>ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequa</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END / PANEL -->
                
                    <!-- PANEL -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#question-2" class="collapsed">
                                    2 . How to be a teacher ?
                                </a>
                            </h4>
                        </div>
                        <div id="question-2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                <h5 class="sm black bold">Goal of course</h5>
                                <ul class="list-disc">
                                    <li>
                                        <p>sed diam nonummy nibh euismod tincidunt ut laoreet</p>
                                    </li>
                                    <li>
                                        <p>ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequa</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END / PANEL -->
                
                    <!-- PANEL -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#question-3" class="collapsed">
                                    3. How to deliver my course ?
                                </a>
                            </h4>
                        </div>
                        <div id="question-3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                            </div>
                        </div>
                    </div>
                    <!-- END / PANEL -->
                
                    <!-- PANEL -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#question-4" class="collapsed">
                                    4. How to keep on my classes and my students ?
                                </a>
                            </h4>
                        </div>
                        <div id="question-4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                <h5 class="sm black bold">Goal of course</h5>
                                <ul class="list-disc">
                                    <li>
                                        <p>sed diam nonummy nibh euismod tincidunt ut laoreet</p>
                                    </li>
                                    <li>
                                        <p>ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequa</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END / PANEL -->
                
                    <!-- PANEL -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#question-5" class="collapsed">
                                    5. How to  receive my payment ?
                                </a>
                            </h4>
                        </div>
                        <div id="question-5" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                            </div>
                        </div>
                    </div>
                    <!-- END / PANEL -->
                
                </div>
            </div>
        </section>
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