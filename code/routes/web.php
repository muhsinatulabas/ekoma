<?php
Route::get('storage/{folder}/{filename}', function ($folder,$filename){
  $path = storage_path('app/' . $folder . '/' . $filename);
  if (!File::exists($path)) {
      abort(404);
  }
  $file = File::get($path);
  $type = File::mimeType($path);
  $response = Response::make($file, 200);
  $response->header("Content-Type", $type);
  return $response;
});

//-------------------------------------------------------------------------------//
//-------------------------------WEBSITE-PAGE------------------------------------//
//-------------------------------------------------------------------------------//
// Route::get('/', function () {
//   return view('website.dashboard');
// });
Route::get('/','DashboardController@index');

Route::get('about/{submenu}/{id?}','AboutController@index');
Route::get('post/{modul}/list/{kategori?}/{pc_lpnu?}/{search?}/{page?}','PostController@index');
Route::get('post-detil/{modul}/{id?}','PostController@detil');

Route::get('pc-lpnu','PCLPNUController@index');
Route::get('pc-lpnu/{id}/{tab?}/{kategori?}/{search?}/{page?}','PCLPNUController@detil');

Route::get('pengusaha/list/{pc_lpnu?}/{level?}/{search?}/{page?}','PengusahaController@index');
Route::get('pengusaha/detil/{id}','PengusahaController@detilWebsite');

//-------------------------------------------------------------------------------//
//---------------------------------ADMIN-PAGE------------------------------------//
//-------------------------------------------------------------------------------//

Route::get('admin/login','AuthController@index');
Route::post('admin/login/proses','AuthController@login');

Route::group(['middleware' => ['ceklogin']],function(){
  Route::get('admin/logout','AuthController@logout');
  Route::get('admin','MasterController@dashboard');

  Route::post('admin/master/user/search','MasterController@searchUser');
  Route::post('admin/master/user/proses/{action?}','MasterController@prosesUser');
  Route::get('admin/master/user/{search?}/{page?}','MasterController@user');

  Route::post('admin/pc-lpnu/search','PCLPNUController@search');
  Route::post('admin/pc-lpnu/proses/{action}/{id}','PCLPNUController@proses');
  Route::get('admin/pc-lpnu/list/{search?}/{page?}','PCLPNUController@admin');
  Route::get('admin/pc-lpnu/form/{action?}/{id?}','PCLPNUController@form');

  Route::get('admin/master/modul','MasterController@modul');
  Route::post('admin/master/modul/proses/{action?}','MasterController@prosesModul');

  Route::get('admin/post/{modul}/list/{kategori?}/{pc_lpnu?}/{search?}/{page?}','PostController@admin');
  Route::get('admin/post/{modul}/form/{parameter?}','PostController@form');
  Route::post('admin/post/{modul}/proses/{parameter}','PostController@proses');
  Route::post('admin/post/{modul}/search','PostController@search');
  Route::post('admin/post/{modul}/filter','PostController@filter');

  Route::get('admin/about/{modul}/{id?}/{search?}/{page?}','AboutController@admin');
  Route::post('admin/about/proses/{modul}/{parameter}','AboutController@proses');
  Route::post('admin/pengurus/proses/{action?}','AboutController@prosesPengurus');
  Route::post('admin/gallery/{id}/proses/{action?}','AboutController@prosesGallery');

  Route::get('admin/kontak','KontakController@admin');
  Route::post('admin/kontak/proses','KontakController@proses');

  Route::post('admin/pengusaha/search','PengusahaController@searchPengusaha');
  Route::post('admin/pengusaha/proses/{action?}/{id?}','PengusahaController@prosesPengusaha');
  Route::post('admin/pengusaha/detil/{id}/proses/{action?}','PengusahaController@prosesUnitUsaha');
  Route::get('admin/pengusaha/list/{pc_lpnu?}/{level?}/{search?}/{page?}','PengusahaController@admin');
  Route::get('admin/pengusaha/form/{action?}/{id?}','PengusahaController@form');
  Route::get('admin/pengusaha/detil/{id}','PengusahaController@detilAdmin');

  Route::post('admin/quote/search','AboutController@searchQuote');
  Route::post('admin/quote/proses/{action?}','AboutController@prosesQuote');
  Route::get('admin/quote/{search?}/{page?}','AboutController@quote');

});
