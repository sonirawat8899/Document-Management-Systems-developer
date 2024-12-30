<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DocumentController;



use App\Http\Controllers\Admin\EmailTypeController;
use App\Http\Controllers\Admin\EmailContentController;
use App\Http\Controllers\Admin\ProjectManagementController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\CMSController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DocumentTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    /* User management routes start*/
    Route::get('/admin/userManagement',[UserController::class,'userManagement']);
    Route::get('/admin/delete_user/{id}', [UserController::class,'delete']);
    Route::get('/admin/edit_user/{id}', [UserController::class,'edit']);
    Route::post('/admin/update_user', [UserController::class,'update']);

    Route::get('/admin/adduser',[UserController::class,'adduser']);
    Route::post('/admin/register_user',[UserController::class,'register']);
    Route::get('/UserChangeStatus/{id}/{status}',[UserController::class,'UserChangeStatus']);
    Route::get('/admin/checkUserEmail', [UserController::class, 'checkUserEmail'])->name('checkUserEmail');
    Route::get('/admin/checkUserMobile', [UserController::class, 'checkUserMobile'])->name('checkUserMobile');
    /* User management routes end*/


    /* Category management routes start*/
    Route::get('/admin/category',[CategoryController::class,'categoryAdd']);
    Route::post('/admin/add_category',[CategoryController::class,'categoryAdd']);
    Route::get('/admin/view_category',[CategoryController::class,'categoryView']);
    Route::get('/admin/delete_category/{id}',[CategoryController::class,'categoryDelete']);
    Route::get('/admin/update_category/{id}',[CategoryController::class,'categoryUpdate']);
    Route::post('/admin/edit_category',[CategoryController::class,'categoryEdit']);
    Route::get('/categoryChangeStatus/{id}/{status}',[CategoryController::class,'categoryChangeStatus']);
    Route::get('/admin/checkName', [CategoryController::class, 'checkName'])->name('checkName');
    /* Category management routes end*/

    /* Document management routes start*/
    Route::get('/admin/createdocument',[DocumentController::class,'addDocument']);
    Route::post('/admin/createdocument',[DocumentController::class,'addDocument']);
    Route::get('/admin/document',[DocumentController::class,'documentView']);
    Route::get('/admin/delete_document/{id}', [DocumentController::class,'documentDelete']);
    Route::get('/admin/edit_document/{id}', [DocumentController::class,'documentEdit']);
    Route::post('/admin/update_document/', [DocumentController::class,'documentUpdate']);
    Route::get('/DocumentChangeStatus/{id}/{status}',[DocumentController::class,'documentChangeStatus']);
    /* Document management routes end*/


     /* Project management routes start*/
     Route::get('/admin/project',[ProjectManagementController::class,'addProject']);
     Route::post('/admin/add_project',[ProjectManagementController::class,'addProject']);
     Route::get('/admin/view_project',[ProjectManagementController::class,'viewProject']);
     Route::get('/admin/delete_project/{id}',[ProjectManagementController::class,'deleteProject']);
     Route::get('/admin/update_project/{id}',[ProjectManagementController::class,'updateProject']);
     Route::post('/admin/edit_project',[ProjectManagementController::class,'editProject']);
     Route::get('/admin/checkProject', [ProjectManagementController::class, 'checkProject'])->name('checkProject');
     Route::get('/ProjectChangeStatus/{id}/{status}',[ProjectManagementController::class,'ProjectChangeStatus']);
     /* Project management routes end*/

    /* Document type routes start   */

    Route::get('/admin/documentType_view',[DocumentTypeController::class,'documentTypeView']);
    Route::get('/admin/documentType_delete/{id}', [DocumentTypeController::class,'documentTypeDelete']);
    Route::get('/admin/documentType_add', [DocumentTypeController::class,'documentTypeAdd']);
    Route::post('/admin/documentType_add', [DocumentTypeController::class,'documentTypeAdd']);
    Route::get('/admin/documentType_edit/{id}', [DocumentTypeController::class,'documentTypeEdit']);
    Route::post('/admin/documentType_update/', [DocumentTypeController::class,'documentTypeUpdate']);
    Route::get('/admin/checkDocumentType', [DocumentTypeController::class, 'checkDocumentType'])->name('checkDocumentType');
    Route::get('/DocumentTypeChangeStatus/{id}/{status}',[DocumentTypeController::class,'DocumentTypeChangeStatus']);


    // Route::get('/ProjectChangeStatus/{id}/{status}',[DocumentTypeController::class,'DocumentTypeChangeStatus']);

    /* Side Setting routes start*/
    Route::get('/admin/logos',[SettingController::class,'setting']);
    Route::post('/admin/update_logo',[SettingController::class,'Updateimage']);
