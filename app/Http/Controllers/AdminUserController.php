<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'user']);
            return $next($request);
        });
    }
    function list(Request $request)
    {


        $status = $request->input('status');

        $list_act = [
            'delete' => 'Xóa tạm thời',
        ];
        if ($status == 'trash') {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $users = User::onlyTrashed()->paginate(10);
        } else {
            $keyword = "";
            if ($request->input("keyword")) {
                $keyword = $request->input("keyword");
            }
            $users = User::where("name", "like", "%" . $keyword . "%")->paginate(10);
        }

        //count:: lấy tổng số bảng ghi trong đó xó xóa tạm thời
        $count_user_active = User::count();
        //Nằm trong tình trạng xóa tạm thời
        $count_user_trash = User::onlyTrashed()->count();

        $count = [$count_user_active, $count_user_trash];
        return view("admin.user.list", compact('users', 'count', 'list_act'));
    }

    function add()
    {
        return view('admin.user.add');
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],

            ],
            [
                'required' => ':attribute không đc để trống',
                'min' => ':attribute có độ dài ít nhất :min ký tự',
                'max' => ':attribute có độ dài tối đa :max ký tự',
                'confirmed' => 'Xác nhận mật khẩu không thành cônng',
            ],
            [
                'name' => 'Tên người dùng',
                'email' => 'Email',
                'password' => 'Mật khẩu',

            ]
        );

        //Thêm dữ liệu User vào hệ thống
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),


        ]);
        return redirect('admin/user/list')->with('status', 'Đã thêm thành viên thành công');
    }

    function delete($id)
    {
        if (Auth::id() != $id) {
            $user = User::find($id);
            $user->delete();
            return redirect('admin/user/list')->with('status', 'Đã xóa thành viên thành công');
        } else {
            return redirect('admin/user/list')->with('status', 'Bạn không thể tự xóa mình ra khỏi hệ thống');
        }


    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check');

        if ($list_check) {
            foreach ($list_check as $k => $id) {
                if (Auth::id() == $id) {
                    unset($list_check[$k]);
                }
            }
            if (!empty($list_check)) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    User::destroy($list_check);
                    return redirect('admin/user/list')->with('status', 'Bạn đã xóa thành công');
                }

                if ($act == 'restore') {
                    User::withTrashed()
                        ->whereIn('id', $list_check)->restore();
                    return redirect('admin/user/list')->with('status', 'Bạn đã khôi phục  thành công');

                }
                if ($act == 'forceDelete') {
                    User::withTrashed()
                        ->whereIn('id', $list_check)->forceDelete();
                    return redirect('admin/user/list')->with('status', 'Bạn đã xóa vĩnh viễn user');

                }
            }
            return redirect('admin/user/list')->with('status', 'Bạn không thể thao tác trên tài khoản đằn nhập');
        } else {
            return redirect('admin/user/list')->with('status', 'Bạn cần chọn phần tử thực  thi');
        }



    }
    function edit(User $user)
    {

        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }


    function update(Request $request, User $user)
    {

        $validateData = $request->validate(
            [
                'name' => 'required|string|max:255',

                'email' => 'required|email|unique:users,email,' . $user->id,
            ],

        );


        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $user->roles()->sync($request->input('roles'));
        return redirect('admin/user/list')->with('status', 'Đã câp nhật thành công');
    }
}
