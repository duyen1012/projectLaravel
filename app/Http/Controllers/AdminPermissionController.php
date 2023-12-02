<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    function add()
    {
        $permissions = Permission::all()->groupBy(function($permission){
            return explode(".", $permission->slug)[0];
        });
        return view("admin.permission.add",compact("permissions"));
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        Permission::create([
            'name'=> $request->input('name'),
            'slug'=> $request->input('slug'),
            'description'=> $request->input('description'),

        ]);
        return redirect()->route('permission.add')->with('status', 'Bạn đã thêm quyền thành công');
    }

    function edit($id){

        $permissions = Permission::all()->groupBy(function($permission){
            return explode(".", $permission->slug)[0];
        });

        $permission = Permission::find($id);
        return view("admin.permission.edit",compact("permission",'permissions'));
    }

    function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        Permission::where('id',$id)->update([
            'name'=> $request->input('name'),
            'slug'=> $request->input('slug'),
            'description'=> $request->input('description'),

        ]);

return redirect()->route('permission.add')->with('status', 'Đã chỉnh sửa quyền thành công');
    }

    function delete($id){
        Permission::where('id',$id)->delete();
        return redirect()->route('permission.add')->with('status', 'Đã xóa quyền thành công');
    }
}
