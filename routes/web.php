<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\momoController;
use App\Http\Controllers\postController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\vnPayController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\sliderController;
use App\Http\Controllers\counponController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\checkOutController;
use App\Http\Controllers\deliveryController;
use App\Http\Controllers\brandProductController;
use App\Http\Controllers\categoryPostController;
use App\Http\Controllers\categoryProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// font-end
Route::get('/', [HomeController::class,'index']);
Route::get('/trang-chu', [HomeController::class, 'index'])->name('trang-chu');
Route::get('/gioi-thieu', [HomeController::class, 'introduce']);
Route::get('/lien-he', [HomeController::class, 'contact']);
// tim kiem san pham
Route::post('/tim-kiem', [HomeController::class, 'tim_kiem']);
Route::post('/autocomplete-ajax', [HomeController::class, 'autocomplete_ajax'])->name('autocomplete_ajax');
// Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_slug}', [categoryProductController::class, 'show_category_home']);

// Thuong hieu san pham trang chu
Route::get('/thuong-hieu-san-pham/{brand_slug}', [brandProductController::class, 'show_brand_home']);

// Danh sach bai viet
Route::get('/danh-muc-bai-viet/{cate_post_slug}', [categoryPostController::class, 'danh_muc_bai_viet']);

// Chi tiet bai viet
Route::get('/bai-viet/{post_slug}', [postController::class, 'bai_viet']);

// chi tiet san pham
Route::get('/chi-tiet-san-pham/{product_slug}', [productController::class, 'detail_product']);
Route::post('/quickly-view', [ProductController::class, 'quickly_view']);
Route::post('/load-comment', [ProductController::class, 'load_comment']);
Route::post('/send-reply', [ProductController::class, 'sendReply'])->name('comment.reply');
Route::post('/sent-comment', [ProductController::class, 'sent_comment']);
Route::get('/danh-sach-san-pham', [ProductController::class, 'list_product_by_type']);
// Route::post('/reply-comment', [ProductController::class, 'storeReply']);
// gio hang
Route::post('/save-cart',[cartController::class,'save_cart']);
Route::get('/show-cart', [cartController::class, 'show_cart']);
Route::get('/delete-from-cart/{id}', [cartController::class, 'delete_from_cart']);
Route::post('/update-cart', [CartController::class, 'update_cart'])->name('cart.update');

// ma giam gia
Route::post('/check-coupon', [CartController::class, 'check_coupon'])->name('check.coupon');

// đăng nhập
Route::post('/login-customer', [checkOutController::class, 'login_customer']);
Route::get('/login-checkout', [checkOutController::class, 'login_checkout']);
Route::post('/add-customer', [checkOutController::class, 'add_customer']);
Route::get('/verify-email', [checkOutController::class, 'verifyEmail']);
Route::get('/logout-checkout', [checkOutController::class, 'logout_checkout']);

// quên mật khẩu
Route::get('/forget-password', [checkOutController::class, 'forget_password']);
Route::post('/recover-password', [checkOutController::class, 'recover_password']);
Route::get('/update-new-password', [checkOutController::class, 'update_new_password']);
Route::post('/update-new-pass', [checkOutController::class, 'update_new_pass']);

// thông tin khách hàng
Route::get('/thong-tin-tai-khoan', [checkOutController::class, 'info_customer']);
Route::get('/change-pass', [checkOutController::class, 'change_pass']);
Route::post('/change-password-customer', [checkOutController::class, 'change_password_customer']);

// dia chi khach hang
Route::get('/address-customer', [checkOutController::class, 'address_customer']);
Route::post('/set-default-shipping', [checkOutController::class, 'setDefaultShipping'])->name('set-default-shipping');
Route::post('/delete-shipping', [CheckoutController::class, 'deleteShipping'])->name('deleteShipping');

// dang nhap bang google
Route::get('/login-customer-google', [checkOutController::class, 'login_customer_google']);
Route::get('/customer/google/callback', [checkOutController::class, 'callback_customer_google']);

// dang nhap bang facebook
Route::get('/login-customer-facebook', [checkOutController::class, 'login_customer_facebook']);
Route::get('/customer/facebook/callback', [checkOutController::class, 'callback_customer_facebook']);

