<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    public function index()
    {
        //$punits = PUnit::all();
        $edulevels = EducationLevel::orderBy('name', 'ASC')->get();
        $no =1;
        return view('admin.pages.educationlevel.index',['edulevels'=>$edulevels,'no'=>$no]);
    }

    public function addEducationLevel(Request $request)
    {
        $educationlevel = new EducationLevel();
        $educationlevel->name = $request->name;
        $educationlevel->save();
        //return redirect()->route('addPUnit')->with('message', 'Education level has been successfully added');

        return redirect('/admin/pages/educationlevel/index')->with('message', 'Education level has been successfully added');
    }
    public function showEducationLevel($id)
    {
        $educationlevel = EducationLevel::find($id);
        return view('admin.pages.educationlevel.EditEducationLevel',['educationlevel'=>$educationlevel]);
    }
    public function editEducationLevel(Request $request, $id)
    {
        $educationlevel = EducationLevel::find($id);
        return view('admin.pages.EducationLevel.EditEducationLevel',['educationlevel'=>$educationlevel]);
    }
    public function saveEditEducationLevel(Request $request)
    {

        //PUnit::whereId($request->id)->update($request->all());
       // PUnit::find($request->id)->update($request);
        //PUnit::whereId($request->id)->update([$request->name,$request->id]);
        EducationLevel::where('id', $request->id)
        ->update([
            'name' => $request->name
         ]);
        return redirect('/admin/pages/educationlevel/index')->with('message', 'Education level has been successfully updated');
    }
    public function deleteEducationLevel($id)
    {
        $educationlevel = EducationLevel::find($id);
        $educationlevel->delete();
        return redirect()->route('admin.pages.educationlevel.index')->with('message', 'Education level has been successfully deleted');
    }
}
