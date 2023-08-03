<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BigposterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Test2Controller;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DelivermanController;
use App\Http\Controllers\DelivertrackingController;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mail12;
use App\Http\Controllers\blogController;
use App\Http\Controllers\wishListsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\BarController;
use App\Http\Controllers\TodoController;

use PSpell\Config;

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

// Route::get('/',[HomeController::class,'signup'])->name('signup');

Route::get('/',[HomeController::class,'main'])->name('main');

Route::post('/',[HomeController::class,'main'])->name('main');

Route::get('/signup',[HomeController::class,'signup'])->name('signup');

Route::post('/signup',[UserController::class,'signup'])->name('signup');

Route::get('/login',[HomeController::class,'login'])->name('login');

Route::post('/login',[UserController::class,'logging'])->name('logging');

// Route::get('/main',[HomeController::class,'main'])->name('main')->middleware('auth');

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard')->middleware('auth','admin');

Route::get('/dashboard',[DashboardController::class,'adminUser'])->name('dashboard')->middleware('auth','admin');

Route::get('/shop',[HomeController::class,'shop'])->name('shop');

Route::get('/readmore',[HomeController::class,'readmore'])->name('readmore');

Route::get('/cart',[CartController::class,'cart'])->name('cart');

Route::get('/incDecprice',[CartController::class,'incDecprice'])->name('incDecprice');

Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');

Route::get('/checkout',[CheckoutController::class,'getDatas'])->name('checkout');

Route::get('/data',[HomeController::class,'data'])->name('data');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/products',[AdminController::class,'products'])->name('products')->middleware('auth','admin');

Route::get('/addproducts',[ProductsController::class,'addProducts'])->name('add-products');

Route::get('/specialproducts',[SpecialController::class,'SpecialProducts'])->name('special-products');

Route::post('/specialproducts',[SpecialController::class,'addSpecialProducts'])->name('special-products');

Route::get('/priceFilter',[HomeController::class,'priceFilter'])->name('priceFilter');

Route::get('/boxFilter',[HomeController::class,'boxFilter'])->name('boxFilter');

Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::post('/contact', [ContactController::class, 'contact'])->name('contact');

Route::get('/contacts',[AdminController::class,'contacts'])->name('contacts');

Route::post('/products',[ProductsController::class,'products'])->name('products');

Route::get('/category',[AdminController::class,'category'])->name('category')->middleware('auth','admin');

Route::post('/category',[CategoryController::class,'category'])->name('category');

Route::post('/brander',[BrandController::class,'brander'])->name('brander');
 
Route::post('/add-cart',[CartController::class,'addCart'])->name('add-cart');

Route::post('/wishLists',[wishListsController::class,'addWishlist'])->name('wishLists');
Route::get('/wishLists',[wishListsController::class,'UserWishlist'])->name('wishLists');
Route::get('/remove/wishLists/{id}',[wishListsController::class,'RemoveWishlist'])->name('wishLists.remove');

Route::post('/deldeliverboy',[DelivermanController::class,"Deldeliverboy"])->name('deldeliverboy');

Route::post('/delorders',[OrderController::class,"delorders"])->name('delorders');

Route::post('/delete-cart/{id}',[CartController::class,'deleteCart'])->name('deletecart');

Route::get('/brander',[BrandController::class,'getBrander'])->name('brander');

Route::get('/delete/{id}',[AdminController::class,'delete'])->name('delete')->middleware('auth','admin');

Route::get('/branddelete/{id}',[BrandController::class,'deletebrand'])->name('deletebrand')->middleware('auth','admin');

Route::get('/productdelete/{id}',[AdminController::class,'productdelete'])->name('productdelete')->middleware('auth','admin');

Route::get('/editcategory/{id}',[AdminController::class,'editcategory'])->name('editcategory');

Route::post('/editcategory2',[CategoryController::class,'editCategory'])->name('editcategory2');

Route::post('/editbrand',[BrandController::class,'editBrand'])->name('editbrand');

Route::get('/get-product/{id}',[HomeController::class,'getProduct'])->name('get-product');

Route::post('/editdeliverman',[DelivermanController::class,'editdeliverman'])->name('editdeliverman');

Route::post('/statuss',[DelivermanController::class,'statuss'])->name('statuss');

Route::post('/editprods',[ProductsController::class,'editprods'])->name('editprods');

Route::get('/categoryedit',[AdminController::class,'categoryedit'])->name('categoryedit');

Route::post('/categoryedit',[AdminController::class,'editingcategory'])->name('categoryedit');

Route::get('/bigposter',[BigposterController::class,'bigposter'])->name('bigposter');

Route::post('/bigposter',[BigposterController::class,'send'])->name('bigposter');

Route::get('/departments',[DepartmentController::class,'getDepartment'])->name('departments');

Route::post('/departments',[DepartmentController::class,'addDepartment'])->name('departments');

Route::post('/editdepartments',[DepartmentController::class,'editDepartment'])->name('editdepartment');