/*  Side Setting routes end*/

/* Notification type routes start   */
Route::get('/admin/notification',[NotificationController::class, 'addNotification'])->name('notification');
Route::post('/admin/add_notification',[NotificationController::class, 'addNotification']);
Route::get('/admin/show_notification',[NotificationController::class, 'showNotification']);
Route::get('/admin/delete_notification/{id}', [NotificationController::class,'deleteNotification']);
Route::get('/admin/edit_notification/{id}', [NotificationController::class,'editNotification']);
Route::post('/admin/update_notification', [NotificationController::class,'updateNotification']);
Route::get('/NotificationChangeStatus/{id}/{status}',[NotificationController::class,'statusNotification']);
 /* Notification type routes end   */

/* Content management system routes start*/
Route::get('/admin/addcontent',[CMSController::class,'addCms']);
Route::post('/admin/add_cms',[CMSController::class,'addCms']);
Route::get('/admin/view_content',[CMSController::class,'viewContent']);
Route::get('/admin/delete_content/{id}',[CMSController::class,'deleteContent']);
Route::get('/admin/update_content/{id}',[CMSController::class,'updateContent']);
Route::post('/admin/edit_content',[CMSController::class,'editContent']);
Route::get('/CMSChangeStatus/{id}/{status}',[CMSController::class,'CMSChangeStatus']);

/* Content management system routes end*/

    //Email management routes start by Nidhi

    // email-type
	Route::get('/admin/email',[EmailTypeController::class, 'emailTypeAdd']);
	Route::post('/admin/add_email',[EmailTypeController::class, 'emailTypeAdd']);
	Route::get('/admin/show_email',[EmailTypeController::class, 'emailTypeShow']);
	Route::get('/admin/emaildelete/{id}', [EmailTypeController::class,'emailTypeDelete']);

	Route::get('/admin/edit_email/{id}', [EmailTypeController::class,'emailTypeEdit']);
	Route::post('/admin/emailupdate', [EmailTypeController::class,'emailTypeUpdate']);
    Route::get('/EmailTypeChangeStatus/{id}/{status}',[EmailTypeController::class,'EmailTypeChangeStatus']);


    //email-content

	Route::get('/admin/content',[EmailContentController::class, 'emailContentAdd']);
	Route::post('/admin/add_content',[EmailContentController::class, 'emailContentAdd']);
	Route::get('/admin/show_content',[EmailContentController::class, 'emailContentShow']);
	Route::get('/admin/delete/{id}', [EmailContentController::class,'emailContentDelete']);

	Route::get('/admin/edit_content/{id}', [EmailContentController::class,'emailContentEdit']);
	Route::post('/admin/update', [EmailContentController::class,'emailContentUpdate']);
    Route::get('/EmailContentChangeStatus/{id}/{status}',[EmailContentController::class,'EmailContentChangeStatus']);

    /* Module Permission route start here*/
    Route::get('/admin/module_permission',[PermissionController::class,'module_permission']);
    Route::post('/admin/module_permission',[PermissionController::class,'permission']);
    /* Module Permission route end here*/


     /* Module Commpany route start here*/
    Route::get('/admin/add_company',[CompanyController::class,'addCompany']);
    Route::post('/admin/add_company',[CompanyController::class,'addCompany']);
    Route::get('/admin/view_company',[CompanyController::class,'index']);
    Route::get('/admin/delete_company/{id}',[CompanyController::class,'delete_company']);
    Route::get('/admin/update_company/{id}',[CompanyController::class,'updateCompany']);
    Route::post('/admin/edit_company',[CompanyController::class,'editCompany']);
    Route::get('/admin/checkCompany', [CompanyController::class, 'checkCompany'])->name('checkCompany');
    Route::get('/admin/checkMobile', [CompanyController::class, 'checkMobile'])->name('checkMobile');
    Route::get('/admin/checkEmail', [CompanyController::class, 'checkEmail'])->name('checkEmail');
    Route::get('/companyChangeStatus/{id}/{status}',[CompanyController::class,'companyChangeStatus']);
    /* Module Commpany route end here*/

});