// thanh toán
Route::get('/checkout', [checkOutController::class, 'checkout']);
Route::post('/save-checkout-customer', [checkOutController::class, 'save_checkout_customer']);
Route::post('/save-shipping-address', [checkOutController::class, 'save_shipping_address']);
Route::get('/payment', [checkOutController::class, 'payment'])->name('payment');
Route::get('/get-shipping-fee-auto/{customer_id}', [checkOutController::class, 'getShippingFeeAuto']);
Route::post('/order-place', [checkOutController::class, 'order_place'])->name('order.place');
Route::post('/select-delivery-home', [checkOutController::class, 'select_delivery_home']);
Route::get('/print-order/{order_id}', [checkOutController::class, 'print_order']);

// lich su don hang
Route::get('/history', [checkOutController::class, 'history'])->name('history');
Route::get('/history-order-detail/{order_code}', [checkOutController::class, 'history_order_detail']);
Route::post('/destroy-order-custormer', [checkOutController::class, 'destroy_order_custormer']);

// thanh toan paypal
Route::get('/create-transaction', [PaypalController::class, 'createTransaction'])->name('createTransaction');
Route::post('/process-transaction', [PaypalController::class, 'processTransaction'])->name('processTransaction');
Route::get('/success-transaction', [PaypalController::class, 'successTransaction'])->name('successTransaction');
Route::get('/cancel-transaction', [PaypalController::class, 'cancelTransaction'])->name('cancelTransaction');

// thanh toan VNpay
Route::post('/vnpay-payment', [vnPayController::class, 'vnpay_payment'])->name('vnpay_payment');
Route::get('/vnpay_return', [vnPayController::class, 'vnpay_return']);

// thanh toan momo
Route::post('/momo-payment', [momoController::class, 'momo_payment'])->name('momo_payment');
Route::get('/momo_return', [momoController::class, 'momo_return'])->name('momo_return');

// back-end
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'showDashboard']);
Route::get('/logout',[AdminController::class,'logout']);
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);
Route::post('/filter-by-date',[AdminController::class,'filter_date']);
Route::post('/dashboard-filter',[AdminController::class,'dashboard_filter']);
Route::post('/days-order',[AdminController::class,'days_order']);
Route::get('/visitor-data', [AdminController::class, 'visitor_data']);
// Banner
Route::get('/add-slider',[sliderController::class,'add_slider']);
Route::post('/save-slider',[sliderController::class,'save_slider']);
Route::get('/delete-slider/{slider_id}',[sliderController::class,'delete_slider']);
Route::get('/all-slider',[sliderController::class,'all_slider']);
Route::get('/unactive-slider/{slider_id}',[sliderController::class,'unactive_slider']);
Route::get('/active-slider/{slider_id}',[sliderController::class,'active_slider']);

// Category Product
Route::get('/add-category-product',[categoryProductController::class,'add_category_product']);
Route::post('/save-category-product',[categoryProductController::class,'save_category_product']);

Route::get('/edit-category-product/{category_product_id}',[categoryProductController::class,'edit_category_product']);
Route::post('/update-category-product/{category_product_id}',[categoryProductController::class,'update_category_product']);

Route::get('/delete-category-product/{category_product_id}',[categoryProductController::class,'delete_category_product']);
Route::get('/all-category-product',[categoryProductController::class,'all_category_product']);

