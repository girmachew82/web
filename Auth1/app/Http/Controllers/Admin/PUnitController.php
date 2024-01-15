<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PUnit;
use Illuminate\Http\Request;

class PUnitController extends Controller
{
    public function index()
    {
        //$punits = PUnit::all();
        $punits = PUnit::orderBy('name', 'ASC')->get();
        $no =1;
        return view('admin.pages.PUnit.index',['punits'=>$punits,'no'=>$no]);
    }

    public function addPUnit(Request $request)
    {
        $punit = new PUnit();
        $punit->name = $request->punit;
        $punit->save();
        //return redirect()->route('addPUnit')->with('message', 'President unit has been successfully added');

        return redirect('/admin/pages/PUnit/index')->with('message', 'President unit has been successfully added');
    }
    public function showPUnit($id)
    {
        $punit = PUnit::find($id);
        return view('admin.pages.PUnit.EditPUnit',['punit'=>$punit]);
    }
    public function editPUnit(Request $request, $id)
    {
        $punit = PUnit::find($id);
        return view('admin.pages.PUnit.EditPUnit',['punit'=>$punit]);
    }
    public function saveEditPUnit(Request $request)
    {

        //PUnit::whereId($request->id)->update($request->all());
       // PUnit::find($request->id)->update($request);
        //PUnit::whereId($request->id)->update([$request->name,$request->id]);
        PUnit::where('id', $request->id)
        ->update([
            'name' => $request->punit
         ]);
        return redirect('/admin/pages/PUnit/index')->with('message', 'President unit has been successfully updated');
    }
    public function deletePUnit($id)
    {
        $punit = PUnit::find($id);
        $punit->delete();
        return redirect()->route('admin.pages.PUnit.index')->with('message', 'President unit has been successfully deleted');
    }
}
