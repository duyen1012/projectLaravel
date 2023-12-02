<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;

class AdminRoleController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'role']);
            return $next($request);
        });
    }
    function index()
    {
        // return Auth::user()->hasPermission('role.view');
        // if(Auth::user()->hasPermission('role.view')){
        //     dd('Được phép edit quyền');
        // }else{
        //     dd('Không được phép edit quyền');
        // }


        $roles = Role::all();

        return view('admin.role.index', compact('roles'));
    }

    function add()
    {

        $permissions = Permission::all()->groupBy(function ($permissions) {
            return explode('.', $permissions->slug)[0];
        });

        return view('admin.role.add', compact('permissions'));
    }

    function store(Request $request)
    {

        $validated = $request->validate([

            'name' => 'required|unique:roles,name,',
            'description' => 'required',
            'permission_id' => 'nullable|array',
            'permission_id.*' => 'exists:permissions,id',

        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
        //Gắn quyền permission cho role vừa tạo (attach)
        $role->permissions()->attach($request->input('permission_id'));

        return redirect()->route('role.index')->with('status', 'Đã thêm vai trò thành công');

    }

    function edit(Role $role)
    {
        $permissions = Permission::all()->groupBy(function ($permissions) {
            return explode('.', $permissions->slug)[0];
        });
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permission_id' => 'nullable|array',
            'permission_id.*' => 'exists:permissions,id'
        ]);
        $role->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        //Lưu lại thông tin cập nhập
        $role->permissions()->sync($request->input('permission_id', []));
        //sync : hàm dùng để cập nhập lại dữ liệu trong bảng role_permission
        return redirect()->route('role.index')->with('status', 'Đã cập nhật vai trò thành công');
    }

    function delete(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('status', 'Đã xóa vai trò thành công');
    }
}
