<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\DocumentController;
use App\Http\Controllers\User\DocumentTypeController;
use App\Http\Controllers\User\ProjectManagementController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\CMSController;
use App\Http\Controllers\User\EmailTypeController;
use App\Http\Controllers\User\EmailContentController;
use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\User\CompanyController;
use App\Http\Controllers\User\UserController;
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

Route::group(['prefix' => 'user'], function () {
    Route::middleware(['auth', 'user-access:user'])->group(function () {
        Route::get('/home', [HomeController::class, 'userHome'])->name('user.home');

        /* User management routes start*/
        Route::get('/userManagement', [UserController::class, 'userManagement']);
        Route::get('/delete_user/{id}', [UserController::class, 'delete']);
        Route::get('/edit_user/{id}', [UserController::class, 'edit']);
        Route::post('/update_user', [UserController::class, 'update']);

        Route::get('/adduser', [UserController::class, 'adduser']);
        Route::post('/register_user', [UserController::class, 'register']);
        Route::get('/UserChangeStatus/{id}/{status}', [UserController::class, 'UserChangeStatus']);
        Route::get('/checkUserEmail', [UserController::class, 'checkUserEmail'])->name('checkUserEmail');
        Route::get('/checkUserMobile', [UserController::class, 'checkUserMobile'])->name('checkUserMobile');
        /* User management routes end*/


        /* Category management routes start*/
        Route::get('/category', [CategoryController::class, 'categoryAdd']);
        Route::post('/add_category', [CategoryController::class, 'categoryAdd']);
        Route::get('/view_category', [CategoryController::class, 'categoryView']);
        Route::get('/delete_category/{id}', [CategoryController::class, 'categoryDelete']);
        Route::get('/update_category/{id}', [CategoryController::class, 'categoryUpdate']);
        Route::post('/edit_category', [CategoryController::class, 'categoryEdit']);
        Route::get('/categoryChangeStatus/{id}/{status}', [CategoryController::class, 'categoryChangeStatus']);
        Route::get('/checkName', [CategoryController::class, 'checkName'])->name('checkName');
        /* Category management routes end*/



        /* Document management routes start*/
        Route::get('/createdocument', [DocumentController::class, 'addDocument']);
        Route::post('/createdocument', [DocumentController::class, 'addDocument']);
        Route::get('/document', [DocumentController::class, 'documentView']);
        Route::get('/delete_document/{id}', [DocumentController::class, 'documentDelete']);
        Route::get('/edit_document/{id}', [DocumentController::class, 'documentEdit']);
        Route::post('/update_document/', [DocumentController::class, 'documentUpdate']);
        Route::get('/DocumentChangeStatus/{id}/{status}', [DocumentController::class, 'documentChangeStatus']);
        /* Document management routes end*/


    


       /* Project management routes start*/
        Route::get('/project',[ProjectManagementController::class,'addProject']);
        Route::post('/add_project',[ProjectManagementController::class,'addProject']);
        Route::get('/view_project',[ProjectManagementController::class,'viewProject']);
        Route::get('/delete_project/{id}',[ProjectManagementController::class,'deleteProject']);
        Route::get('/update_project/{id}',[ProjectManagementController::class,'updateProject']);
        Route::post('/edit_project',[ProjectManagementController::class,'editProject']);
        Route::get('/checkProject', [ProjectManagementController::class, 'checkProject'])->name('checkProject');
        Route::get('/ProjectChangeStatus/{id}/{status}', [ProjectManagementController::class, 'ProjectChangeStatus']);
        /* Project management routes end*/


        /* Document type routes start   */
        Route::get('/documentType_view', [DocumentTypeController::class, 'documentTypeView']);
        Route::get('/documentType_delete/{id}', [DocumentTypeController::class, 'documentTypeDelete']);
        Route::get('/documentType_add', [DocumentTypeController::class, 'documentTypeAdd']);
        Route::post('/documentType_add', [DocumentTypeController::class, 'documentTypeAdd']);
        Route::get('/documentType_edit/{id}', [DocumentTypeController::class, 'documentTypeEdit']);
        Route::post('/documentType_update/', [DocumentTypeController::class, 'documentTypeUpdate']);
        Route::get('/checkDocumentType', [DocumentTypeController::class, 'checkDocumentType'])->name('checkDocumentType');
        Route::get('/DocumentTypeChangeStatus/{id}/{status}', [DocumentTypeController::class, 'DocumentTypeChangeStatus']);



        /* Side Setting routes start*/
        Route::get('/logos', [SettingController::class, 'setting']);
        Route::post('/update_logo', [SettingController::class, 'Updateimage']);
        /*  Side Setting routes end*/

        /* Notification type routes start   */
        Route::get('/notification', [NotificationController::class, 'addNotification'])->name('notification');
        Route::post('/add_notification', [NotificationController::class, 'addNotification']);
        Route::get('/show_notification', [NotificationController::class, 'showNotification']);
        Route::get('/delete_notification/{id}', [NotificationController::class, 'deleteNotification']);
        Route::get('/edit_notification/{id}', [NotificationController::class, 'editNotification']);
        Route::post('/update_notification', [NotificationController::class, 'updateNotification']);
        Route::get('/NotificationChangeStatus/{id}/{status}', [NotificationController::class, 'statusNotification']);
        /* Notification type routes end   */

        /* Content management system routes start*/
        Route::get('/addcontent', [CMSController::class, 'addCms']);
        Route::post('/add_cms', [CMSController::class, 'addCms']);
        Route::get('/view_content', [CMSController::class, 'viewContent']);
        Route::get('/delete_content/{id}', [CMSController::class, 'deleteContent']);
        Route::get('/update_content/{id}', [CMSController::class, 'updateContent']);
        Route::post('/edit_content', [CMSController::class, 'editContent']);
        Route::get('/CMSChangeStatus/{id}/{status}', [CMSController::class, 'CMSChangeStatus']);

        /* Content management system routes end*/

        //Email management routes start by Nidhi

        // email-type

        Route::get('/email', [EmailTypeController::class, 'emailTypeAdd']);
        Route::post('/add_email', [EmailTypeController::class, 'emailTypeAdd']);
        Route::get('/show_email', [EmailTypeController::class, 'emailTypeShow']);
        Route::get('/emaildelete/{id}', [EmailTypeController::class, 'emailTypeDelete']);

        Route::get('/edit_email/{id}', [EmailTypeController::class, 'emailTypeEdit']);
        Route::post('/emailupdate', [EmailTypeController::class, 'emailTypeUpdate']);
        Route::get('/EmailTypeChangeStatus/{id}/{status}', [EmailTypeController::class, 'EmailTypeChangeStatus']);


        //email-content



        Route::get('/content', [EmailContentController::class, 'emailContentAdd']);
        Route::post('/add_content', [EmailContentController::class, 'emailContentAdd']);
        Route::get('/show_content', [EmailContentController::class, 'emailContentShow']);
        Route::get('/delete/{id}', [EmailContentController::class, 'emailContentDelete']);

        Route::get('/edit_content/{id}', [EmailContentController::class, 'emailContentEdit']);
        Route::post('/update', [EmailContentController::class, 'emailContentUpdate']);
        Route::get('/EmailContentChangeStatus/{id}/{status}', [EmailContentController::class, 'EmailContentChangeStatus']);

        //Email management routes end

        /* Module Permission route start here*/
        Route::get('/module_permission', [PermissionController::class, 'module_permission']);
        Route::post('/module_permission', [PermissionController::class, 'permission']);
        /* Module Permission route end here*/

    });
});

