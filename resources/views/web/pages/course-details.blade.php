<?php
use Illuminate\Support\Str;

date_default_timezone_set("asia/kolkata");
?>
<!-- Carousel ================================================== -->
    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            $i = 0;
            foreach ($banner as $bnr) { ?>
                <li data-target="#myCarousel" class="<?php if ($i == 0) {
                    echo "active";
                } ?>" data-slide-to="<?= $i++ ?>"></li>
            <?php }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            $i = 1;
            foreach ($banner as $bnr) { ?>
                <div class="item <?php if ($i == 1) {
                    echo "active";
                } ?>">
                    <img src="{{ asset('') . $bnr->image }}" class="img-responsive">
                    <div class="container">
                        <div class="carousel-caption">
                        </div>
                    </div>
                </div>
                <?php $i++;}
            ?>
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
        <!-- AFTER banner -->
         <section class="course-top mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="sidebar-course-intro">
                            <div class="breadcrumb">
                                <a href="{{ url('') }}">Home</a> / <a href="{{ route('course') }}">Courses</a> / {{ $cources->title }}
                            </div>   
                            <div class="video-course-intro">
                                
                                <!--</*?php<iframe class="w-100" src="<?= $cources[
                                    "video"
                                ] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>*/?-->
                                <!---->
                                
                            <embed type="video/webm" src="{{ $cources->video }}" class="w-100" height="300">
 
                                <div class="price">
                                <span class="h4">Download E Book </span>
                                 </div>
                                <?php if(count($course_mode) > 0){ ?> 
                                    <a href="#" onclick="getPaymentModeWithFees({{ $cources->id }})" class="mc-btn btn-style-1 py-0" data-toggle="modal" data-target="#tack-course">Take this course</a>
                                <?php }else{ ?> 
                                    <a class="mc-btn btn-style-1 py-0 dishabled" >Take this course</a>
                                <?php } ?>
                            </div>
    
                            <div class="new-course">
                                <div class="item course-code">
                                    <i class="icon md-barcode"></i>
                                    <h4><a href="#">Course Code</a></h4>
                                    <p class="detail-course"># <small>{{ $cources->course_code }}</small></p>
                                </div>
                                <div class="item course-code">
                                    <i class="icon md-time"></i>
                                    <h4><a href="#">Duration</a></h4>
                                    <p class="detail-course">{{ $cources->course_duration }}</p>
                                </div>
                                <div class="item course-code">
                                    <i class="icon md-img-check"></i>
                                    <h4><a href="#">Open Date</a></h4>
                                    <p class="detail-course"><?= date(
                                        "d F Y",
                                        strtotime(
                                            date("d-m-Y") .
                                                " + " .
                                                rand(1, 9) .
                                                " days"
                                        )
                                    ) ?></p>
                                </div>
                            </div>
                            <hr class="line">
                            <div class="about-instructor">
                                <h4 class="xsm black bold">About Instructor</h4>
                                <ul>
                                    <?php foreach (
                                        $course_instructor
                                        as $instructor
                                    ) { ?>
                                    <li>
                                        <div class="image-instructor text-center">
                                            <img src="{{ asset('') . $instructor->image }}" alt="">
                                        </div>
                                        <div class="info-instructor">
                                            <cite class="sm black"><a href="#">{{ $instructor->name }}</a></cite>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-envelope"></i></a>
                                            <a href="#"><i class="fa fa-check-square"></i></a>
                                            <p>{{ $instructor->about_me }}</p>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <hr class="line">
                            <?php if(count($course_mode) > 0){ ?>
                                <div class="widget widget_equipment">
                                    <i class="icon md-config"></i>
                                    <h4 class="xsm black bold">Course Mode</h4>
                                    <div class="equipment-body">
                                        <?php foreach ($course_mode as $c_mode) { ?>
                                            <a href="#">{{ $c_mode->title }}</a>,
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="widget widget_tags">
                                <i class="icon md-download-2"></i>
                                <h4 class="xsm black bold">Tag</h4>
                                <div class="tagCould">
                                {{ $cources->tags }}
                                    <!-- <a href="#">Design</a>, 
                                    <a href="#">Photoshop</a>, 
                                    <a href="#">Illustrator</a>, 
                                    <a href="">Art</a>, 
                                    <a href="">Graphic Design</a> -->
                                </div>
                            </div>
                            <div class="widget widget_share">
                                <i class="icon md-forward"></i>
                                <h4 class="xsm black bold">Share course</h4>
                                <div class="share-body">
                                    <a target="_blank" href="https://twitter.com/share?url={{ url('course') . '/' . $cources->url_slug }}" class="twitter" title="twitter">
                                        <i class="icon md-twitter"></i>
                                    </a>
                                    <a target="_blank" href="whatsapp://send?text={{ url('course') . '/' . $cources->url_slug }}" class="whatsapp" title="whatsapp">
                                    <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url('course') . '/' . $cources->url_slug }}" class="facebook" title="facebook">
                                        <i class="icon md-facebook-1"></i>
                                    </a>
                                    <a target="_blank" href="#" class="google-plus" title="google plus">
                                        <i class="icon md-google-plus"></i>
                                    </a>
                                    <a href="#" class="mc-btn btn-style-1 py-0 pull-right text-white" data-toggle="modal" data-target="#apply">APPLY NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-7">
                        <div class="tabs-page">
                            <div class="nav-tabs-wrap"><ul class="nav-tabs" role="tablist">
                                <li class="active"><a href="#introduction" role="tab" data-toggle="tab">Introduction</a></li>
                                <li class=""><a href="#faq" role="tab" data-toggle="tab">FAQ</a></li>
                                <li class=""><a href="#review" role="tab" data-toggle="tab">Review</a></li>
                                <li class=""><a href="#student" role="tab" data-toggle="tab">Student</a></li>
                                         <!--<li><a href="#" class="mc-btn btn-style-1 py-0" data-toggle="modal" data-target="#apply">APPLY NOW</a></li>-->
                            <li class="tabs-hr" style="left: 282.828px; width: 56px;"></li></ul></div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- INTRODUCTION -->
                                <div class="tab-pane fade active in" id="introduction">
                                    <h4 class="sm black bold">Introduction</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                    <h4 class="sm black bold">Goal of Course</h4>
                                    <ul class="list-disc">
                                        <li><p>sed diam nonummy nibh euismod tincidunt ut laoreet</p></li>
                                        <li><p>sed diam nonummy nibh euismod tincidunt utrlaoreet</p></li>
                                    </ul>
                                    
                                    <h4 class="sm black bold">About Judgement</h4>
                                    <p>Nunc quis vulputate metus, ac dapibus ligula. Etiam interdum ornare rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam elementum felis diam, non pellentesque est iaculis ac. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ultricies hendrerit diam, eget molestie ipsum gravida vel. Mauris aliquam ante scelerisque odio tincidunt porttitor. Nulla vitae tellus dictum, vehicula elit eu, elementum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam sodales lacinia ligula sed egestas. Suspendisse purus metus, pharetra non convallis eget, aliquet ut nisi. Etiam malesuada porta posuere. Integer eget erat enim. Maecenas rhoncus tincidunt dui id tincidunt. Pellentesque quis dapibus erat.<br><br>Etiam dignissim tellus quis nulla accumsan, eget elementum ipsum blandit. Morbi sodales tellus id nisl porta cursus. Nam nisl mauris, convallis non accumsan ac, auctor sed lacus. Maecenas laoreet, nibh a facilisis sagittis, sem ante facilisis lectus, non porta mi odio sit amet ligula. Phasellus ac dolor nec odio dictum tristique. Donec convallis libero eros, nec imperdiet sem vulputate non. Vestibulum in lacus id nisi pulvinar elementum. Fusce lorem libero, tempus id elit vitae, ultrices tincidunt sapien. Nunc vestibulum libero vel ligula gravida, a convallis massa ultricies. Donec tristique ligula ut turpis auctor, ut ornare elit porta. Morbi sit amet velit laoreet, feugiat purus non, lobortis tellus. Maecenas eu eros sit amet erat condimentum auctor eu at diam. Phasellus id sem nis</p>
                                </div>
                                <!-- END / INTRODUCTION -->
        
                                 <!-- OUTLINE -->
                                <div class="tab-pane fade" id="faq">
        
                                    <!-- SECTION OUTLINE -->
                                     <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                          <div class="panel-heading">
                                            <h4 class="panel-title">
                                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                Collapsible Group Item #1
                                              </a>
                                            </h4>
                                          </div>
                                          <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body p-0">
                                                <!-- start / SECTION OUTLINE -->
                               <div class="section-outline">
                                 
                                   <ul class="section-list">
                                       <li>
                                           <div class="count"><span>1</span></div>
                                           <div class="list-body">
                                               <i class="icon md-camera"></i>
                                               <p><a href="#">you tube links Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                                    <div class="data-lessons">
                                                   <span>36:56</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>2</span></div>
                                           <div class="list-body">
                                               <i class="icon md-gallery-1"></i>
                                                <p><a href="#">JPg image Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                        <div class="data-lessons">
                                                   <span>15 images</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>3</span></div>
                                           <div class="list-body">
                                               <i class="icon md-volume-down"></i>
                                                <p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                               <div class="data-lessons">
                                                   <span>36:56</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>4</span></div>
                                           <div class="list-body">
                                               <i class="icon md-gallery-2"></i>
                                               <p><a href="#">pdf Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                               <div class="data-lessons">
                                                   <span>45 slides</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span><i class="icon md-search"></i></span></div>
                                           <div class="list-body">
                                               <i class="icon md-files"></i>
                                               <p><a href="#"><span>Quizz 1 :</span> Lorem ipsum dolor sit ameUt wisi enim ad minim veniam</a></p>
                                               <div class="data-lessons">
                                                   <span>10 questions</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>a</span></div>
                                           <div class="list-body">
                                               <i class="icon md-files"></i>
                                               <p><a href="#"><span>Assignment :</span> Lorem ipsum dolor sit ameUt wisi enim ad minim veniam</a></p>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
                                   </ul>
                               </div>
                               <!-- END / SECTION OUTLINE -->
                                           </div>
                                          </div>
                                        </div>
                                        <div class="panel panel-default">
                                          <div class="panel-heading">
                                            <h4 class="panel-title">
                                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Collapsible Group Item #2
                                              </a>
                                            </h4>
                                          </div>
                                          <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body p-0">
                                                <!-- start / SECTION OUTLINE -->
                               <div class="section-outline">
                                 
                                   <ul class="section-list">
                                       <li>
                                           <div class="count"><span>1</span></div>
                                           <div class="list-body">
                                               <i class="icon md-camera"></i>
                                               <p><a href="#">you tube links Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                                    <div class="data-lessons">
                                                   <span>36:56</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>2</span></div>
                                           <div class="list-body">
                                               <i class="icon md-gallery-1"></i>
                                                <p><a href="#">JPg image Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                        <div class="data-lessons">
                                                   <span>15 images</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>3</span></div>
                                           <div class="list-body">
                                               <i class="icon md-volume-down"></i>
                                                <p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                               <div class="data-lessons">
                                                   <span>36:56</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>4</span></div>
                                           <div class="list-body">
                                               <i class="icon md-gallery-2"></i>
                                               <p><a href="#">pdf Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                               <div class="data-lessons">
                                                   <span>45 slides</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span><i class="icon md-search"></i></span></div>
                                           <div class="list-body">
                                               <i class="icon md-files"></i>
                                               <p><a href="#"><span>Quizz 1 :</span> Lorem ipsum dolor sit ameUt wisi enim ad minim veniam</a></p>
                                               <div class="data-lessons">
                                                   <span>10 questions</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>a</span></div>
                                           <div class="list-body">
                                               <i class="icon md-files"></i>
                                               <p><a href="#"><span>Assignment :</span> Lorem ipsum dolor sit ameUt wisi enim ad minim veniam</a></p>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
                                   </ul>
                               </div>
                               <!-- END / SECTION OUTLINE -->
                                           </div>
                                          </div>
                                        </div>
                                        <div class="panel panel-default">
                                          <div class="panel-heading">
                                            <h4 class="panel-title">
                                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                Collapsible Group Item #3
                                              </a>
                                            </h4>
                                          </div>
                                          <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body p-0">
                                                <!-- start / SECTION OUTLINE -->
                               <div class="section-outline">
                                 
                                   <ul class="section-list">
                                       <li>
                                           <div class="count"><span>1</span></div>
                                           <div class="list-body">
                                               <i class="icon md-camera"></i>
                                               <p><a href="#">you tube links Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                                    <div class="data-lessons">
                                                   <span>36:56</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>2</span></div>
                                           <div class="list-body">
                                               <i class="icon md-gallery-1"></i>
                                                <p><a href="#">JPg image Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                        <div class="data-lessons">
                                                   <span>15 images</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>3</span></div>
                                           <div class="list-body">
                                               <i class="icon md-volume-down"></i>
                                                <p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                               <div class="data-lessons">
                                                   <span>36:56</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>4</span></div>
                                           <div class="list-body">
                                               <i class="icon md-gallery-2"></i>
                                               <p><a href="#">pdf Lorem ipsum dolor sit amet, consectetuer adipiscing elita</a></p>
                                               <div class="data-lessons">
                                                   <span>45 slides</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span><i class="icon md-search"></i></span></div>
                                           <div class="list-body">
                                               <i class="icon md-files"></i>
                                               <p><a href="#"><span>Quizz 1 :</span> Lorem ipsum dolor sit ameUt wisi enim ad minim veniam</a></p>
                                               <div class="data-lessons">
                                                   <span>10 questions</span>
                                               </div>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
   
                                       <li>
                                           <div class="count"><span>a</span></div>
                                           <div class="list-body">
                                               <i class="icon md-files"></i>
                                               <p><a href="#"><span>Assignment :</span> Lorem ipsum dolor sit ameUt wisi enim ad minim veniam</a></p>
                                           </div>
                                           <a href="#" class="mc-btn-2 btn-style-2">Preview</a>
                                       </li>
                                   </ul>
                               </div>
                               <!-- END / SECTION OUTLINE -->
                                           </div>
                                          </div>
                                        </div>
                                      </div>
                                      </div>
                                <!-- END / OUTLINE -->
        
                                <!-- REVIEW -->
                                <div class="tab-pane fade" id="review">
                                    <div class="total-review">
                                        <h3 class="md black">4 Reviews</h3>
                                        <div class="rating">
                                            <a href="#" class="active"></a>
                                            <a href="#" class="active"></a>
                                            <a href="#" class="active"></a>
                                            <a href="#"></a>
                                            <a href="#"></a>
                                        </div>
                                    </div>  
                                    <ul class="list-review">
                                        <li class="review">
                                            <div class="body-review">
                                                <div class="review-author">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/front/images/team-13.jpg') }}" alt="">
                                                        <i class="icon md-email"></i>
                                                        <i class="icon md-user-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="content-review">
                                                    <h4 class="sm black">
                                                        <a href="#">John Doe</a>
                                                    </h4>
                                                    <div class="rating">
                                                        <a href="#" class="active"></a>
                                                        <a href="#" class="active"></a>
                                                        <a href="#" class="active"></a>
                                                        <a href="#"></a>
                                                        <a href="#"></a>
                                                    </div>
                                 
                                                    <em>5 days ago</em>
                                                    <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="review">
                                            <div class="body-review">
                                                <div class="review-author">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/front/images/team-13.jpg') }}" alt="">
                                                        <i class="icon md-email"></i>
                                                        <i class="icon md-user-plus"></i>
                                                    </a>
                                                    <i class="icon"></i>
                                                    <i class="icon"></i>
                                                </div>
                                                <div class="content-review">
                                                    <h4 class="sm black">
                                                        <a href="#">John Doe</a>
                                                    </h4>
                                                    <div class="rating">
                                                        <a href="#" class="active"></a>
                                                        <a href="#" class="active"></a>
                                                        <a href="#" class="active"></a>
                                                        <a href="#"></a>
                                                        <a href="#"></a>
                                                    </div>
                                                    <em>5 days ago</em>
                                                    <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="review">
                                            <div class="body-review">
                                                <div class="review-author">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/front/images/team-13.jpg') }}" alt="">
                                                        <i class="icon md-email"></i>
                                                        <i class="icon md-user-plus"></i>
                                                    </a>
                                                    <i class="icon"></i>
                                                    <i class="icon"></i>
                                                </div>
                                                <div class="content-review">
                                                    <h4 class="sm black">
                                                        <a href="#">John Doe</a>
                                                    </h4>
                                                    <div class="rating">
                                                        <a href="#" class="active"></a>
                                                        <a href="#" class="active"></a>
                                                        <a href="#" class="active"></a>
                                                        <a href="#"></a>
                                                        <a href="#"></a>
                                                    </div>
                                                    <em>5 days ago</em>
                                                    <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>
                                                </div>
                                            </div>
                                        </li>                        
                                    </ul>
                                    <div class="load-more">
                                        <a href="">
                                        <i class="icon md-time"></i>
                                        Load more previous update</a>
                                    </div>
                                </div>
                                <!-- END / REVIEW -->
        
                                <!-- STUDENT -->
                                <div class="tab-pane fade" id="student">
                                    <h3 class="md black">53618 Students registered</h3>
                                    <div class="tab-list-student">
                                        <ul class="list-student">
                                            <!-- LIST STUDENT -->
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/front/images/team-13.jpg') }}" alt="">
                                                </div>
                                                <div class="list-body">
                                                    <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                                    <span class="address">Hanoi, Vietnam</span>
                                                    <div class="icon-wrap">
                                                        <a href="#"><i class="icon md-email"></i></a>
                                                        <a href="#"><i class="icon md-user-plus"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END / LIST STUDENT -->
        
                                            <!-- LIST STUDENT -->
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/front/images/team-13.jpg') }}" alt="">
                                                </div>
                                                <div class="list-body">
                                                    <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                                    <span class="address">Hanoi, Vietnam</span>
                                                    <div class="icon-wrap">
                                                        <a href="#"><i class="icon md-email"></i></a>
                                                        <a href="#"><i class="icon md-user-plus"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END / LIST STUDENT -->
        
                                            <!-- LIST STUDENT -->
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/front/images/team-13.jpg') }}" alt="">
                                                </div>
                                                <div class="list-body">
                                                    <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                                    <span class="address">Hanoi, Vietnam</span>
                                                    <div class="icon-wrap">
                                                        <a href="#"><i class="icon md-email"></i></a>
                                                        <a href="#"><i class="icon md-user-plus"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END / LIST STUDENT -->
        
                                            <!-- LIST STUDENT -->
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/front/images/team-13.jpg') }}" alt="">
                                                </div>
                                                <div class="list-body">
                                                    <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                                    <span class="address">Hanoi, Vietnam</span>
                                                    <div class="icon-wrap">
                                                        <a href="#"><i class="icon md-email"></i></a>
                                                        <a href="#"><i class="icon md-user-plus"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END / LIST STUDENT -->
        
                                            <!-- LIST STUDENT -->
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/front/images/team-13.jpg') }}" alt="">
                                                </div>
                                                <div class="list-body">
                                                    <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                                    <span class="address">Hanoi, Vietnam</span>
                                                    <div class="icon-wrap">
                                                        <a href="#"><i class="icon md-email"></i></a>
                                                        <a href="#"><i class="icon md-user-plus"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END / LIST STUDENT -->
        
                                            <!-- LIST STUDENT -->
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/front/images/team-13.jpg') }}" alt="">
                                                </div>
                                                <div class="list-body">
                                                    <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                                    <span class="address">Hanoi, Vietnam</span>
                                                    <div class="icon-wrap">
                                                        <a href="#"><i class="icon md-email"></i></a>
                                                        <a href="#"><i class="icon md-user-plus"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END / LIST STUDENT -->
        
                                        </ul>
                                    </div>
                                    <div class="load-more">
                                        <a href="">
                                        <i class="icon md-time"></i>
                                        Load more previous update</a>
                                    </div>
                                </div>
                                <!-- END / STUDENT -->
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / AFTER banner -->
  <!-- FORM CHECKOUT -->
    <!--<div class="form-checkout">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-10 col-md-offset-1">-->
    <!--                <form>-->
    <!--                    <ul id="bar">-->
    <!--                        <li class="active"><span class="count">1</span>Register</li>-->
    <!--                        <li><span class="count">2</span>Order and payment</li>-->
    <!--                        <li><span class="count">3</span>Finish checkout</li>-->
    <!--                    </ul>-->
    <!--                    <span class="closeForm"><i class="icon md-close-1"></i></span>-->
    <!--                    <div class="form-body">-->
                            <!-- fieldsets -->
    <!--                        <fieldset>-->
    <!--                            <div class="row">-->
    <!--                                <div class="col-md-5">-->
    <!--                                    <div class="form-1">-->
    <!--                                        <h3 class="fs-title text-capitalize">sign in</h3>-->
    <!--                                        <div class="form-email">-->
    <!--                                            <input type="text" placeholder="Email">-->
    <!--                                        </div>-->
    <!--                                        <div class="form-password">-->
    <!--                                            <input type="password" placeholder="Password">-->
    <!--                                        </div>-->
    <!--                                        <div class="form-check">-->
    <!--                                            <input type="checkbox" id="check">-->
    <!--                                            <label for="check">-->
    <!--                                            <i class="icon md-check-2"></i>-->
    <!--                                            Remember me</label>-->
    <!--                                            <a href="#">Forget password?</a>-->
    <!--                                        </div>-->
    <!--                                        <div class="form-submit-1">-->
    <!--                                            <input type="button" value="Sign In and Continue" class="next mc-btn btn-style-1">-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->

    <!--                                <div class="col-md-6">-->
    <!--                                    <div class="form-2">-->
    <!--                                        <h3 class="fs-title text-capitalize">New Member</h3>-->
    <!--                                        <div class="form-firstname">-->
    <!--                                            <input type="text" placeholder="First name" />-->
    <!--                                        </div>-->
    <!--                                        <div class="form-lastname">-->
    <!--                                            <input type="text" placeholder="Last name" />-->
    <!--                                        </div>-->
    <!--                                        <div class="form-datebirth">-->
    <!--                                            <input type="text" placeholder="Date of Birth">-->
    <!--                                        </div>-->
    <!--                                        <div class="form-email">-->
    <!--                                            <input type="text" name="pass" placeholder="Annamolly@outlook.com" class="error">-->
    <!--                                            <span class="text-error">this email has been already taken</span>-->
    <!--                                        </div>-->
    <!--                                        <div class="form-password">-->
    <!--                                            <input type="password" name="pass" placeholder="Password" class="valid">-->
    <!--                                        </div>-->
    <!--                                        <div class="form-submit-1">-->
    <!--                                            <input type="button" value="Sign Up and Continue" class="next mc-btn btn-style-1">-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </fieldset>-->

    <!--                        <fieldset>-->
    <!--                            <div class="row">-->
    <!--                                <div class="col-md-5">-->
    <!--                                    <div class="form-1">-->
    <!--                                        <div class="mc-item mc-item-2">-->
    <!--                                            <div class="image-heading">-->
    <!--                                                <img src="images/feature/img-1.jpg" alt="">-->
    <!--                                            </div>-->
    <!--                                            <div class="meta-categories"><a href="#">Web design</a></div>-->
    <!--                                            <div class="content-item">-->
    <!--                                                <div class="image-author">-->
    <!--                                                    <img src="images/avatar-1.jpg" alt="">-->
    <!--                                                </div>-->
    <!--                                                <h4><a href="course-intro.html">The Complete Digital Photography Course Amazon Top Seller</a></h4>-->
    <!--                                                <div class="name-author">-->
    <!--                                                    By <a href="#">Name of Mr or Mrs</a>-->
    <!--                                                </div>-->
    <!--                                            </div>-->
    <!--                                            <div class="ft-item">-->
    <!--                                                <div class="rating">-->
    <!--                                                    <a href="#" class="active"></a>-->
    <!--                                                    <a href="#" class="active"></a>-->
    <!--                                                    <a href="#" class="active"></a>-->
    <!--                                                    <a href="#"></a>-->
    <!--                                                    <a href="#"></a>-->
    <!--                                                </div>-->
    <!--                                                <div class="view-info">-->
    <!--                                                    <i class="icon md-users"></i>-->
    <!--                                                    2568-->
    <!--                                                </div>-->
    <!--                                                <div class="comment-info">-->
    <!--                                                    <i class="icon md-comment"></i>-->
    <!--                                                    25-->
    <!--                                                </div>-->
    <!--                                                <div class="price">-->
    <!--                                                    $190-->
    <!--                                                    <span class="price-old">$134</span>-->
    <!--                                                </div>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="col-md-6">-->
    <!--                                    <div class="form-2">-->
    <!--                                        <h3 class="fs-title">Choose your payment method</h3>-->
    <!--                                        <ul class="pay">-->
    <!--                                            <li>-->
    <!--                                                <input type="radio" name="pay" id="visa">-->
    <!--                                                <label for="visa">-->
    <!--                                                    <i class="icon-radio"></i>-->
    <!--                                                    Visa / Master Card-->
    <!--                                                </label>-->
    <!--                                            </li>-->
    <!--                                            <li>-->
    <!--                                                <input type="radio" name="pay" id="paypal">-->
    <!--                                                <label for="paypal">-->
    <!--                                                    <i class="icon-radio"></i>-->
    <!--                                                    Paypal-->
    <!--                                                </label>-->
    <!--                                            </li>-->
    <!--                                            <li>-->
    <!--                                                <input type="radio" name="pay" id="cash">-->
    <!--                                                <label for="cash">-->
    <!--                                                    <i class="icon-radio"></i>-->
    <!--                                                    Cash-->
    <!--                                                </label>-->
    <!--                                            </li>-->
    <!--                                        </ul>-->

    <!--                                        <div class="form-cardnumber">-->
    <!--                                            <label for="cardnumber">Card number</label>-->
    <!--                                            <input type="text" id="cardnumber">-->
    <!--                                        </div>-->

    <!--                                        <div class="form-expirydate">-->
    <!--                                            <label for="expirydate">Expiry date</label>-->
    <!--                                            <input type="text" id="expirydate">-->
    <!--                                            <input type="text">-->
    <!--                                        </div>-->

    <!--                                        <div class="form-code">-->
    <!--                                            <label for="code">Code</label>-->
    <!--                                            <input type="text" id="code">-->
    <!--                                        </div>-->

    <!--                                        <div class="clearfix"></div>-->

    <!--                                        <div class="form-couponcode">-->
    <!--                                            <label for="couponcode">Coupon code</label>-->
    <!--                                            <input type="text" id="couponcode">-->
    <!--                                        </div>-->

    <!--                                        <div class="form-total">-->
    <!--                                            <h4>Total Payment</h4>-->
    <!--                                            <span class="price">$89</span>-->
    <!--                                        </div>-->
                                            
    <!--                                        <div class="clearfix"></div>-->

    <!--                                        <div class="form-submit-1">-->
    <!--                                            <input type="button" value="Confirm and Finish" class="next mc-btn btn-style-1">-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </fieldset>-->

    <!--                        <fieldset>-->
    <!--                            <div class="row">-->
    <!--                                <div class="col-md-5">-->
    <!--                                    <div class="form-1">-->
    <!--                                        <div class="mc-item mc-item-2">-->
    <!--                                            <div class="image-heading">-->
    <!--                                                <img src="images/feature/img-1.jpg" alt="">-->
    <!--                                            </div>-->
    <!--                                            <div class="meta-categories"><a href="#">Web design</a></div>-->
    <!--                                            <div class="content-item">-->
    <!--                                                <div class="image-author">-->
    <!--                                                    <img src="images/avatar-1.jpg" alt="">-->
    <!--                                                </div>-->
    <!--                                                <h4><a href="course-intro.html">The Complete Digital Photography Course Amazon Top Seller</a></h4>-->
    <!--                                                <div class="name-author">-->
    <!--                                                    By <a href="#">Name of Mr or Mrs</a>-->
    <!--                                                </div>-->
    <!--                                            </div>-->
    <!--                                            <div class="ft-item">-->
    <!--                                                <div class="rating">-->
    <!--                                                    <a href="#" class="active"></a>-->
    <!--                                                    <a href="#" class="active"></a>-->
    <!--                                                    <a href="#" class="active"></a>-->
    <!--                                                    <a href="#"></a>-->
    <!--                                                    <a href="#"></a>-->
    <!--                                                </div>-->
    <!--                                                <div class="view-info">-->
    <!--                                                    <i class="icon md-users"></i>-->
    <!--                                                    2568-->
    <!--                                                </div>-->
    <!--                                                <div class="comment-info">-->
    <!--                                                    <i class="icon md-comment"></i>-->
    <!--                                                    25-->
    <!--                                                </div>-->
    <!--                                                <div class="price">-->
    <!--                                                    $190-->
    <!--                                                    <span class="price-old">$134</span>-->
    <!--                                                </div>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="col-md-6">-->
    <!--                                    <div class="form-2">-->
    <!--                                        <h3 class="fs-title">Thank You For Your Purchase</3>-->
    <!--                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci.</p>-->

    <!--                                        <div class="widget widget_share">-->
    <!--                                            <h4>Share</h4>-->
    <!--                                            <div class="share-body">-->
    <!--                                                <a href="#" class="twitter" title="twitter">-->
    <!--                                                    <i class="icon md-twitter"></i>-->
    <!--                                                </a>-->
    <!--                                                <a href="#" class="pinterest" title="pinterest">-->
    <!--                                                    <i class="icon md-pinterest-1"></i>-->
    <!--                                                </a>-->
    <!--                                                <a href="#" class="facebook" title="facebook">-->
    <!--                                                    <i class="icon md-facebook-1"></i>-->
    <!--                                                </a>-->
    <!--                                                <a href="#" class="google-plus" title="google plus">-->
    <!--                                                    <i class="icon md-google-plus"></i>-->
    <!--                                                </a>-->
    <!--                                            </div>-->
    <!--                                        </div>-->

    <!--                                        <div class="form-submit-1">-->
    <!--                                            <input type="submit" value="Start Learning" class="next mc-btn btn-style-1">-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </fieldset>-->
    <!--                    </div>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- END / FORM CHECKOUT -->
      
     
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
                        <div id="question-1" class="panel-collapse collapse in" style="height:auto;">
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
                            <li><a href="https://www.youtube.com/channel/UCs36AA7UBP7FxzzqnCZ_ZQQ/videos"
                                    target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/icfm-institute/" target=""><i
                                        class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.instagram.com/icfm_institute/" target=""><i
                                        class="fa fa-instagram"></i></a></li>
                            <li><a href="https://twitter.com/icfm_institute" target="_blank"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/icfminstitute/" target=""><i
                                        class="fa fa-facebook"></i></a></li>


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
 <section id="clients">
            <div class="container">
                <div class="wrap">
                    <h3 class="text-center">OUR TRAINING AND ACADEMIC PARTNERS</h3>
                    <div class="border"></div>
                    <div id="testimonial" class="text-center icfm">
                        <div class="feature-course">
                            <div class="row">
                                <div class="clients-slider">
          
                                   <a href=""><img src="{{ asset('assets/front/images/british1_3_11zon.webp') }}" alt=""></a>


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
      <!-- start apply modal -->
<div class="modal fade" id = "apply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModal">Apply Form</h2>
        </div>
        <div class="modal-body">
          <form action="#" method="POST">
           
            <div class="form-group">
                <input class="form-control" type="text" placeholder="First name">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Last name">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Date of Birth">
            </div>
         
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="submit" class="mc-btn btn-style-1" value="Login">
              <input type="submit" class="mc-btn btn-style-1" value="Register">
            </div>
            </form>
          </div>
          <div class="modal-footer">
            <a href="#" class="mc-btn btn-style-1" data-dismiss="modal">
              Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

  <!-- end apply modal -->
   <!-- start tack this course modal -->
    <div class="modal fade" id = "tack-course" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="course_mode_data">
       
            </div>
        </div>
    </div>
  <!-- end tack this course modal -->
 
  <script type="text/javascript">
    //$(".modal-dialog").hide();
    function getPaymentModeWithFees(course_id) {
        $.ajax({
            type: "POST",
            url: "{{ route('get-course-mode') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: course_id,
            },
            success: function (data) {
              $('#course_mode_data').html(data);
            }
        });
    }
</script>
<script>
    function validateMode(){
        var c_mode = document.f4.course_mode_id.value;
        if(c_mode == ''){
            document.getElementById('cf1Error').innerHTML="<br><br>Please Select a Course mode";
            return false;
        }else{
            return true;
        }
    }
</script>
  <script type="text/javascript">
    function getCourseFees(course_mode_id, course_id) {
        $.ajax({
            type: "POST",
            url: "{{ route('get-course-fees') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                course_id: course_id,
                course_mode_id: course_mode_id,
            },
            success: function (fees) {
              $('#selected_course_fees').val(fees);
            }
        });
    }
</script>