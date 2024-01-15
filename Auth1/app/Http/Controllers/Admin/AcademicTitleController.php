<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AcademicTitle;
use Illuminate\Http\Request;

class AcademicTitleController extends Controller
{
    public function index()
    {
        //$punits = PUnit::all();
        $academictitles = AcademicTitle::orderBy('name', 'ASC')->get();
        $no =1;
        return view('admin.pages.academictitle.index',['academictitles'=>$academictitles,'no'=>$no]);
    }

    public function addAcademicTitle(Request $request)
    {
        $AcademicTitle = new AcademicTitle();
        $AcademicTitle->name = $request->name;
        $AcademicTitle->save();
        //return redirect()->route('addPUnit')->with('message', 'Academic Title has been successfully added');

        return redirect('/admin/pages/academictitle/index')->with('message', 'Academic Title has been successfully added');
    }
    public function showAcademicTitle($id)
    {
        $AcademicTitle = AcademicTitle::find($id);
        return view('admin.pages.academictitle.EditAcademicTitle',['AcademicTitle'=>$AcademicTitle]);
    }
    public function editAcademicTitle(Request $request, $id)
    {
        $AcademicTitle = AcademicTitle::find($id);
        return view('admin.pages.academictitle.EditAcademicTitle',['AcademicTitle'=>$AcademicTitle]);
    }
    public function saveEditAcademicTitle(Request $request)
    {

        //PUnit::whereId($request->id)->update($request->all());
       // PUnit::find($request->id)->update($request);
        //PUnit::whereId($request->id)->update([$request->name,$request->id]);
        AcademicTitle::where('id', $request->id)
        ->update([
            'name' => $request->name
         ]);
        return redirect('/admin/pages/AcademicTitle/index')->with('message', 'Academic Title has been successfully updated');
    }
    public function deleteAcademicTitle($id)
    {
        $AcademicTitle = AcademicTitle::find($id);
        $AcademicTitle->delete();
        return redirect()->route('admin.pages.AcademicTitle.index')->with('message', 'Academic Title has been successfully deleted');
    }
}
