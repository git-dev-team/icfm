<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SiteLoginController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\CmsController;
use App\Http\Controllers\admin\AdminTypeController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\CourseFeesController;
use App\Http\Controllers\admin\CourseFeaturesController;
use App\Http\Controllers\admin\CourseProcessController;
use App\Http\Controllers\admin\CourseDiscountController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\FeesTypeController;
use App\Http\Controllers\admin\ManageStudentsController;
use App\Http\Controllers\StateCityController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\AdminMiddleware;

// Route::get('/', function () {
//     return view('welcome');
// });
// Get WEB

Route::get('/', [IndexController::class, 'index']);
Route::get('/course', [IndexController::class, 'course'])->name('course');
Route::get('/course/{course}', [IndexController::class, 'course_details']);
Route::post('/get-course-mode', [IndexController::class, 'course_mode_by_id'])->name('get-course-mode');
Route::post('/get-course-fees', [IndexController::class, 'get_course_fees'])->name('get-course-fees');
Route::post('/pay-now', [IndexController::class, 'pay_now'])->name('pay-now');
Route::post('/apply-coupon-code', [IndexController::class, 'apply_coupon_code'])->name('apply-coupon-code');
Route::post('/online-payment', [IndexController::class, 'online_payment'])->name('online-payment');
Route::get('/thank-you', [IndexController::class, 'thank_you'])->name('thank-you');


Route::match(['get', 'post'], '/get-state', [StateCityController::class, 'get_state'])->name('get-state');
Route::match(['get', 'post'], '/get-city', [StateCityController::class, 'get_city'])->name('get-city');

// Student login 
Route::prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.login');
    Route::get('/login', [StudentController::class, 'index'])->name('student.login');
    Route::post('/login-code', [StudentController::class, 'login_code'])->name('student.login-code');
    Route::get('/signup', [StudentController::class, 'signup'])->name('student.signup');
    Route::post('/signup-code', [StudentController::class, 'signup_code'])->name('student.signup-code');
    Route::get('/forgot-password', [StudentController::class, 'forgot_password'])->name('student.forgot-password');
});

// Student Panel 
Route::prefix('student')->middleware('student_login')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/logout', [StudentController::class, 'logout'])->name('student.logout');
});


// Admin Login 
Route::prefix('site')->group(function () {
    Route::get('/', [SiteLoginController::class, 'index']);
    Route::get('/login', [SiteLoginController::class, 'index']);
    Route::post('/logged-in', [SiteLoginController::class, 'login'])->name('site.logged-in');
    Route::get('/logout', [SiteLoginController::class, 'logout'])->name('site.logout');
});

// Admin Common Functions
Route::prefix('admin')->middleware('site_login')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/change-password', [SiteLoginController::class, 'change_password'])->name('admin.change-password');
    Route::post('/update-password', [SiteLoginController::class, 'update_password'])->name('admin.update-password');
    Route::get('/profile', [SiteLoginController::class, 'profile'])->name('admin.profile');

});

// Company Module
Route::prefix('admin/company')->middleware('site_login')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('admin.company');
    Route::get('/create', [CompanyController::class, 'create'])->name('admin.company.create');
    Route::post('/save', [CompanyController::class, 'save'])->name('admin.company.save');
    Route::post('/details', [CompanyController::class, 'details'])->name('admin.company.details');
    Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('admin.company.edit');
    Route::get('/delete/{id}', [CompanyController::class, 'delete'])->name('admin.company.delete');

});

// Admin Type Module
Route::prefix('admin/type')->middleware('site_login')->group(function () {
    Route::get('/', [AdminTypeController::class, 'index'])->name('admin.type');
    Route::get('/create', [AdminTypeController::class, 'create'])->name('admin.type.create');
    Route::post('/save', [AdminTypeController::class, 'save'])->name('admin.type.save');
    Route::post('/details', [AdminTypeController::class, 'details'])->name('admin.type.details');
    Route::get('/edit/{id}', [AdminTypeController::class, 'edit'])->name('admin.type.edit');
    Route::get('/delete/{id}', [AdminTypeController::class, 'delete'])->name('admin.type.delete');
});