Route::get('/unactive-category-product/{category_product_id}',[categoryProductController::class,'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[categoryProductController::class,'active_category_product']);
Route::post('/arrange-category',[categoryProductController::class,'arrange_category']);



// Brand Product
Route::get('/add-brand-product',[brandProductController::class,'add_brand_product']);
Route::post('/save-brand-product',[brandProductController::class,'save_brand_product']);

Route::get('/edit-brand-product/{brand_product_id}',[brandProductController::class,'edit_brand_product']);
Route::post('/update-brand-product/{brand_product_id}',[brandProductController::class,'update_brand_product']);

Route::get('/delete-brand-product/{brand_product_id}',[brandProductController::class,'delete_brand_product']);
Route::get('/all-brand-product',[brandProductController::class,'all_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}',[brandProductController::class,'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}',[brandProductController::class,'active_brand_product']);


// Product
Route::get('/add-product',[productController::class,'add_product']);
Route::post('/save-product',[productController::class,'save_product']);

Route::get('/edit-product/{product_id}',[productController::class,'edit_product']);
Route::post('/update-product/{product_id}',[productController::class,'update_product']);

Route::get('/delete-product/{product_id}',[productController::class,'delete_product']);
Route::get('/all-product',[productController::class,'all_product']);
Route::get('/manage-warehouse',[productController::class,'manage_warehouse']);
Route::get('/unactive-product/{product_id}',[productController::class,'unactive_product']);
Route::get('/active-product/{product_id}',[productController::class,'active_product']);

Route::post('/uploads-ckeditor',[productController::class,'uploads_ckeditor']);
Route::get('/file-browser',[productController::class,'file_browser']);

// nhap hang
Route::get('/import-product',[productController::class,'import_product']);
Route::post('/submit-import',[productController::class,'submit_import']);

// thêm vị cho sản phẩm
Route::get('/add-taste', [productController::class, 'add_taste']);
Route::post('/save-taste', [productController::class, 'save_taste']);


// them thu vien anh vao cho san pham
Route::get('/add-gallery/{product_id}',[galleryController::class,'add_gallery']);
Route::post('/select-gallery',[galleryController::class,'select_gallery']);
Route::post('/insert-gallery/{pro_id}',[galleryController::class,'insert_gallery']);
Route::post('/update-gallery-name', [GalleryController::class, 'update_gallery_name'])->name('update-gallery-name');
Route::post('/delete-gallery', [GalleryController::class, 'delete_gallery'])->name('delete-gallery');
Route::post('/update-image-gal', [GalleryController::class, 'update_image_gal'])->name('update-image-gal');


// manage order bang db
Route::get('/manage-order',[checkOutController::class,'manage_order']);
Route::get('/view-order/{order_id}',[checkOutController::class,'view_order']);
Route::get('/delete-order/{order_id}',[checkOutController::class,'delete_order']);
Route::post('/update-order-status', [checkOutController::class, 'updateStatus'])->name('order.updateStatus');

// ma giam gia bang model
Route::get('/add-counpon',[counponController::class,'add_counpon']);
Route::post('/save-counpon',[counponController::class,'save_counpon']);
Route::get('/all-counpon',[counponController::class,'all_counpon']);
Route::get('/delete-counpon/{counpon_id}',[counponController::class,'delete_counpon']);
Route::get('/send-counpon/{counpon_id}',[counponController::class,'send_counpon']);
Route::get('/view-counpon',[counponController::class,'view_counpon']);

// phi van chuyen
Route::get('/add-fee-delivery',[deliveryController::class,'add_fee_delivery']);
Route::post('/select-delivery',[deliveryController::class,'select_delivery']);
Route::post('/save-fee-delivery',[deliveryController::class,'save_fee_delivery']);
Route::get('/all-fee-delivery',[deliveryController::class,'all_fee_delivery']);
Route::get('/delete-delivery/{fee_id}',[deliveryController::class,'delete_delivery']);

// danh muc bai viet
Route::get('/add-category-post',[categoryPostController::class,'add_category_post']);
Route::get('/delete-category-post/{cate_post_id}',[categoryPostController::class,'delete_category_post']);
Route::post('/save-category-post',[categoryPostController::class,'save_category_post']);
Route::get('/edit-category-post/{cate_post_id}',[categoryPostController::class,'edit_category_post']);
Route::post('/update-category-post/{cate_post_id}',[categoryPostController::class,'update_category_post']);
Route::get('/all-category-post',[categoryPostController::class,'all_category_post']);
Route::get('/unactive-category-post/{cate_post_slug}',[categoryPostController::class,'unactive_category_post']);
Route::get('/active-category-post/{cate_post_slug}',[categoryPostController::class,'active_category_post']);

// bai viet
Route::get('/add-post',[postController::class,'add_post']);
Route::get('/delete-post/{post_id}',[postController::class,'delete_post']);
Route::post('/save-post',[postController::class,'save_post']);
Route::get('/edit-post/{post_id}',[postController::class,'edit_post']);
Route::post('/update-post/{post_id}',[postController::class,'update_post']);
Route::get('/all-post',[postController::class,'all_post']);
Route::get('/unactive-post/{post_id}',[postController::class,'unactive_post']);
Route::get('/active-post/{post_id}',[postController::class,'active_post']);

// binh luan
Route::get('/list-comment',[productController::class,'list_comment']);
Route::post('/allow-comment',[productController::class,'allow_comment']);
Route::post('/reply-comment',[productController::class,'reply_comment']);
Route::get('/delete-comment/{comment_id}',[productController::class,'delete_comment']);


// người dùng
Route::get('/list-customer',[AdminController::class,'list_customer'])->name('list_customer');
Route::post('/update-role/{customer_id}', [AdminController::class, 'updateRole'])->name('update_role');
