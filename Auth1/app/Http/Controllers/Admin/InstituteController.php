<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\PUnit;
use Illuminate\Http\Request;
use App\Models\Admin\Institute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InstituteController extends Controller
{
    public function pUnit()
    {
       $punits = PUnit::all();
       return view('admin.pages.institute.AddInstitute',['punits'=>$punits]);
    }
    public function pUnite($id,$punit_id)
    {
       $punits = PUnit::all();
       $institute = Institute::find($id);
       $currPUnit = PUnit::find($punit_id);
       return view('admin.pages.institute.EditInstitute',['punits'=>$punits,'currpunit'=>$currPUnit,'institute'=>$institute]);
    }
    public function index()
    {
        //$Institutes = Institute::all();
       // $institutes = Institute::all();
       $institutes = DB::table('institutes')
            ->join('punits', 'punits.id', '=', 'institutes.punit_id')
            ->select('punits.name As punit_name', 'institutes.*')
            ->get();
        $no =1;
        return view('admin.pages.institute.index',['institutes'=>$institutes,'no'=>$no]);
    }

    public function addInstitute(Request $request)
    {
        $Institute = new Institute();
        $Institute->punit_id = $request->punit_id;
        $Institute->name =      $request->institute;
        $Institute->save();
        //return redirect()->route('addInstitute')->with('message', 'Institute has been successfully added');

        return redirect('/admin/pages/institute/index')->with('message', 'Institute has been successfully added');
    }
    public function showInstitute($id)
    {
        $institute = Institute::find($id);
        return view('admin.pages.institute.EditInstitute',['institute'=>$institute]);
    }
    public function editInstitute(Request $request, $id)
    {
        $institute = Institute::find($id);
        return view('admin.pages.institute.EditInstitute',['institute'=>$institute]);
    }
    public function saveEditInstitute(Request $request)
    {

        //Institute::whereId($request->id)->update($request->all());
       // Institute::find($request->id)->update($request);
        //Institute::whereId($request->id)->update([$request->name,$request->id]);
        Institute::where('id', $request->id)
        ->update([
            'punit_id'=>$request->punit_id,
            'name' => $request->institute
         ]);
        return redirect('/admin/pages/institute/index')->with('message', 'Institute has been successfully updated');
    }
    public function deleteInstitute($id)
    {
        $Institute = Institute::find($id);
        $Institute->delete();
        return redirect()->route('admin.pages.institute.index')->with('message', 'Institute has been successfully deleted');
    }
}