// Admin Type Module
Route::prefix('admin')->middleware('site_login')->group(function () {
    Route::get('/list', [AdminController::class, 'admin_list'])->name('admin.list');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/save', [AdminController::class, 'save'])->name('admin.save');
    Route::post('/details', [AdminController::class, 'details'])->name('admin.details');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
});

// CMS Module
Route::prefix('admin/cms')->middleware('site_login')->group(function () {
    Route::get('/', [CmsController::class, 'index'])->name('admin.cms');
    Route::get('/create', [CmsController::class, 'create'])->name('admin.cms.create');
    Route::post('/save', [CmsController::class, 'save'])->name('admin.cms.save');
    Route::post('/details', [CmsController::class, 'details'])->name('admin.cms.details');
    Route::get('/edit/{id}', [CmsController::class, 'edit'])->name('admin.cms.edit');
    Route::get('/delete/{id}', [CmsController::class, 'delete'])->name('admin.cms.delete');

});

// Banner Module
Route::prefix('admin/banner')->middleware('site_login')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('admin.banner');
    Route::get('/create', [BannerController::class, 'create'])->name('admin.banner.create');
    Route::post('/save', [BannerController::class, 'save'])->name('admin.banner.save');
    Route::post('/details', [BannerController::class, 'details'])->name('admin.banner.details');
    Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
    Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('admin.banner.delete');

});

// Banner Course
Route::prefix('admin/course')->middleware('site_login')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('admin.course');
    Route::get('/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/save', [CourseController::class, 'save'])->name('admin.course.save');
    Route::post('/details', [CourseController::class, 'details'])->name('admin.course.details');
    Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::get('/delete/{id}', [CourseController::class, 'delete'])->name('admin.course.delete');

});

// Course Banner Module
Route::prefix('admin/course/banner')->middleware('site_login')->group(function () {
    // Route::get('/', [BannerController::class, 'course_banner_list'])->name('admin.course.banner');
    Route::get('/', [BannerController::class, 'course_banner_list'])->name('admin.course.banner');
    Route::get('/create', [BannerController::class, 'course_banner_create'])->name('admin.course.banner.create');
    Route::post('/save', [BannerController::class, 'save_course_banner'])->name('admin.course.banner.save');
    Route::post('/details', [BannerController::class, 'details'])->name('admin.course.banner.details');
    Route::get('/edit/{id}', [BannerController::class, 'course_banner_edit'])->name('admin.course.banner.edit');
    Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('admin.course.banner.delete');

});

// Course Fees Module
Route::prefix('admin/course/fees')->middleware('site_login')->group(function () {
    Route::get('/', [CourseFeesController::class, 'index'])->name('admin.course.fees');
    Route::get('/create', [CourseFeesController::class, 'create'])->name('admin.course.fees.create');
    Route::post('/save', [CourseFeesController::class, 'save'])->name('admin.course.fees.save');
    Route::post('/details', [CourseFeesController::class, 'details'])->name('admin.course.fees.details');
    Route::get('/edit/{id}', [CourseFeesController::class, 'edit'])->name('admin.course.fees.edit');
    Route::get('/delete/{id}', [CourseFeesController::class, 'delete'])->name('admin.course.fees.delete');

});

// Course Features Module
Route::prefix('admin/course/features')->middleware('site_login')->group(function () {
    Route::get('/', [CourseFeaturesController::class, 'index'])->name('admin.course.features');
    Route::get('/create', [CourseFeaturesController::class, 'create'])->name('admin.course.features.create');
    Route::post('/save', [CourseFeaturesController::class, 'save'])->name('admin.course.features.save');
    Route::post('/details', [CourseFeaturesController::class, 'details'])->name('admin.course.features.details');
    Route::get('/edit/{id}', [CourseFeaturesController::class, 'edit'])->name('admin.course.features.edit');
    Route::get('/delete/{id}', [CourseFeaturesController::class, 'delete'])->name('admin.course.features.delete');
});