Route::post('/deletedepartment',[DepartmentController::class,'delDeparment'])->name('deldepartments');

Route::get('/departmentView/{id}',[DepartmentController::class,'getDepartmentView'])->name('departmentthis');

Route::post('/deals',[DealController::class,'addDeal'])->name('deals');

Route::post('/dealshow',[DealController::class,'dealShow'])->name('dealshow');

Route::get('/deals',[DealController::class,'getDeal'])->name('deals');

Route::get('/test',[TestController::class,'test'])->name('test');

Route::post('/test',[TestController::class,'test'])->name('test');

Route::post('/clear',[TestController::class,'clear'])->name('clearevery');

Route::get('/forgotit',[UserController::class,'forgot'])->name('forgot');

// Route::get('/forgotpsw',[UserController::class,'forget_password'])->name('forget_password');

Route::post('/forget_password_submit', [UserController::class, 'forget_password_submit'])->name('forget_password_submit');

Route::get('/reset-password/{token}/{email}', [UserController::class, 'password_reset'])->name('password_reset');

Route::post('/reset_password_submit', [UserController::class, 'reset_password_submit'])->name('reset_password_submit');

Route::get('/aboutUs',[HomeController::class,'about'])->name('aboutUs');

Route::post('/addimg',[UserController::class,'addImg'])->name('addimg');

Route::post('/sendship',[CartController::class,'datas'])->name('sendship');

Route::post('/postorder',[OrderController::class,'postOrder'])->name('postorder');

Route::get('/order',[OrderController::class,'orders'])->name('order');

Route::get('/sendorder',[OrderController::class,'giveproducts'])->name('sendorder');

Route::post('/order',[OrderController::class,'orders'])->name('order');

Route::get('/userinfo',[UserController::class,'userinfo'])->name('user-info');

Route::post('/changepass',[UserController::class,'changePass'])->name('changepass');

// Route::get('/lar',function(){
//     Mail::to('abitshrestha2079@gmail.com')
//     ->send(new Mail12());
// });

// Route::get('/lar', function () {
//     $token = csrf_token();
//     $url = "/lar/send?_token=$token";
//     return redirect($url);
// });

// Route::post('/token',[ResetController::class,'generateToken'])->name('token');

// Route::get('/token',[ResetController::class,'Token'])->name('token');
Route::get('/userpage',[HomeController::class,'aboutuser'])->name('aboutuser');


Route::post('/deliverman',[DelivermanController::class,'addDeliverman'])->name('deliver-man');

Route::get('/deliverman',[DelivermanController::class,'getDeliverman'])->name('deliver-man');

Route::get('/delivertrackings',[DelivertrackingController::class,'getDelivertrackings'])->name('deliver-trackings');

Route::post('/delivertrack',[DelivertrackingController::class,'tracking'])->name('deliver-track');

Route::get('gettrackproducts',[DelivertrackingController::class,'getTrackProducts'])->name('get-track-products');

Route::get('/gettrack',[DelivertrackingController::class,'track'])->name('track');

Route::post('/sendstatus',[DelivertrackingController::class,'sendstatus'])->name('sendstatus');

Route::get('/giveorderid',[DelivertrackingController::class,'getOrderID'])->name('giveorderid');

Route::get('/addingorder',[DelivertrackingController::class,'addingOrder'])->name('addingorder');

Route::get('/blog',[blogController::class,'blog'])->name('blog');

Route::post('/acceptreject',[DelivertrackingController::class,'acceptReject'])->name('acceptreject');

Route::get('/getsearch',[SearchController::class,'getSearch'])->name('getsearch');

Route::get('/searchresults',[SearchController::class,'searchResults'])->name('searchresults');

Route::get('/searchthis/deliverytracking',[SearchController::class,'deliverytrackingResults'])->name('deliverytracking');

Route::get('/searchthis/category',[SearchController::class,'searchThis'])->name('searchthis.category');

Route::get('/searchthis/deliverman',[SearchController::class,'searchDeliverman'])->name('searchthis.deliverman');

Route::get('/searchthis/products',[SearchController::class,'searchProducts'])->name('searchthis.products');

Route::get('/searchthis/departments',[SearchController::class,'searchDepartments'])->name('searchthis.departments');

Route::get('/searchthis/brands',[SearchController::class,'searchBrands'])->name('searchthis.brands');

Route::get('/searchthis/orderresults',[SearchController::class,'searchOrders'])->name('searchthis.orders');

Route::get('/mainview',[AdminController::class,'mainview'])->name('mainview');

Route::post('/makeone',[AdminController::class,'makeOne'])->name('makeone');

Route::post('/addsales',[SalesController::class,'addSales'])->name('addsales');

Route::post('/deldelivertrack',[DelivertrackingController::class,'deldelivertrack'])->name('deldelivertrack');

Route::post('/todo',[TodoController::class,'todo'])->name('todo');

Route::post('/deltodo',[TodoController::class,'deltodo'])->name('deltodo');


















