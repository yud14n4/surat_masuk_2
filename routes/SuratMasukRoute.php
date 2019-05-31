<?php

//Route Surat Masuk
Route::get('/surat-masuk', 'SuratMasukController@index')->name('SuratMasuk');
Route::get('/surat-masuk-add', 'SuratMasukController@indexAdd')->name('SuratMasukAdd');
// Route::post('/Master-Customer-Pangkat', 'MasterCustomerController@GetPangkat')->name('GetPangkat');
Route::post('/insert-surat-masuk', 'SuratMasukController@PostSuratMasuk')->name('postSuratMasuk');
Route::get('/edit-surat-masuk/{idSuratMasuk}', 'SuratMasukController@GetIdSuratMasuk')->name('GetIdSuratMasuk');
Route::post('/update-surat-masuk', 'SuratMasukController@PostUpdateSuratMasuk')->name('postUpdateSuratMasuk');
// Route::post('/Delete-Master-Customer', 'MasterCustomerController@PostDeleteCustomer')->name('PostCustomerDelete');
