<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\PUnit;
use Illuminate\Http\Request;
use App\Models\Admin\Institute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\College;

class CollegeController extends Controller
{
    public function pUnit()
    {
       $punits = PUnit::all();
       $institutes = Institute::all();
       return view('admin.pages.college.AddCollege',['punits'=>$punits,'institutes'=>$institutes]);
    }
    public function pUnite($id,$institute_id,$punit_id)
    {
       $punits = PUnit::all();
       $institutes = Institute::all();
       $currinstitute = Institute::find($institute_id);
       $currPUnit = PUnit::find($punit_id);
       $college = College::find($id);
       return view('admin.pages.college.EditCollege',['punits'=>$punits,'currpunit'=>$currPUnit,'institutes'=>$institutes,'currinstitute'=>$currinstitute,'college'=>$college]);
    }

    public function index()
    {
        //$Institutes = Institute::all();
       // $institutes = Institute::all();
       $colleges = DB::table('colleges')
            ->join('punits', 'punits.id', '=', 'colleges.punit_id')
            ->join('institutes', 'institutes.id', '=', 'colleges.institute_id')
            ->select('punits.name As punit_name', 'institutes.name As institute_name','colleges.*')
            ->get();
        $no =1;
        return view('admin.pages.college.index',['colleges'=>$colleges,'no'=>$no]);
    }

    public function addCollege(Request $request)
    {
        $College = new College();
        $College->punit_id = $request->punit_id;
        $College->institute_id =      $request->institute_id;
        $College->name = $request->name;
        $College->save();
        //return redirect()->route('addInstitute')->with('message', 'College has been successfully added');

        return redirect('/admin/pages/college/index')->with('message', 'College has been successfully added');
    }
    public function showCollege($id)
    {
        $college = College::find($id);
        return view('admin.pages.college.EditCollege',['college'=>$college]);
    }
    public function editCollege(Request $request, $id)
    {
        $college = College::find($id);
        return view('admin.pages.college.EditCollege',['college'=>$college]);
    }
    public function saveEditCollege(Request $request)
    {

        //Institute::whereId($request->id)->update($request->all());
       // Institute::find($request->id)->update($request);
        //Institute::whereId($request->id)->update([$request->name,$request->id]);
        College::where('id', $request->id)
        ->update([
            'punit_id'=>$request->punit_id,
            'institute_id'=>$request->institute_id,
            'name' => $request->name
         ]);
        return redirect('/admin/pages/college/index')->with('message', 'College has been successfully updated');
    }
    public function deleteCollege($id)
    {
        $College = College::find($id);
        $College->delete();
        return redirect()->route('admin.pages.college.index')->with('message', 'College has been successfully deleted');
    }
}
