<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\PUnit;
use Illuminate\Http\Request;
use App\Models\Admin\College;
use App\Models\Admin\Institute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Department;

class DepartmentController extends Controller
{
    public function pUnit()
    {
       $punits = PUnit::all();
       $institutes = Institute::all();
       $colleges = College::all();

       return view('admin.pages.department.AddDepartment',['punits'=>$punits,'institutes'=>$institutes,'colleges'=>$colleges]);
    }
    public function fetchCollege(Request $request)
    {
        $data['colleges'] = College::where("punit_id",$request->punit_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function pUnite($id,$college_id,$institute_id,$punit_id)
    {
       $punits = PUnit::all();
       $institutes = Institute::all();
       $colleges  = College::all();
       $currinstitute = Institute::find($institute_id);
       $currcollege = College::find($college_id);
       $currPUnit = PUnit::find($punit_id);
       $department = Department::find($id);
       return view('admin.pages.department.EditDepartment',['punits'=>$punits,'currpunit'=>$currPUnit,'institutes'=>$institutes,'currinstitute'=>$currinstitute,'colleges'=>$colleges,'currcollege'=>$currcollege,'department'=>$department]);
    }

    public function index()
    {
        //$Institutes = Institute::all();
       // $institutes = Institute::all();
       $departments = DB::table('departments')
            ->join('punits', 'punits.id', '=', 'departments.punit_id')
            ->join('institutes', 'institutes.id', '=', 'departments.institute_id')
            ->join('colleges', 'colleges.id', '=', 'departments.college_id')
            ->select('punits.name As punit_name', 'institutes.name As institute_name','colleges.name As college_name','departments.*')
            ->get();
        $no =1;
        return view('admin.pages.department.index',['departments'=>$departments,'no'=>$no]);
    }

    public function addDepartment(Request $request)
    {
        $department = new Department();
        $department->punit_id = $request->punit_id;
        $department->institute_id =      $request->institute_id;
        $department->college_id =      $request->college_id;
        $department->name = $request->name;
        $department->save();
        //return redirect()->route('addInstitute')->with('message', 'Department has beensuccessfully added');

        return redirect('/admin/pages/department/index')->with('message', 'Department has beensuccessfully added');
    }
    public function showDepartment($id)
    {
        $department = Department::find($id);
        return view('admin.pages.department.EditDepartment',['department'=>$department]);
    }
    public function editDepartment(Request $request, $id)
    {
        $department = Department::find($id);
        return view('admin.pages.department.EditDepartment',['department'=>$department]);
    }
    public function saveEditDepartment(Request $request)
    {

        //Institute::whereId($request->id)->update($request->all());
       // Institute::find($request->id)->update($request);
        //Institute::whereId($request->id)->update([$request->name,$request->id]);
        Department::where('id', $request->id)
        ->update([
            'punit_id'=>$request->punit_id,
            'institute_id'=>$request->institute_id,
            'college_id'=>$request->college_id,
            'name' => $request->name
         ]);
        return redirect('/admin/pages/department/index')->with('message', 'Department has beensuccessfully updated');
    }
    public function deleteDepartment($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('admin.pages.department.index')->with('message', 'Department has beensuccessfully deleted');
    }
}
