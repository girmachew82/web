<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PUnitController;
use App\Http\Controllers\PRSO1\Prso1Controller;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\InstituteController;
use App\Http\Controllers\Admin\AssignRoleController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\AcademicTitleController;
use App\Http\Controllers\Admin\EducationLevelController;
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
    return view('index');
});
Route::get('/user/home', function () {
    return view('user.home');
});

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store'])->name('register');
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/admin/pages/PUnit/index',[PUnitController::class,'index'])->name('admin.pages.PUnit.index')->middleware('admin');

Route::get('/prso1dash', [Prso1Controller::class,'index'])->name('prso1dash')->middleware('prso1');
Route::middleware('admin')->group(function() {
        Route::get('/admindash', [AdminController::class,'index'])->name('admindash');
        //president unit
        Route::get('/admin/pages/PUnit/AddPUnit',function(){
            return view('/admin.pages.PUnit.AddPUnit');
        });
        Route::post('admin/PUnit/add',[PUnitController::class,'addPUnit'] )->name('addPUnit');
        Route::get('admin/pages/PUnit/EditPUnit/{id}',[PUnitController::class,'showPUnit']);
        Route::post('admin/PUnit/saveEdit',[PUnitController::class,'saveEditPUnit'] )->name('saveEditPUnit');
        Route::delete('admin/PUnit/delete/{id}',[PUnitController::class,'deletePUnit'] )->name('deletePUnit');
        Route::get('/admin/pages/PUnit/index',[PUnitController::class,'index'])->name('admin.pages.PUnit.index');
        Route::get('/admin/pages/PUnit/AddPUnit',function(){
            return view('/admin.pages.PUnit.AddPUnit');
        });
        //institute
        Route::get('/admin/pages/institute/index',[InstituteController::class,'index'])->name('admin.pages.institute.index');
        Route::get('/admin/pages/institute/AddInstitute',function(){
            return view('/admin.pages.institute.AddInstitute');
        });
        Route::post('addInstitute',[InstituteController::class,'addInstitute'] )->name('addInstitute');
        Route::get('admin/pages/institute/EditInstitute/{id}',[InstituteController::class,'showInstitute']);
        Route::post('saveEditInstitute',[InstituteController::class,'saveEditInstitute'] )->name('saveEditInstitute');
        Route::delete('deleteInstitute/{id}',[InstituteController::class,'deleteInstitute'] )->name('deleteInstitute');
        Route::get('/admin/pages/institute/index',[InstituteController::class,'index'])->name('admin.pages.institute.index');
        Route::get('/admin/pages/institute/AddInstitute',function(){
            return view('/admin.pages.institute.AddInstitute');
        });
        Route::get('admin/pages/institute/AddInstitute',[InstituteController::class,'pUnit']);
        Route::get('admin/pages/institute/EditInstitute/{id}/{punit_id}',[InstituteController::class,'pUnite']);
        //college/directorate
        Route::get('/admin/pages/college/index',[InstituteController::class,'index'])->name('admin.pages.college.index');
        Route::get('/admin/pages/college/AddCollege',function(){
            return view('/admin.pages.college.AddCollege');
        });
        Route::post('addCollege',[CollegeController::class,'addCollege'] )->name('addCollege');
        Route::get('admin/pages/college/EditCollege/{id}',[CollegeController::class,'showCollege']);
        Route::post('saveEditCollege',[CollegeController::class,'saveEditCollege'] )->name('saveEditCollege');
        Route::delete('deleteCollege/{id}',[CollegeController::class,'deleteCollege'] )->name('deleteCollege');
        Route::get('/admin/pages/college/index',[CollegeController::class,'index'])->name('admin.pages.college.index');
        Route::get('/admin/pages/college/AddCollege',function(){
            return view('/admin.pages.college.AddCollege');
        });
        Route::get('admin/pages/college/AddCollege',[CollegeController::class,'pUnit']);
        Route::get('admin/pages/college/EditCollege/{id}/{institute_id}/{punit_id}',[CollegeController::class,'pUnite']);
        //department/team leader
        Route::get('/admin/pages/department/index',[DepartmentController::class,'index'])->name('admin.pages.department.index');
        Route::get('/admin/pages/department/AddDepartment',function(){
            return view('/admin.pages.departemnt.AddDepartment');
        });
        Route::post('addDepartment',[DepartmentController::class,'addDepartment'] )->name('addDepartment');
        Route::get('admin/pages/department/EditDepartment/{id}',[DepartmentController::class,'showDepartment']);
        Route::post('saveEditDepartment',[DepartmentController::class,'saveEditDepartment'] )->name('saveEditDepartment');
        Route::delete('deleteDepartment/{id}',[DepartmentController::class,'deleteDepartment'] )->name('deleteDepartment');
        Route::get('/admin/pages/department/index',[DepartmentController::class,'index'])->name('admin.pages.department.index');
        Route::get('/admin/pages/department/AddDepartment',function(){
            return view('/admin.pages.department.AddDepartment');
        });
        Route::get('admin/pages/department/AddDepartment',[DepartmentController::class,'pUnit']);
        Route::post('admin/pages/department/fetchCollege',[DepartmentController::class,'fetchCollege']);
        Route::get('admin/pages/department/EditDepartment/{id}/{college_id}/{institute_id}/{punit_id}',[DepartmentController::class,'pUnite']);
        //Role
        Route::get('/admin/pages/role/index',[RoleController::class,'index'])->name('admin.pages.role.index');
        Route::get('/admin/pages/role/AddRole',function(){
            return view('/admin.pages.role.AddRole');
        });
        Route::post('addRole',[RoleController::class,'addRole'] )->name('addRole');
        Route::get('admin/pages/role/EditRole/{id}',[RoleController::class,'showRole']);
        Route::post('saveEditRole',[RoleController::class,'saveEditRole'] )->name('saveEditRole');
        Route::delete('deleteRole/{id}',[RoleController::class,'deleteRole'] )->name('deleteRole');
        Route::get('/admin/pages/role/index',[RoleController::class,'index'])->name('admin.pages.role.index');
        Route::get('/admin/pages/role/AddRole',function(){
            return view('/admin.pages.role.AddRole');
        });
        //Education level
        Route::get('/admin/pages/educationlevel/index',[EducationLevelController::class,'index'])->name('admin.pages.educationlevel.index');
        Route::get('/admin/pages/educationlevel/AddEducationLevel',function(){
            return view('/admin.pages.educationlevel.AddEducationLevel');
        });
        Route::post('addEducationLevel',[EducationLevelController::class,'addEducationLevel'] )->name('addEducationLevel');
        Route::get('admin/pages/educationlevel/EditEducationLevel/{id}',[EducationLevelController::class,'showEducationLevel']);
        Route::post('saveEditEducationLevel',[EducationLevelController::class,'saveEditEducationLevel'] )->name('saveEditEducationLevel');
        Route::delete('deleteEducationLevel/{id}',[EducationLevelController::class,'deleteEducationLevel'] )->name('deleteEducationLevel');
        Route::get('/admin/pages/educationlevel/index',[EducationLevelController::class,'index'])->name('admin.pages.educationlevel.index');
        Route::get('/admin/pages/educationlevel/AddEducationLevel',function(){
            return view('/admin.pages.educationlevel.AddEducationLevel');
        });
        //Academic title
        Route::get('/admin/pages/academictitle/index',[AcademicTitleController::class,'index'])->name('admin.pages.academictitle.index');
        Route::get('/admin/pages/academictitle/AddAdacemicTitle',function(){
            return view('/admin.pages.academictitle.AddAcademicTitle');
        });
        Route::post('addAcademicTitle',[AcademicTitleController::class,'addAcademicTitle'] )->name('addAcademicTitle');
        Route::get('admin/pages/academictitle/EditAcademicTitle/{id}',[AcademicTitleController::class,'showAcademicTitle']);
        Route::post('saveEditAcademicTitle',[AcademicTitleController::class,'saveEditAcademicTitle'] )->name('saveEditAcademicTitle');
        Route::delete('deleteAcademicTitle/{id}',[AcademicTitleController::class,'deleteAcademicTitle'] )->name('deleteAcademicTitle');
        Route::get('/admin/pages/academictitle/AddAcademicTitle',function(){
            return view('/admin.pages.academictitle.AddAcademicTitle');
        });
        //User
        Route::get('/admin/pages/user/index',[UserController::class,'index'])->name('admin.pages.user.index');
        Route::get('/admin/pages/user/AddUser',function(){
            return view('/admin.pages.user.AddUser');
        });
        Route::post('addUser',[UserController::class,'addUser'] )->name('addUser');
        Route::get('admin/pages/user/EditUser/{id}',[UserController::class,'showUser']);
        Route::post('saveUser',[UserController::class,'saveUser'] )->name('saveUser');
        Route::delete('deleteUser/{id}',[UserController::class,'deleteUser'] )->name('deleteUser');
        Route::get('/admin/pages/user/index',[UserController::class,'index'])->name('admin.pages.user.index');
        Route::get('/admin/pages/user/AddUser',function(){
            return view('/admin.pages.user.AddUser');
        });
        Route::get('admin/pages/user/AddUser',[UserController::class,'pUnit']);
        Route::post('admin/pages/user/fetchCollege',[UserController::class,'fetchCollege']);
        Route::post('admin/pages/user/fetchDepartment',[UserController::class,'fetchDepartment']);
        Route::get('admin/pages/user/EditUser/{id}/{educationlevel_id}/{academictitle_id}/{department_id}/{college_id}/{institute_id}/{punit_id}',[UserController::class,'pUnite']);
        //Assign role
        Route::get('/admin/pages/assignrole/index',[AssignRoleController::class,'index'])->name('admin.pages.assignrole.index');
        Route::get('/admin/pages/user/AddUser',function(){
            return view('/admin.pages.user.AddUser');
        });
        Route::post('addUser',[UserController::class,'addUser'] )->name('addUser');
        Route::get('admin/pages/user/EditUser/{id}',[UserController::class,'showUser']);
        Route::post('saveUser',[UserController::class,'saveUser'] )->name('saveUser');
        Route::delete('deleteUser/{id}',[UserController::class,'deleteUser'] )->name('deleteUser');
        Route::post('assignRole/{id}',[AssignRoleController::class,'assignRole'] )->name('assignRole');
        Route::get('/admin/pages/user/index',[UserController::class,'index'])->name('admin.pages.user.index');
        Route::get('/admin/pages/user/AddUser',function(){
            return view('/admin.pages.user.AddUser');
        });
        Route::get('admin/pages/user/AddUser',[UserController::class,'pUnit']);
        Route::post('admin/pages/user/fetchCollege',[UserController::class,'fetchCollege']);
        Route::post('admin/pages/user/fetchDepartment',[UserController::class,'fetchDepartment']);
        Route::get('admin/pages/user/EditUser/{id}/{educationlevel_id}/{academictitle_id}/{department_id}/{college_id}/{institute_id}/{punit_id}',[UserController::class,'pUnite']);
        // Route::get('/logout',function(){
        //     Session::forget('user');
        //     return redirect('/login');
        // });
});