// Course Features Module
Route::prefix('admin/course/process')->middleware('site_login')->group(function () {
    Route::get('/', [CourseProcessController::class, 'index'])->name('admin.course.process');
    Route::get('/create', [CourseProcessController::class, 'create'])->name('admin.course.process.create');
    Route::post('/save', [CourseProcessController::class, 'save'])->name('admin.course.process.save');
    Route::post('/details', [CourseProcessController::class, 'details'])->name('admin.course.process.details');
    Route::get('/edit/{id}', [CourseProcessController::class, 'edit'])->name('admin.course.process.edit');
    Route::get('/delete/{id}', [CourseProcessController::class, 'delete'])->name('admin.course.process.delete');
});

// Discount coupon module
Route::prefix('admin/course/discount')->middleware('site_login')->group(function () {
    Route::get('/', [CourseDiscountController::class, 'index'])->name('admin.course.discount');
    Route::get('/create', [CourseDiscountController::class, 'create'])->name('admin.course.discount.create');
    Route::post('/save', [CourseDiscountController::class, 'save'])->name('admin.course.discount.save');
    Route::post('/details', [CourseDiscountController::class, 'details'])->name('admin.course.discount.details');
    Route::get('/edit/{id}', [CourseDiscountController::class, 'edit'])->name('admin.course.discount.edit');
    Route::get('/delete/{id}', [CourseDiscountController::class, 'delete'])->name('admin.course.discount.delete');
});

// Transactions module
Route::prefix('admin/course/transaction')->middleware('site_login')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('admin.course.transaction');
    // Route::get('/create', [CourseDiscountController::class, 'create'])->name('admin.course.transaction.create');
    // Route::post('/save', [CourseDiscountController::class, 'save'])->name('admin.course.transaction.save');
    // Route::post('/details', [CourseDiscountController::class, 'details'])->name('admin.course.transaction.details');
    // Route::get('/edit/{id}', [CourseDiscountController::class, 'edit'])->name('admin.course.transaction.edit');
    // Route::get('/delete/{id}', [CourseDiscountController::class, 'delete'])->name('admin.course.transaction.delete');
});

// Fees Type module
Route::prefix('admin/course/fees-type')->middleware('site_login')->group(function () {
    Route::get('/', [FeesTypeController::class, 'index'])->name('admin.course.fees-type');
    Route::get('/create', [FeesTypeController::class, 'create'])->name('admin.course.fees-type.create');
    Route::post('/save', [FeesTypeController::class, 'save'])->name('admin.course.fees-type.save');
    Route::post('/details', [FeesTypeController::class, 'details'])->name('admin.course.fees-type.details');
    Route::get('/edit/{id}', [FeesTypeController::class, 'edit'])->name('admin.course.fees-type.edit');
    Route::get('/delete/{id}', [FeesTypeController::class, 'delete'])->name('admin.course.fees-type.delete');
});

// Manage Student module
Route::prefix('admin/student')->middleware('site_login')->group(function () {
    Route::get('/', [ManageStudentsController::class, 'index'])->name('admin.student');
    // Route::get('/create', [FeesTypeController::class, 'create'])->name('admin.course.fees-type.create');
    // Route::post('/save', [FeesTypeController::class, 'save'])->name('admin.course.fees-type.save');
    // Route::post('/details', [FeesTypeController::class, 'details'])->name('admin.course.fees-type.details');
    // Route::get('/edit/{id}', [FeesTypeController::class, 'edit'])->name('admin.course.fees-type.edit');
    // Route::get('/delete/{id}', [FeesTypeController::class, 'delete'])->name('admin.course.fees-type.delete');
});