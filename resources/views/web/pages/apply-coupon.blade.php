<?php
   use Illuminate\Support\Str; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- // Meta info -->
      <title>Learn Stock Market Courses at ICFM Institute</title>
      <meta name="description" content="ICFM is a leading Stock market Courses institute in Delhi NCR  that offers share market courses, intraday trading course, ALGO Trader Course, Derivatives Courses, Option Trading Course, Scalping Trading, Internship Program, Career Courses in Stock Market" />
      <meta name="keywords" content="Share Market trading Institute, Share Trading Course, Stock Market courses, Stock Market Training, Intraday Trading Course, Online Trading Course, Trading Academy, Professional Trading Online Course, Option Trading Course Near Me, Derivatives Market Courses In Delhi, Us Stock Market Course, Stock Trading Courses, Share market training in Delhi, Jobs In Stock Market, AlGO Trading, Technical Analysis Course, Best institute for stock market, NSE Stock Market Courses, NISM Courses, NCFM Courses, NCFM Certification, NISM Certification" />
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/front/images/fav.png') }}">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="format-detection" content="telephone=no">
      <!-- Google font -->
      <link href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css' rel='stylesheet' type='text/css'>
      <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.theme.default.css' rel='stylesheet' type='text/css'> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/library/bootstrap.min.css')}}">
      <!-- <link rel="stylesheet" type="text/css" href="css/library/font-awesome.min.css"> -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/library/owl.carousel.css')}}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/md-font.css')}}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/responsive.css')}}">
      <!-- ----------------------------- payment razor pay cdn -------------------------------- -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <!-- ----------------------------- payment razor pay cdn -------------------------------- -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <style>
         .py-1{
         padding-top: 5px;
         padding-bottom: 5px;
         }
         .py-5{padding-top:50px !important; padding-bottom:50px !important;}
         .p-5{padding:50px !important;}
         .discount{
         display: flex;
         justify-content: space-between;
         align-items: center;}
         input#couponcode {
         height: 39px;
         border-radius: 5px;
         border-color: #fcc101;
         width: 80%;
         padding: 10px;
         }
         .form-couponcode{
         display: flex;
         align-items: center;
         justify-content: space-between;}
         .discount.bold{
         font-size: 18px;
         font-weight: 800;
         }
         .box-shadow10{ box-shadow: 0px 0px 4px 0px #807d7d;
         padding: 25px 15px;
         height: 550px;
         }
         #pay-page .tabs-page {
         padding-left: 0px;
         }
         #pay-page .tab-content {
         height: auto;
         overflow-y: auto;
         overflow-x: hidden;
         box-shadow: none;
         padding: 0px;
         margin-top: 15px;
         }
         #pay-page .tabs-page .nav-tabs {
         width: 450px;
         }
         #pay-page .nav-tabs li a {
         padding-top: 0px;
         padding-bottom: 15px;
         }
         #pay-page .mc-item-2:hover {
         box-shadow: none;
         }
         .mt-3{margin-top: 25px !important;}
      </style>
   </head>
   <body id="page-top" class="home">
      <!-- PAGE WRAP -->
      <div id="page-wrap">
         <!-- PRELOADER -->
         <div id="preloader">
            <div class="pre-icon">
               <div class="pre-item pre-item-1"></div>
               <div class="pre-item pre-item-2"></div>
               <div class="pre-item pre-item-3"></div>
               <div class="pre-item pre-item-4"></div>
            </div>
         </div>
         <!-- END / PRELOADER -->
         <!-- END / FORM CHECKOUT -->
         <!--start payment -->
         <section class="p-5" id="pay-page">
            <div class="container">
               <div class="row">
                  <div class="col-md-1 col-lg-1"></div>
                  <div class="col-md-5 col-lg-5">
                     <div class="form-1 box-shadow10">
                        <div class="mc-item mc-item-2">
                           <div class="image-heading">
                              <img src="{{ asset('') . $course->image }}" alt="">
                           </div>
                           <div class="meta-categories"><a href="#">Web design</a></div>
                           <div class="content-item">
                              <div class="image-author">
                                 <img src="{{ asset('assets/front/images/avatar-1.jpg') }}" alt="">
                              </div>
                              <div class="mt-0 h4 py-1">
                                 By <a href="#">{{ $course->created_by }}</a>
                              </div>
                              <h4>{{ Str::of($course->short_description)->words(50, ' ...') }}</h4>
                           </div>
                           <!-- <div class="ft-item">
                              <div class="rating">
                                  <a href="#" class="active"></a>
                                  <a href="#" class="active"></a>
                                  <a href="#" class="active"></a>
                                  <a href="#"></a>
                                  <a href="#"></a>
                              </div>
                              <div class="view-info">
                                  <i class="icon md-users"></i>
                                  2568
                              </div>
                              <div class="comment-info">
                                  <i class="icon md-comment"></i>
                                  25
                              </div>
                              </div> -->
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5 col-lg-5 box-shadow10">
                     <div class="discount">
                        <img  width="80" src="{{ asset('') . $course->image }}" alt="">
                        <div class="discount-body">
                           <span class="course">{{ $course->title }}</span><br>
                           <small class="mode">{{ $fees->course_mode_title }} </small>
                        </div>
                        <div class="price">
                           ₹{{ $fees->amount }}
                           <!-- <span class="price-old">₹{{ $course->total_fees }}</span> -->
                        </div>
                     </div>
                     <hr>
                     <!---->
                     <div class="tabs-page">
                        <div class="nav-tabs-wrap">
                           <div class="nav-tabs-wrap">
                              <ul class="nav-tabs" role="tablist">
                                 <li class="active"><a href="#online" role="tab" data-toggle="tab">online Payment</input></a></li>
                                 <li class=""><a href="#offline" role="tab" data-toggle="tab">offline Payment</a></li>
                                 <li class=""><a href="#installment" role="tab" data-toggle="tab">Installment</a></li>
                                 <li class=""><a href="#emi" role="tab" data-toggle="tab">EMI</a></li>
                                 <!---->
                                 <!--                        <label class="radio-inline">-->
                                 <!--    <input type="radio"  checked="" value="2">Online Course</input>-->
                                 <!--</label>-->
                                 <!---->
                                 <li class="tabs-hr" style="left: 0px; width: 84px;"></li>
                                 <li class="tabs-hr" style="left: 0px; width: 84px;"></li>
                              </ul>
                           </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                           <!--START online Payment -->
                           <div class="tab-pane fade active in" id="online">
                              <!---->
                              <div class="">
                                 <form  action="{{ route('pay-now') }}" method="post" id="applyCouponForm">
                                    @csrf
                                    <div class="form">
                                       <div class="form-couponcode">
                                          <!-- <label for="couponcode">Coupon code</label> -->
                                          <input type="text" placeholder="Past Coupon code" <?php if (!empty($coupon_code)) { ?> Readonly <?php } ?>name="couponcode" id="couponcode">
                                          <input type="hidden" name="course_id" id="coupon_course_id" value="{{ $course->id }}">
                                          <input type="hidden" name="course_mode_id" id="coupon_course_mode_id" value="{{ $fees->course_mode_id }}">
                                          <?php if (!empty($coupon_code)) { ?>
                                          <button class="btn btn-success" disabled>Applied</button>
                                          <?php } else { ?> 
                                          <input type="button" value="Apply" onclick="validateCoupon()" class="next mc-btn btn-style-1">
                                          <?php } ?>
                                       </div>
                                       <span class="text-danger" id="couponcodeError"></span>
                                    </div>
                                 </form>
                              </div>
                              <hr>
                              <div class="">
                                 <div class="discount">
                                    <div class="discount-body">
                                       <span class="course">Course Fees</span>
                                    </div>
                                    <div class="price">
                                       ₹{{ $fees->amount }}
                                    </div>
                                 </div>
                                 <div class="discount">
                                    <div class="discount-body">
                                       <span class="course">Coupon Discount</span>
                                    </div>
                                    <div class="price">₹{{ $discount }}</div>
                                 </div>
                              </div>
                              <!--  -->
                              <hr>
                              <div class="">
                                 <div class="discount bold">
                                    <div class="discount-body">
                                       <span class="course">Total</span>
                                    </div>
                                    <div class="price">
                                       ₹{{ $amount }}
                                       <!-- <span class="price-old">₹{{ $course->total_fees }}</span> -->
                                    </div>
                                 </div>
                                  <form action="{{ route('online-payment') }}" method="POST" class="mt-2" id="payonline">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $student_id }}">
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <input type="hidden" name="course_mode_id" value="{{ $fees->course_mode_id }}">
                                    <input type="hidden" name="payment_method" id="payment_method" value="online">
                                    <input type="hidden" name="coupon_code" value="{{ $coupon_code }}" id="coupon_code">
                                    <input type="hidden" name="razorpay_id" value="" id="razorpay_id">
                                    <input type="hidden" name="amount" value="" id="amount">
                                    <input type="hidden" name="course_fees" value="{{ $amount }}">
                                    <input type="hidden" name="discount" value="{{ $discount }}">
                                    <input type="hidden" name="txn_id" value="{{ $txn_id }}" id="txn_id">
                                    <input type="hidden" name="status" value="1">
                                    <button type="button" class="btn btn-default next mc-btn btn-style-1" onclick="pay_online()">Pay Now</button>
                                 </form>
                                 <!-- <button type="button" class="btn btn-default next mc-btn btn-style-1 mt-3" onclick="pay_online()">Pay Now</button> -->
                              </div>
                              <!--  -->
                           </div>
                           <!-- END / online Payment -->
                           <!-- START offline Payment -->
                           <div class="tab-pane fade" id="offline">
                              <div class="discount">
                                 <div class="discount-body">
                                    <span class="course">Course Fees</span>
                                 </div>
                                 <div class="price">
                                    ₹{{ $fees->amount }}
                                 </div>
                              </div>
                              <div class="discount">
                                 <div class="discount-body">
                                    <span class="course">Coupon Discount</span>
                                 </div>
                                 <div class="price">₹0</div>
                              </div>
                              <!--  -->
                              <hr>
                              <div class="discount bold">
                                 <div class="discount-body">
                                    <span class="course">Total</span>
                                 </div>
                                 <div class="price">
                                    ₹{{ $amount }}
                                    <span class="price-old">₹{{ $course->total_fees }}</span>
                                 </div>
                              </div>
                                <form action="{{ route('online-payment') }}" method="POST" class="mt-2" >
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $student_id }}">
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <input type="hidden" name="course_mode_id" value="{{ $fees->course_mode_id }}">
                                    <input type="hidden" name="payment_method" id="payment_method" value="offline">
                                    <input type="hidden" name="coupon_code" value="">
                                    <input type="hidden" name="razorpay_id" value="" >
                                    <input type="hidden" name="amount" value="{{ $fees->amount }}" >
                                    <input type="hidden" name="course_fees" value="{{ $amount }}">
                                    <input type="hidden" name="discount" value="0">
                                    <input type="hidden" name="txn_id" value="{{ $txn_id }}" id="txn_id">
                                    <input type="hidden" name="status" value="0">
                                    <button type="submit" class="btn btn-default next mc-btn btn-style-1" >Pay Letter</button>
                                </form>
                           </div>
                           <!-- END / offline Payment -->
                           <!-- START intrest -->
                           <div class="tab-pane fade" id="installment">
                              <div class="discount">
                                 <div class="discount-body">
                                    <span class="course">Course Fees</span>
                                 </div>
                                 <div class="price">
                                    ₹{{ $fees->amount }}
                                 </div>
                              </div>
                              <!-- <div class="discount">
                                 <div class="discount-body">
                                    <span class="course">Coupon Discount</span>
                                 </div>
                                 <div class="price">₹{{ $discount }}</div>
                              </div> -->
                              <!--  -->
                              <hr>
                              <div class="discount bold">
                                 <div class="discount-body">
                                    <span class="course">Initial Deposit </span>
                                 </div>
                                 <div class="price">
                                    ₹{{ $installment_amount }}
                                 </div>
                              </div>
                              <form action="{{ route('online-payment') }}" method="POST" class="mt-2" id="payinstallment">
                                 @csrf
                                 <input type="hidden" name="user_id" value="{{ $student_id }}">
                                 <input type="hidden" name="course_id" value="{{ $course->id }}">
                                 <input type="hidden" name="course_mode_id" value="{{ $fees->course_mode_id }}">
                                 <input type="hidden" name="payment_method" id="installment_payment_method" value="installment">
                                 <input type="hidden" name="coupon_code" value="" id="coupon_code">
                                 <input type="hidden" name="razorpay_id" value="" id="installment_razorpay_id">
                                 <input type="hidden" name="amount" value="" id="installment_amount">
                                 <input type="hidden" name="course_fees" value="{{ $fees->amount }}">
                                 <input type="hidden" name="installment_id" value="{{ $installment->id }}">
                                 <input type="hidden" name="installment_type" value="{{ $installment->installment }}">
                                 <!-- <input type="hidden" name="discount" value=""> -->
                                 <input type="hidden" name="txn_id" value="{{ $txn_id }}" id="txn_id">
                                 <input type="hidden" name="status" value="1">
                                 <button type="button" class="btn btn-default next mc-btn btn-style-1" onclick="pay_installment()">Pay Now</button>
                              </form>
                           </div>
                           <!-- END / intrest -->
                           <!-- START EMI -->
                           <div class="tab-pane fade" id="emi">
                              <div class="discount">
                                 <div class="discount-body">
                                    <span class="course">Course Fees</span>
                                 </div>
                                 <div class="price">
                                    ₹{{ $fees->amount }}
                                 </div>
                              </div>
                              <div class="discount">
                                 <div class="discount-body">
                                    <span class="course">Initial EMI</span>
                                 </div>
                                 <div class="price">₹{{ $emi_amount }}</div>
                              </div>
                              <div class="discount">
                                 <div class="discount-body">
                                    <span class="course">File Charge</span>
                                 </div>
                                 <div class="price">+₹{{ $file_charge->amount }}</div>
                              </div>
                              <!--  -->
                              <hr>
                              <div class="discount bold">
                                 <div class="discount-body">
                                    <span class="course">Total Initial EMI Deposit</span>
                                 </div>
                                 <div class="price">
                                    ₹{{ $emi_amount+$file_charge->amount }}
                                 </div>
                              </div>
                              <form action="{{ route('online-payment') }}" method="POST" class="mt-2" id="payemi">
                                 @csrf
                                 <input type="hidden" name="user_id" value="{{ $student_id }}">
                                 <input type="hidden" name="course_id" value="{{ $course->id }}">
                                 <input type="hidden" name="course_mode_id" value="{{ $fees->course_mode_id }}">
                                 <input type="hidden" name="payment_method" id="emi_payment_method" value="emi">
                                 <input type="hidden" name="coupon_code" value="" id="coupon_code">
                                 <input type="hidden" name="razorpay_id" value="" id="emi_razorpay_id">
                                 <input type="hidden" name="amount" value="" id="emi_amount">
                                 <input type="hidden" name="course_fees" value="{{ $fees->amount }}">
                                 <input type="hidden" name="installment_id" value="{{ $emi->id }}">
                                 <input type="hidden" name="installment_type" value="{{ $emi->installment }}">
                                 <!-- <input type="hidden" name="discount" value=""> -->
                                 <input type="hidden" name="txn_id" value="{{ $txn_id }}" id="txn_id">
                                 <input type="hidden" name="status" value="1">
                                 <button type="button" class="btn btn-default next mc-btn btn-style-1" onclick="pay_emi()">Pay Now</button>
                              </form>
                           </div>
                           <!-- END / EMI -->
                        </div>
                     </div>
                  </div>
                  <div class="col-md-1 col-lg-1"></div>
               </div>
            </div>
         </section>
         <!--end  payment-->
      </div>
      <!-- END / PAGE WRAP -->
      <!-- Load jQuery -->
      <script type="text/javascript" src="{{ asset('assets/front/js/library/jquery-1.11.0.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/front/js/library/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/front/js/library/jquery.owl.carousel.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/front/js/library/jquery.appear.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/front/js/library/perfect-scrollbar.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/front/js/library/jquery.easing.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/front/js/scripts.js') }}"></script>
      <!-- ----------------------------- Apply Coupon Code -------------------------------- -->
      <script>
         function validateCoupon()
         {
             var coupon_code = $('#couponcode').val();
             var course_id = $('#coupon_course_id').val();
             var course_mode_id = $('#coupon_course_mode_id').val();
             var status = false;
             if(coupon_code == ''){
                 document.getElementById('couponcodeError').innerHTML = 'Please enter coupon code';
             }else{
                 $.ajax({
                     type: "POST",
                     url: "{{ route('apply-coupon-code') }}",
                     data: {
                         _token: $('meta[name="csrf-token"]').attr('content'),
                         couponcode: coupon_code,
                         course_id: course_id,
                         course_mode_id: course_mode_id
                     },
                     success: function (response) {
                      if(response.status == false){
                         $('#couponcodeError').html(response.message);
                      }else{
                         $('#coupon_code').val(coupon_code);
                         $('#couponcodeError').html('');
                         jQuery('#applyCouponForm').submit();
                      }
                     }
                 });
             }
         } 
      </script>
      <!-- ----------------------------- Apply Coupon Code -------------------------------- -->

      <!-- ----------------------------- payment razor pay cdn -------------------------------- -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <!-- // online, offline payment -->
      <script>
         function pay_online() {
             var method = $('#payment_method').val();
             if (method == 'online') {
                 var amount = '{{ $amount }}'
                 var totalamount1 = amount.replace(/,/g, "");
                 var totalamount = totalamount1 * 100;
                 var options = {
                     "key": "rzp_test_LJNCkP4QOtRNkP",
                     "amount": totalamount,
                     "name": "ICFM",
                     "description": "Pay Safe",
                     "image": "{{ asset('assets/front/images/fav.png') }}",
                     "handler": function(response) {
                         jQuery('#razorpay_id').val(response.razorpay_payment_id);
                         jQuery('#amount').val(amount);
                         jQuery('#payonline').submit();
                     },
                     "prefill": {
                         "name": "10p",
                         "email": "10p@yopmail.com",
                         "contact": "7830596768"
                     },
                     "notes": {
                         "address": "user address"
                     },
                     "theme": {
                         "color": "#182388" // screen color
                     },
                     "modal": {
                         "ondismiss": function() {
                             $("#loaderridd").hide();
                             $('.mask').hide();
                         }
                     }
                 };
                 var propay = new Razorpay(options);
                 propay.open();
             } else {
                 jQuery('#payonline').submit();
             }
         }
      </script>
       <!-- // installment payment -->
       <script>
         function pay_installment() {
             var method = $('#installment_payment_method').val();
             if (method == 'installment') {
                 var amount = '{{ $installment_amount }}'
                 var totalamount1 = amount.replace(/,/g, "");
                 var totalamount = totalamount1 * 100;
                 var options = {
                     "key": "rzp_test_LJNCkP4QOtRNkP",
                     "amount": totalamount,
                     "name": "ICFM",
                     "description": "Pay Safe",
                     "image": "{{ asset('assets/front/images/fav.png') }}",
                     "handler": function(response) {
                         jQuery('#installment_razorpay_id').val(response.razorpay_payment_id);
                         jQuery('#installment_amount').val(amount);
                         jQuery('#payinstallment').submit();
                     },
                     "prefill": {
                         "name": "10p",
                         "email": "10p@yopmail.com",
                         "contact": "7830596768"
                     },
                     "notes": {
                         "address": "user address"
                     },
                     "theme": {
                         "color": "#182388" // screen color
                     },
                     "modal": {
                         "ondismiss": function() {
                             $("#loaderridd").hide();
                             $('.mask').hide();
                         }
                     }
                 };
                 var propay = new Razorpay(options);
                 propay.open();
             } else {
                 jQuery('#payinstallment').submit();
             }
         }
      </script>
       <!-- // installment payment -->
       <script>
         function pay_emi() {
             var method = $('#emi_payment_method').val();
             if (method == 'emi') {
                 var amount = '{{ $emi_amount+$file_charge->amount }}'
                 var totalamount1 = amount.replace(/,/g, "");
                 var totalamount = totalamount1 * 100;
                 var options = {
                     "key": "rzp_test_LJNCkP4QOtRNkP",
                     "amount": totalamount,
                     "name": "ICFM",
                     "description": "Pay Safe",
                     "image": "{{ asset('assets/front/images/fav.png') }}",
                     "handler": function(response) {
                         jQuery('#emi_razorpay_id').val(response.razorpay_payment_id);
                         jQuery('#emi_amount').val(amount);
                         jQuery('#payemi').submit();
                     },
                     "prefill": {
                         "name": "10p",
                         "email": "10p@yopmail.com",
                         "contact": "7830596768"
                     },
                     "notes": {
                         "address": "user address"
                     },
                     "theme": {
                         "color": "#182388" // screen color
                     },
                     "modal": {
                         "ondismiss": function() {
                             $("#loaderridd").hide();
                             $('.mask').hide();
                         }
                     }
                 };
                 var propay = new Razorpay(options);
                 propay.open();
             } else {
                 jQuery('#payemi').submit();
             }
         }
      </script>
      <!-- ----------------------------- payment razor pay cdn -------------------------------- -->
   </body>
</html>
