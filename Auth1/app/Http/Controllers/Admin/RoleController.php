<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
     public function index()
    {
        //$roles = PUnit::all();
        $roles = Role::orderBy('name', 'ASC')->get();
        $no =1;
        return view('admin.pages.role.index',['roles'=>$roles,'no'=>$no]);
    }

    public function addRole(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        //return redirect()->route('addPUnit')->with('message', 'Role has been  successfully added');

        return redirect('/admin/pages/role/index')->with('message', 'Role has been successfully added');
    }
    public function showRole($id)
    {
        $role = Role::find($id);
        return view('admin.pages.role.EditRole',['role'=>$role]);
    }
    public function editRole(Request $request, $id)
    {
        $role = Role::find($id);
        return view('admin.pages.role.EditRole',['role'=>$role]);
    }
    public function saveEditRole(Request $request)
    {

        //PUnit::whereId($request->id)->update($request->all());
       // PUnit::find($request->id)->update($request);
        //PUnit::whereId($request->id)->update([$request->name,$request->id]);
        Role::where('id', $request->id)
        ->update([
            'name' => $request->role
         ]);
        return redirect('/admin/pages/role/index')->with('message', 'Role has been  successfully updated');
    }
    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('admin.pages.role.index')->with('message', 'Role has been  successfully deleted');
    }
}
