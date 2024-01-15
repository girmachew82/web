<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Role;
use App\Models\Admin\User;
use App\Models\Admin\PUnit;
use Illuminate\Http\Request;
use App\Models\Admin\College;
use App\Models\Admin\Institute;
use App\Models\Admin\AssignRole;
use App\Models\Admin\Department;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\AcademicTitle;
use App\Http\Controllers\Controller;
use App\Models\Admin\EducationLevel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function login(Request $req)
    {

        //return $req->input();
        $user= User::where(['username'=>$req->username])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or password is incorrect"."pas "."username  ".$req->username;
        }
        else
        {
            $id = $user->id;
            $roles= AssignRole::where(['user_id'=>$id])->get();
            //$role_name = Role::where(['id'=>$roles->id]);
            $req->session()->put('user',$user);
            return  view('admin.pages.dashboard',['roles'=>$roles]);
        }
    }

    public function pUnit()
    {
       $punits = PUnit::all();
       $institutes = Institute::all();
       $colleges = College::all();
       $departments = Department::all();
       $educationleveles = EducationLevel::all();
       $academictitles = AcademicTitle::all();
       return view('admin.pages.user.AddUser',['punits'=>$punits,'institutes'=>$institutes,
       'colleges'=>$colleges,
       'departments'=>$departments,
       'educationleveles'=>$educationleveles,
       'academictitles'=>$academictitles

    ]);
    }
    public function fetchCollege(Request $request)
    {
        $data['colleges'] = College::where("punit_id",$request->punit_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchDepartment(Request $request)
    {
        $data['departments'] = Department::where("college_id",$request->college_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function pUnite($id,$educationlevel_id, $academictitle_id,$department_id,$college_id,$institute_id,$punit_id)
    {
       $punits = PUnit::all();
       $institutes = Institute::all();
       $colleges  = College::all();
       $currinstitute = Institute::find($institute_id);
       $currcollege = College::find($college_id);
       $currPUnit = PUnit::find($punit_id);
       $departments = Department::find($id);
       $currdepartment = Department::find($department_id);
       $educationleveles = EducationLevel::all();
       $curreducationlevel = EducationLevel::find($educationlevel_id);
       $academictitles = AcademicTitle::all();
       $curracademictitle = AcademicTitle::find($academictitle_id);
       $user = User::find($id);
       return view('admin.pages.user.EditUser',['punits'=>$punits,'currpunit'=>$currPUnit,
       'institutes'=>$institutes,'currinstitute'=>$currinstitute,
       'colleges'=>$colleges,'currcollege'=>$currcollege,
       'departments'=>$departments,
       'currdepartment'=>$currdepartment,
       'educationleveles'=>$educationleveles,
       'academictitles'=>$academictitles,
       'curreducationlevel'=>$curreducationlevel,
       'curracademictitle'=>$curracademictitle,
       'user'=>$user]);
    }

    public function index()
    {
        //$Institutes = Institute::all();
       // $institutes = Institute::all();
       $users = DB::table('users')
            ->join('punits', 'punits.id', '=', 'users.punit_id')
            ->join('institutes', 'institutes.id', '=', 'users.institute_id')
            ->join('colleges', 'colleges.id', '=', 'users.college_id')
            ->join('departments', 'departments.id', '=', 'users.department_id')
            ->select('punits.name As punit_name', 'institutes.name As institute_name','colleges.name As college_name','departments.name As department_name','users.*')
            ->orderBy('users.givenname')
            ->get();
        $no =1;
        return view('admin.pages.user.index',['users'=>$users,'no'=>$no]);
    }

    public function addUser(Request $request)
    {
        $user = new User();
        $user->title = $request->title;
        $user->givenname = $request->givenname;
        $user->fathername = $request->fathername;
        $user->grandfather = $request->grandfather;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->educationlevel_id = $request->educationlevel_id;
        $user->academictitle_id = $request->academictitle_id;
        $user->punit_id =      $request->punit_id;
        $user->institute_id =      $request->institute_id;
        $user->college_id =      $request->college_id;
        $user->department_id =      $request->department_id;
        $user->email = $request->email;
        $user->username = "DBU0004";
        $user->password = Hash::make(123456);
        $user->status = 1;
        $user->save();
        //return redirect()->route('addInstitute')->with('message', 'User has been successfully added');

        return redirect('/admin/pages/user/index')->with('message', 'User has been successfully added');
    }
    public function showUser($id)
    {
        $user = User::find($id);
        return view('admin.pages.user.EditUser',['user'=>$user]);
    }
    public function editUser(Request $request, $id)
    {
        $user = User::find($id);
        return view('admin.pages.user.EditUser',['user'=>$user]);
    }
    public function saveUser(Request $request)
    {

        //Institute::whereId($request->id)->update($request->all());
       // Institute::find($request->id)->update($request);
        //Institute::whereId($request->id)->update([$request->name,$request->id]);
        User::where('id', $request->id)
        ->update([
            'title'=>$request->title,
            'givenname'=>$request->givenname,
            'fathername'=>$request->fathername,
            'grandfather'=>$request->grandfather,
            'gender'=>$request->gender,
            'phone'=>$request->phone,
            'punit_id'=>$request->punit_id,
            'institute_id'=>$request->institute_id,
            'college_id'=>$request->college_id,
            'department_id'=>$request->department_id,
            'educationlevel_id'=>$request->educationlevel_id,
            'academictitle_id'=>$request->academictitle_id,
            'email'=>$request->email,
         ]);
        return redirect('/admin/pages/user/index')->with('message', 'User has been successfully updated');
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.pages.user.index')->with('message', 'User has been successfully deleted');
    }
}
