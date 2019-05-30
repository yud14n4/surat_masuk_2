<?php

//Route Master Customer
Route::get('/Master-Customer', 'MasterCustomerController@index')->name('mCustomer');
Route::post('/Master-Customer-Pangkat', 'MasterCustomerController@GetPangkat')->name('GetPangkat');
Route::post('/Insert-Master-Customer', 'MasterCustomerController@PostCustomer')->name('postCustomer');
Route::get('/Edit-Master-Customer/{idCust}', 'MasterCustomerController@GetIdCustomer')->name('GetIdCustomer');
Route::post('/Update-Master-Customer', 'MasterCustomerController@PostUpdateCustomer')->name('postUpdateCustomer');
Route::post('/Delete-Master-Customer', 'MasterCustomerController@PostDeleteCustomer')->name('PostCustomerDelete');

//Route Master Golongan
Route::get('/Master-Golongan', 'MasterGolonganController@index')->name('mGolongan');
Route::post('/Insert-Master-Golongan', 'MasterGolonganController@PostGolongan')->name('postGolongan');
Route::post('/Edit-Master-Golongan', 'MasterGolonganController@EditGolongan')->name('GetIdGolonganEdit');
Route::post('/Update-Master-Golongan', 'MasterGolonganController@PostEditGolongan')->name('PostGolonganEdit');
Route::post('/Delete-Master-Golongan', 'MasterGolonganController@PostDeleteGolongan')->name('PostGolonganDelete');

//Route Master Jenis Surat
Route::get('/Master-Jenis-Surat', 'MasterJenisSuratController@index')->name('mJenisSurat');
Route::post('/Insert-Jenis-Surat', 'MasterJenisSuratController@PostJenisSurat')->name('postJenisSurat');
Route::post('/Edit-Jenis-Surat', 'MasterJenisSuratController@EditJenisSurat')->name('GetIdJenisSuratEdit');
Route::post('/Update-Jenis-Surat', 'MasterJenisSuratController@PostEditJenisSurat')->name('PostJenisSuratEdit');
Route::post('/Delete-Jenis-Surat', 'MasterJenisSuratController@PostDeleteJenisSurat')->name('PostJenisSuratDelete');

//Route Master Index Surat
Route::get('/Master-Index-Surat', 'MasterIndexSuratController@index')->name('mIndexSurat');
Route::post('/Insert-Index-Surat', 'MasterIndexSuratController@PostIndexSurat')->name('postIndexSurat');
Route::post('/Edit-Index-Surat', 'MasterIndexSuratController@EditIndexSurat')->name('GetIdIndexSuratEdit');
Route::post('/Update-Index-Surat', 'MasterIndexSuratController@PostEditIndexSurat')->name('PostIndexSuratEdit');
Route::post('/Delete-Index-Surat', 'MasterIndexSuratController@PostDeleteIndexSurat')->name('PostIndexSuratDelete');

//Route Master Media Arsip
Route::get('/Master-Media-Arsip', 'MasterMediaArsipController@index')->name('mMediaArsip');
Route::post('/Insert-Media-Arsip', 'MasterMediaArsipController@PostMediaArsip')->name('postMediaArsip');
Route::post('/Edit-Media-Arsip', 'MasterMediaArsipController@EditMediaArsip')->name('GetIdMediaArsipEdit');
Route::post('/Update-Media-Arsip', 'MasterMediaArsipController@PostEditMediaArsip')->name('PostMediaArsipEdit');
Route::post('/Delete-Media-Arsip', 'MasterMediaArsipController@PostDeleteMediaArsip')->name('PostMediaArsipDelete');
