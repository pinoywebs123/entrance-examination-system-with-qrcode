<?php

use App\User;
Route::get('/', function(){
	return redirect()->route('login');
});


/*
==========================================
				Authenticaton
==========================================

*/

Route::group(['prefix'=> 'auth'], function(){
	Route::get('/login', [
		'as'=> 'login',
		'uses'=> 'AuthController@login'
	]);

	Route::post('/login', [
		'as'=> 'lock_check',
		'uses'=> 'AuthController@lock_check'
	]);

	Route::get('/qr-scanner', [
		'as'=> 'qr_scanner',
		'uses'=> 'AuthController@qr_scanner'
	]);

	Route::post('/qr-scanner', [
		'as'=> 'qr_scanner_check',
		'uses'=> 'AuthController@qr_scanner_check'
	]);

	Route::get('/student-result', [
		'as'=> 'student_result',
		'uses'=> 'AuthController@student_result'
	]);


});

/*
==========================================
				Admin
==========================================

*/

Route::group(['prefix'=> 'admin'], function(){

	Route::get('/main', [
		'as'=> 'admin_main',
		'uses'=> 'AdminController@admin_main'
	]);

	Route::get('/original', [
		'as'=> 'admin_original',
		'uses'=> 'AdminController@admin_original'
	]);

		Route::post('/original', [
			'as'=> 'admin_original_check',
			'uses'=> 'AdminController@admin_original_check'
		]);

	Route::get('/examination', [ 
		'as'=> 'admin_examination',
		'uses'=> 'AdminController@admin_examination'
	]);

		Route::get('/create-examination', [
			'as'=> 'admin_create_examination',
			'uses'=> 'AdminController@admin_create_examination'
		]);

		Route::post('/create-examinow-check', [
			'as'=> 'admin_create_examination_check',
			'uses'=> 'AdminController@admin_create_examination_check'
		]);

	Route::get('/student-list', [
		'as'=> 'admin_student_list',
		'uses'=> 'AdminController@admin_student_list'
	]);

	Route::get('/logout', [
		'as'=> 'admin_logout',
		'uses'=> 'AdminController@admin_logout'
	]);

	Route::get('/exam/edit/{id}', [
		'as' => 'admin_edit',
		'uses'=> 'AdminController@admin_edit'	
	]);
		Route::post('/exam/update/{id}', [
			'as'=> 'admin_exam_update',
			'uses'=> 'AdminController@admin_exam_update'
		]);

	Route::get('/student-answer/{id}', [
		'as'=> 'admin_student_answer',
		'uses'=> 'AdminController@admin_student_answer'
	]);	
});

/*
==========================================
				Students
==========================================

*/

Route::group(['prefix'=> 'student'], function(){

	Route::get('/main', [
		'as'=> 'student_main',
		'uses'=> 'StudentController@student_main'
	]);

	Route::post('/student-information', [
		'as'=> 'student_new_information',
		'uses'=> 'StudentController@student_new_information'
	]);

	Route::get('/exam/{id}', [
		'as'=> 'student_exam',
		'uses'=> 'StudentController@student_exam'
	]);

	Route::post('/exam/{id}', [
		'as'=> 'student_exam_starting',
		'uses'=> 'StudentController@student_exam_starting'
	]);

	Route::post('/exam/finsh/{id}', [
		'as'=> 'student_exam_finish',
		'uses'=> 'StudentController@student_exam_finish'
	]);

	Route::post('/finish-to-rating', [
		'as'=> 'student_to_rating',
		'uses'=> 'StudentController@student_to_rating'
	]);

	Route::post('/finish-student-rate', [
		'as'=> 'student_qrcode',
		'uses'=> 'StudentController@student_qrcode'
	]);

	Route::get('/timer/{id}', [
		'as'=> 'student_timer',
		'uses'=> 'StudentController@student_timer'
	]);

	Route::get('/timeout/{id}/{answer}', [
		'as'=> 'student_timeout',
		'uses'=> 'StudentController@student_timeout'
	]);
});


// Route::get('/addUSer', function(){

// 	$user = new User;
// 	$user->original = 'admin123';
// 	$user->role_id = 1;
// 	$user->password = bcrypt('login');
// 	$user->save();

// });


