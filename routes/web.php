<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home.landingpage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// EMAIL
Route::post('/send-email', [MailController::class, 'sendEmail'])->name('sendEmail');


// AUTH
Route::get('/registration',[DashboardController::class,'getRegisterPage'])->name('getRegisterPage');
Route::get('/sign-in',[DashboardController::class,'getLoginPage'])->name('getLoginPage');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// LANDING PAGE (HOME)
Route::get('/landingpage', [DashboardController::class, 'getLandingPage'])->name('landingPage');
Route::get('/landingpage/about-us', [DashboardController::class, 'getContactPage'])->name('contactPage');
Route::get('/landingpage/explore', [DashboardController::class, 'getExplorePage'])->name('explorePage');


// MEMBER
Route::group(['middleware'=> 'RoleMember'], function(){

    // GET MANAGE PAGE (READ)
    Route::get('/member/manage', [MemberController::class, 'memberManagePicture'])->name('memberManage');

    // CREATE
    Route::get('/member/manage/add', [MemberController::class, 'getCreatePage'])->name('addPicture');
    Route::post('/member/manage/add', [PictureController::class, 'createPicture'])->name('storePicture');

    // UPDATE
    Route::get('/member/manage/edit/{id}', [PictureController::class, 'getUpdatePage'])->name('getUpdate');
    Route::patch('/member/manage/edit/{id}',[PictureController::class, 'updatePicture'])->name('editPicture');

    // DELETE
    Route::delete('/member/manage/delete/{id}', [PictureController::class, 'deletePicture'])->name('deletePicture');
});


// ADMIN
Route::group(['middleware'=>'RoleAdmin'], function(){

    // MANAGE USERS
    Route::get('/admin/manage/users', [AdminController::class, 'manageUserPage'])->name('getUserPage');
    Route::delete('/admin/manage/users/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');

    // MANAGE TAGS
    Route::get('/admin/manage/tags', [AdminController::class, 'getManageTag'])->name('getManageTag');

    Route::get('/admin/manage/tags/create', [AdminController::class, 'getCreateTag'])->name('getCreateTag');
    Route::post('/admin/manage/tags/create', [TagController::class, 'addTag'])->name('createTag');

    Route::get('/admin/manage/tags/edit/{id}', [TagController::class, 'editTag'])->name('editTag');
    Route::patch('/admin/manage/tags/edit/{id}', [TagController::class, 'updateTag'])->name('updateTag');

    Route::delete('/admin/manage/tags/delete/{id}', [TagController::class, 'deleteTag'])->name('deleteTag');

    // MANAGE PICTURES
    Route::get('/admin/manage/pictures', [AdminController::class, 'getManagePicture'])->name('adminPicture');
    Route::delete('/admin/manage/delete/{id}', [PictureController::class, 'deletePictureAdmin'])->name('deletePictureAdmin');
});
