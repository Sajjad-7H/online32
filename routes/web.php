<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\StripePaymentController;


route::get('/',[HomeController::class,'home']);


route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

route::get('/myorders',[HomeController::class,'myorders'])->middleware(['auth', 'verified']);




// Route::get('/', function () {
//     return view('home.index');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard',[HomeController::class,'index'])-> middleware(['auth','admin']);


route::get('view_category',[AdminController::class,'view_category'])-> middleware(['auth','admin']);

route::post('add_category',[AdminController::class,'add_category'])-> middleware(['auth','admin']);

route::get('delete_category/{id}',[AdminController::class,'delete_category'])-> middleware(['auth','admin']);

route::get('edit_category/{id}',[AdminController::class,'edit_category'])-> middleware(['auth','admin']);

route::post('update_category/{id}',[AdminController::class,'update_category'])-> middleware(['auth','admin']);

route::get('add_product',[AdminController::class,'add_product'])-> middleware(['auth','admin']);

route::post('upload_product',[AdminController::class,'upload_product'])-> middleware(['auth','admin']);

route::get('view_product',[AdminController::class,'view_product'])-> middleware(['auth','admin']);

route::get('delete_product/{id}',[AdminController::class,'delete_product'])-> middleware(['auth','admin']);

route::get('update_product/{id}',[AdminController::class,'update_product'])-> middleware(['auth','admin']);

route::post('edit_product/{id}',[AdminController::class,'edit_product'])-> middleware(['auth','admin']);

route::get('book_search',[AdminController::class,'book_search'])-> middleware(['auth','admin']);

route::get('product_details/{id}',[HomeController::class,'product_details']);

route::get('add_cart/{id}',[HomeController::class,'add_cart'])-> middleware(['auth','verified']);

route::get('mycart',[HomeController::class,'mycart'])-> middleware(['auth','verified']);

route::get('delete_cart/{id}',[HomeController::class,'delete_cart'])-> middleware(['auth','verified']);

route::post('comfirm_order',[HomeController::class,'comfirm_order'])-> middleware(['auth','verified']);

route::get('view_orders',[AdminController::class,'view_order'])-> middleware(['auth','admin']);

route::get('on_the_way/{id}',[AdminController::class,'on_the_way'])-> middleware(['auth','admin']);

route::get('delivered/{id}',[AdminController::class,'delivered'])-> middleware(['auth','admin']);

route::get('print_pdf/{id}',[AdminController::class,'print_pdf'])-> middleware(['auth','admin']);

route::get('shop',[HomeController::class,'shop']);

route::get('why',[HomeController::class,'why']);

route::get('contact',[HomeController::class,'contact']);
route::get('offers',[HomeController::class,'offers']);



route::controller(HomeController::class)->group(function(){

    route::get('stripe/{value}', 'stripe')->name('stripe');

    route::post('stripe/{value}', 'stripePost')->name('stripe.post');

});


Route::post('/admin/store-book', [AdminController::class, 'storeBook'])->name('store.book');
Route::get('/books', [HomeController::class, 'showBooks'])->name('books');

Route::post('/admin/store-audio', [AdminController::class, 'storeAudio'])->name('store.audio');
Route::get('/eaudio', [HomeController::class, 'showAudios'])->name('eaudio');


Route::post('/admin/store-notes', [AdminController::class, 'storeNotes'])->name('store.notes');
Route::get('/notes', [HomeController::class, 'showNotes'])->name('notes');

Route::post('/admin/store-bookmela', [AdminController::class, 'storeBoookMela'])->name('store.bookmela');
Route::get('/bookmela', [HomeController::class, 'showBookMela'])->name('bookmela');

Route::post('/admin/store-islamic', [AdminController::class, 'storeIslamic'])->name('store.islamic');
Route::get('/islamic', [HomeController::class, 'showIslamic'])->name('islamic');

Route::post('/admin/store-bengali', [AdminController::class, 'storeBengali'])->name('store.bengali');
Route::get('/bengali', [HomeController::class, 'showbengali'])->name('bengali');

Route::post('/admin/store-childrenbooks', [AdminController::class, 'storeChildrenBooks'])->name('store.childrenbooks');
Route::get('/childrenbooks', [HomeController::class, 'showChildrenBooks'])->name('childrenbooks');

Route::post('/admin/store-historical', [AdminController::class, 'storeHistorical'])->name('store.historical');
Route::get('/historical', [HomeController::class, 'showHistorical'])->name('historical');

Route::post('/admin/store-adventure', [AdminController::class, 'storeAdventure'])->name('store.adventure');
Route::get('/adventure', [HomeController::class, 'showAdventure'])->name('adventure');

Route::post('/admin/store-thriller', [AdminController::class, 'storeThriller'])->name('store.thriller');
Route::get('/thriller', [HomeController::class, 'showThriller'])->name('thriller');

Route::post('/admin/store-biography', [AdminController::class, 'storeBiography'])->name('store.biography');
Route::get('/biography', [HomeController::class, 'showBiography'])->name('biography');

Route::post('/admin/store-mystery', [AdminController::class, 'storeMystery'])->name('store.mystery');
Route::get('/mystery', [HomeController::class, 'showMystery'])->name('mystery');

Route::post('/admin/store-selfhelp', [AdminController::class, 'storeSelfhelp'])->name('store.selfhelp');
Route::get('/selfhelp', [HomeController::class, 'showSelfhelp'])->name('selfhelp');

Route::post('/admin/store-horror', [AdminController::class, 'storeHorror'])->name('store.horror');
Route::get('/horror', [HomeController::class, 'showHorror'])->name('horror');

Route::post('/admin/store-goosebumps', [AdminController::class, 'storeGoosebumps'])->name('store.goosebumps');
Route::get('/goosebumps', [HomeController::class, 'showGoosebumps'])->name('goosebumps');


Route::get('/admin/upload-book', [AdminController::class, 'showUploadForm'])->name('admin.upload.form');
Route::post('/admin/upload-book', [AdminController::class, 'uploadBook'])->name('admin.upload.book');


Route::get('/books', [HomeController::class, 'showBooks'])->name('user.books');



route::get('register1',[AdminController::class,'register1'])-> middleware(['auth','admin']);


route::get('delete_register/{id}',[AdminController::class,'delete_register'])-> middleware(['auth','admin']);




