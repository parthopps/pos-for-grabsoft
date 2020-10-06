<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Category routes
Route::get('/category', 'CategoryController@category');
Route::post('/category/insert', 'CategoryController@categoryInsert')->name('category.insert');
Route::get('/category/show', 'CategoryController@categoryShow')->name('category.show');
Route::get('/category/edit/{category_id}', 'CategoryController@CategoryEdit');
Route::post('category/edit/{id}', 'CategoryController@categoryUpdate');
Route::get('category/delete/{category_id}', 'CategoryController@categoryDelete');

//Supplier routes
Route::get('/supplier', 'SupplierController@supplier');
Route::post('/supplier/insert', 'SupplierController@supplyInsert')->name('supplier.insert');
Route::get('/supplier/show', 'SupplierController@supplierShow')->name('supplier.show');

//products route
Route::get('/product/{id}', 'ProductController@index');
Route::post('/product/insert', 'ProductController@productInsert')->name('product.insert');
Route::get('/products/shows', 'ProductController@productShow')->name('product.show.customer');

//payment route
Route::get('/payment/{id}', 'PaymentController@index');
Route::post('/payment/insert', 'PaymentController@paymentInsert')->name('payment.insert');
Route::get('/payments/show', 'PaymentController@paymentShow')->name('payments.show');

//pos route
Route::get('/pos', 'PosController@index')->name('pos.index');
Route::post('/pos/insert', 'PosController@posInsert')->name('pos.insert');
Route::get('pos/delete/{pos_id}', 'PosController@posDelete');
Route::post('pos/update/{id}', 'PosController@posUpdate');

//customer route
Route::get('/customer', 'CustomerController@customer');
Route::post('/customer/insert', 'CustomerController@customerInsert')->name('customer.insert');
Route::get('/customer/show', 'CustomerController@customerShow')->name('customer.show');

